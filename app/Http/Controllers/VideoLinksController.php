<?php

namespace App\Http\Controllers;

use Agent;
use App\Domain;
use App\Service\Helper;
use App\VideoLink as Link;
use Illuminate\Support\Facades\Redis;

class VideoLinksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'getInfo']);
    }

    public function index()
    {
        $links = auth()->user()->videolinks()->latest()->paginate(20);
        $linksAdmin = Link::latest()->paginate(20);

        return view('video.index', compact('links', 'linksAdmin'));
    }
    public function create()
    {
        return view('video.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'linkVideo' => 'required',
            'realLink' => 'required',
        ]);

        $domain = Domain::orderByRaw('RAND()')->get(['name']);
        $domainName = $domain['0']->name;

        $sub = str_random(5);
        $linkBasic = str_random(60);
        // if (strpos(request('fake_link'), 'webtretho') !== false || strpos(request('fake_link'), 'tamsueva') !== false) {
        //     $title = 'Webtretho - Cộng đồng phụ nữ lớn nhất Việt Nam';
        // } else {
        //     $title = $this->getPageTitle(request('fake_link'));
        // }

        $fullLink = 'http://' . $sub . '.' . $domainName . '/youtube/' . $linkBasic;

        $linkFb = 'https://www.facebook.com/sharer/sharer.php?&u=' . $fullLink . '&caption=⁮' . request('website') . '&title=⁮' . request('title') . '&description=⁮&picture=' . request('image');
        // $fullLink = 'http://' . $sub . '.' . $domainName . '/' . $linkBasic;

        // $tinyUrlLink = $this->createTinyUrlLink($fullLink);

        $link = Link::create([
            'title' => request('title'),
            'user_id' => auth()->id(),
            'video_link' => request('linkVideo'),
            'real_link' => request('realLink'),
            'embed' => Helper::convertToEmbed(request('linkVideo')),
            'image_url' => request('image'),
            'link_basic' => $linkBasic,
            'link_fb' => $linkFb,
            'website' => request('website'),
            'full_link' => $fullLink,
            'user_name' => auth()->user()->name,
        ]);

        return response()->json([
            'linkFb' => $linkFb,
            'fullLink' => $fullLink,
        ]);
    }

    public function createLinkAd()
    {
        return view('links.create-link-ad');
    }

    public function getInfo()
    {
        $link = request('link');

        $title = Helper::getPageTitle($link);

        $embedCode = Helper::convertYoutube($link);

        parse_str(parse_url($link, PHP_URL_QUERY), $urlParams);

        $thumbnail = 'https://img.youtube.com/vi/' . $urlParams['v'] . '/maxresdefault.jpg';

        return response()->json([
            'title' => $title,
            'image' => $thumbnail,
            'link' => $link,
            'embedCode' => $embedCode,
        ]);
    }

    public function show($link)
    {
        if (Redis::exists('youtube.' . $link)) {
            $realLink = Redis::get('youtube.' . $link);
            $videoLink = Redis::get('youtube.video.' . $link);
            $title = Redis::get('youtube.title.' . $link);
            $thumbnail = Redis::get('youtube.thumbnail.' . $link);
            $embed = Redis::get('youtube.embed.' . $link);
        }

        $url = Link::where('link_basic', '=', $link)->first();
        $realLink = $url->real_link;
        $videoLink = $url->video_link;
        $title = $url->title;
        $thumbnail = $url->image_url;
        $embed = $url->embed;

        Redis::set('youtube.' . $link, $realLink);
        Redis::set('youtube.video.' . $link, $videoLink);
        Redis::set('youtube.title.' . $link, $title);
        Redis::set('youtube.thumbnail.' . $link, $thumbnail);
        Redis::set('youtube.embed.' . $link, $embed);
        Redis::incr('links.clicks' . $link);

        $ip = ip2long(request()->ip());
        if (Helper::checkBadUserAgents() === true) {
            return view('video.redirect', compact('realLink', 'title', 'thumbnail', 'embed'));
        }

        if (Helper::checkBadIp($ip)) {
            return redirect($videoLink);
        }

        if (Agent::isMobile() || Agent::isTablet()) {
            return redirect($realLink);
        }

        if (Agent::isDeskTop()) {
            return redirect($videoLink);
        }
    }

    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    public function destroy(Link $link)
    {
        $link->delete();

        flash('Xoá thành công!', 'success');

        return back();
    }

}
