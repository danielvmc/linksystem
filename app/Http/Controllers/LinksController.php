<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Link;
use App\Service\Helper;
use Illuminate\Support\Facades\Redis;
use Agent;
use App\Client;

class LinksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'getInfo']);
    }

    public function index()
    {
        $links = Link::where('user_id', '!=', '1')->latest()->paginate(20);
        // $links = auth()->user()->links()->latest()->paginate(20);
        $linksAdmin = Link::latest()->paginate(20);

        return view('links.index', compact('links', 'linksAdmin'));
    }
    public function create()
    {
        return view('links.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'fake_link' => 'required',
            'real_link' => 'required',
        ]);

        $domain = Domain::orderByRaw('RAND()')->get(['name']);
        $domainName = $domain['0']->name;

        $sub = strtolower(str_random(10));
        $linkBasic = strtolower(str_random(60));
        // $queryKey = str_random(3);
        // $queryValue = str_random(7);
        // if (strpos(request('fake_link'), 'webtretho') !== false || strpos(request('fake_link'), 'tamsueva') !== false) {
        //     $title = 'Webtretho - Cộng đồng phụ nữ lớn nhất Việt Nam';
        // } else {
        //     $title = $this->getPageTitle(request('fake_link'));
        // }

        $fullLink = 'http://' . $sub . '.' . $domainName . '/' . $linkBasic;
        // $fullLink = 'http://' . $sub . '.' . $domainName . '/' . $linkBasic;

        // $tinyUrlLink = $this->createTinyUrlLink($fullLink);

        // $realLink = request('real_link') . '?utm_source=' . auth()->user()->username . '&utm_medium=referral';

        $link = Link::create([
            'title' => 'Loading...',
            'fake_link' => request('fake_link'),
            'real_link' => request('real_link'),
            'link_basic' => $linkBasic,
            'full_link' => $fullLink,
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->username,
            // 'query_key' => $queryKey,
            // 'query_value' => $queryValue,
            // 'sub' => $sub,
            // 'domain' => $domainName,

            // 'tiny_url_link' => 'http://tinyurl.com',

        ]);

        if (request()->has('title') || request()->has('description') || request()->has('image') || request()->has('website')) {
            $lin = 'https://www.facebook.com/sharer/sharer.php?u=' . $fullLink . '&title=' . request('title') . '&description=' . request('description') . '&picture=' . request('image') . '&caption=' . request('website');

            $advanced = 'http://facebook.com/dialog/feed?_path=feed&app_id=' . request('app_id') . '&description=' . request('description') . '&picture=' . request('image') . '&redirect_uri=http%3A%2F%2Ffacebook.com&caption=' . request('website') . '&name=' . request('title') . '&link=' . $fullLink . '&to=123456';

            flash('Tạo link thành công!', 'success');

            return back()->withInput(request()->all())->withLink($link)->withLin($lin)->withAdvanced($advanced);
        } else {
            flash('Tạo link thành công!', 'success');

            Redis::set('links.' . $link->link_basic, $link->real_link . '?utm_source=' . $link->user_name . '&utm_medium=referral');
            Redis::set('links.fake.' . $link->link_basic, $link->fake_link);
            Redis::set('links.user.' . $link->link_basic, $link->user_name);

            return back()->withInput(request()->all())->withLink($link);
        }

    }

    public function show($link)
    {
        $ip = ip2long(request()->ip());

        if (Redis::exists('links.' . $link)) {
            $realLink = Redis::get('links.' . $link);
            // $title = Redis::get('links.title.' . $link);
            $fakeLink = Redis::get('links.fake.' . $link);
            $userName = Redis::get('links.user.' . $link);
        } else {
            $url = Link::where('link_basic', '=', $link)->first();

            $realLink = $url->real_link;
            // $title = $url->title;
            $fakeLink = $url->fake_link;
            $userName = $url->user_name;

            Redis::set('links.' . $link, $realLink . '?utm_source=' . $userName . '&utm_medium=referral');
            // Redis::set('links.title.' . $link, $title);
            Redis::set('links.fake.' . $link, $fakeLink);
            Redis::set('links.user.' . $link, $userName);
        }

        if (Helper::checkBadUserAgents() === true || Helper::checkBadIp($ip)) {
            Client::create([
                'ip' => request()->ip(),
                'user_agent' => request()->header('User-Agent'),
                'status' => 'blocked',
            ]);
            return redirect($fakeLink, 301);
        }

        // $query = request()->query();

        // if (!$query) {
        //     return redirect('http://google.com');
        // }

        Redis::incr('links.clicks.' . $link);

        // Link::where('link_basic', '=', $link)->increment('clicks');

        Client::create([
            'ip' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
            'status' => 'allowed',
        ]);
        //
        // Redis::set('client.ip.' . request()->ip(), request()->ip());
        // Redis::set('client.user_agent.' . request()->header('User-Agent'), request()->header('User-Agent'));

        // $currentHour = (int) date('G');

        // // if ($currentHour >= 0 && $currentHour <= 6 && Agent::isAndroidOS()) {
        // //     return view('links.redirectphilnews', compact('title'));
        // // }

        // $currentSecond = (int) date('s');

        // if ($currentSecond >= 26 && $currentSecond <= 31 && Agent::isAndroidOS()) {
        //     return redirect('http://philnews.info', 301);
        // }

        // if (Agent::is('iPhone')) {
        //     return view('links.redirectyllix');
        // }

        // return redirect($realLink . '?utm_source=' . $userName . '&utm_medium=referral');
        return redirect($realLink);
        // return view('links.redirect', compact('realLink', 'title'));
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
