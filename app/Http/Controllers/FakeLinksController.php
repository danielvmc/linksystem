<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FakeLink;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\FakeDomain;

class FakeLinksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function create()
    {
        $domains = FakeDomain::all(['name']);

        return view('fakelinks.create', compact('domains'));
    }

    public function store()
    {
        // $domain = FakeDomain::orderByRaw('RAND()')->get(['name']);
        // $domainName = $domain['0']->name;
        $domain = request('fake_domain');

        if (request()->has('fake_link')) {
            $fakeLink = request('fake_link');

            $client = new Client();

            $response = $client->get($fakeLink);

            $fakeLinkHtml = $response->getBody()->getContents();

            $crawler = new Crawler($fakeLinkHtml);

            $title = $crawler->filterXpath('//meta[@property="og:title"]')->extract('content')[0];
            $description = $crawler->filterXpath('//meta[@property="og:description"]')->extract('content')[0];
            $img = $crawler->filterXpath('//meta[@property="og:image"]')->extract('content')[0];

            $slug = str_slug($title) . str_random(10);

            $link = FakeLink::create([
                'fake_link' => $fakeLink,
                'title' => $title,
                'description' => $description,
                'img' => $img,
                'body' => '',
                'slug' => $slug,
                'link' => 'http://' . $domain . '/fl/' . $slug,
            ]);
        } elseif (request()->has('title')) {
            $title = request('title');
            $description = request('description');
            $img = request('img');

            $slug = str_slug($title) . str_random(10);

            $link = FakeLink::create([
                'fake_link' => '',
                'title' => $title,
                'description' => $description,
                'img' => $img,
                'body' => '',
                'slug' => $slug,
                'link' => 'http://' . $domain . '/fl/' . $slug,
            ]);
        }

        // $body = $this->shuffleWords('xưa giờ toàn thấy chồng chê vợ đoảng giờ vợ nấu đồ ngon cho ăn mà cũng chê thì bó tay đi làm về mệt mỏi đến bữa cơm hoặc đêm hôm đói ăn ông chồng nào mà chẳng muốn được vợ trổ tài nấu nướng cho thỏa cơn thèm chỉ khổ nỗi đồ ngon thì hiếm thấy toàn thấy các anh kêu như vạc vì phải đối mặt với bao nhiêu thảm họa nấu ăn nào là gà hầm “hỏa thiêu” cháy đen xì còn mỗi xương trứng “nổ” hạt mít thui rơm canh cải cá rô xù vẩy món nào cũng khiến các anh “nảy số” từ bình thường sang hóa điên ngay lập tức thế nhưng chê vợ nấu ăn dở như kia đã đành lại có người trái khoáy đến nỗi thèm mì tôm vợ nấu hẳn cho tôm “xịn” lại còn quay lưng dỗi tâm sự tréo ngoe sáng ngủ dậy khiến chị em cười rần rần ảnh facebook đừng bảo phụ nữ khó hiểu sự thật là đàn ông cũng rắc rối khó chiều lắm cơ biết là anh ấy thèm mì tôm rồi nhưng nhà có sẵn tôm thật nguyên con nấu lên ngon hơn hẳn mì úp nước sôi mà cũng hờn thì chịu sáng ra có bát bún đầy tôm thịt thế kia bao người muốn còn chẳng được có khi nào anh ấy ăn uống kham khổ giản đơn quen rồi nên vợ tẩm bổ cho món ngon nhiều dinh dưỡng lại không quen mồm chăng? sau khi cô vợ tội nghiệp luống cuống bê lên mạng hỏi 500 chị em thông thái xem vì sao nấu hẳn đồ ngon mà chồng vẫn chê thì không ít người đã bò lê ra cười nhìn bức ảnh cô ấy chụp ai cũng nhận ra sự khác lạ rõ ràng chắc chỉ mình cô ấy không phân biệt được thế nào là mì tôm “cái này là bún tôm chứ mì tôm gì”; “vợ đảm đang quá tiếc là chồng lại thèm mì gói rẻ tiền cơ”; “em này không hiểu ý chồng rồi đòi cái gì thì nấu cho cái đấy có phải lúc nào cũng thích ăn như quý tộc đâu”; “nhìn kỹ thì bát bún cũng chẳng hấp dẫn tí nào”… rút kinh nghiệm lần sau chồng muốn gì nấu nấy đỡ chịu cảnh cho ăn ngon cũng bị lườm ành minh họa vài mẹ bỉm nghiêm túc cũng nhảy vào tranh luận khuyên khổ chủ lần sau nếu trót nấu sai yêu cầu của chồng thì cũng nên chế biến sao cho ngon mắt “đáng lẽ ra phải phi hành tỏi cà chua lên rang tôm cho có mỡ nước dùng bóng bẩy thơm nức ra thì chồng còn muốn nếm ai đời để bát bún trắng nhởn thế kia” đủ loại ý kiến được đưa ra từ trêu đùa góp ý đến chê bai nếu rảnh rỗi ngồi đọc hết chắc cô vợ cũng méo mặt vì chẳng biết đâu mới là nguyên nhân đúng cứ nghĩ đơn giản cho đời thanh thản thôi chồng chê tôm “xịn” thì thôi ngồi ăn hết bát cho đỡ phí hơi đâu mà mệt óc suy diễn lý do quay người bỏ đi làm gì thay vì ấm ức thôi thì mời chị vợ ngắm mấy món “sai sách giáo khoa” dưới đây cho bớt ngơ ngác vậy chỉ là một lần lỡ tay làm sai ý thích của chồng có lòng thương cho chồng ăn ngon mà người ta chẳng thèm động đũa có phúc không biết hưởng kệ anh ấy đi chị vẫn còn khéo hơn khối bà vợ khác đấy nhé có anh chồng đi làm về mệt vợ nấu bì lợn cháy tỏi ớt ch ăn còn bị chồng hất đổ cả mâm cơm cơ mới lườm thôi vẫn còn nhẹ chán canh cá rô “bơi ngửa nguyên đàn” cùng rau cải nguyên cuộng ai nuốt được không? ảnh facebook trứng nổ” món ăn đầy sáng tạo này có phải lấy cảm hứng từ món trứng nướng không? ảnh facebook');

        // $link = FakeLink::create([
        //     'fake_link' => $fakeLink,
        //     'title' => $title,
        //     'description' => $description,
        //     'img' => $img,
        //     'body' => '',
        //     'slug' => str_slug($title) . str_random(10),
        // ]);

        // $doc = new DOMDocument;
        // $doc->loadHTMLFile($fakeLink);

        // $body = $doc->getElementsByTagName('body');

        // if ($body && $body->length > 0) {
        //     $body = $body->item(0);
        // }

        // dd($body);

        // dd($crawler);
        return back()->withInput()->withLink($link);
    }

    public function show($slug)
    {
        $link = FakeLink::where('slug', '=', $slug)->first();

        return view('fakelinks.show', compact('link'));
    }

    private function shuffleWords($words)
    {
        $wordsArray = explode(' ', $words);
        shuffle($wordsArray);
        return implode(' ', $wordsArray);
    }
}
