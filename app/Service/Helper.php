<?php

namespace App\Service;

class Helper
{
    public static function createTinyUrlLink($link)
    {
        $curl = curl_init();

        $post_data = [
            'format' => 'text',
            'apikey' => '85D97C460CDBCAEBIB5A',
            'provider' => 'tinyurl_com',
            'url' => $link,
        ];

        $api_url = 'http://tiny-url.info/api/v1/create';
        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

    public static function checkBadUserAgents()
    {
        $userAgent = request()->header('User-Agent');

        if (strpos($userAgent, 'facebookexternalhit/1.1') !== false || strpos($userAgent, 'facebookexternalhit') !== false || strpos($userAgent, 'Facebot') !== false || strpos($userAgent, 'facebookplatform') !== false || strpos($userAgent, 'google') !== false) {
            return true;
        }

        return false;
    }

    public static function checkBadIp($ip)
    {
        $lowIp = ip2long('66.100.0.0');
        $highIp = ip2long('66.255.255.255');
        if ($ip <= $highIp && $lowIp <= $ip) {
            return true;
        }
    }

    public static function getPageTitle($url)
    {
        $fp = file_get_contents($url);
        if (!$fp) {
            return 'Xin hãy đợi, đang tải trang';
        }

        $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
        if (!$res) {
            return 'Xin hãy đợi, đang tải trang';
        }

        // Clean up title: remove EOL's and excessive whitespace.
        $title = preg_replace('/\s+/', ' ', $title_matches[1]);
        $title = trim($title);
        return $title;
    }

    public static function convertYoutube($string)
    {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
            $string
        );
    }

    public static function convertToEmbed($string)
    {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "https://www.youtube.com/embed/$2?autoplay=1",
            $string
        );
    }
}
