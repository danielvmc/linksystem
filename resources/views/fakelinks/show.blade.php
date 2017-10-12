<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>{!! $link->title !!}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=100">
    {{-- <meta property="fb:app_id" content="1547540628876392"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta http-equiv="REFRESH" content="1800">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta content="news" itemprop="genre" name="medium">
    <meta content="vi-VN" itemprop="inLanguage">
    <meta content="Tin nhanh VnExpress" property="og:site_name">
    <meta charset="UTF-8">
    <meta property="og:title" content='{!! $link->title !!}' />
    <meta property="og:description" content="{!! $link->description !!}" />
    <meta property="og:image" content="{{ $link->img }}" />
    <meta property="fb:pages" content="776817119094980">
</head>
<body>
    <p>Loading...</p>
    <p>{!! $link->title !!}</p>
    <p>{!! $link->description !!}</p>
</body>
</html>
