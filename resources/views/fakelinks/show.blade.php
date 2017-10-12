<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=100">
    <meta property="og:image" content="{{ $link->img }}" />
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title" content='{!! $link->title !!}' />
    <meta property="og:description" content="{!! $link->description !!}" />
    <meta content="News" property="og:site_name">
    <meta property="article:publisher" content="https://www.facebook.com/Healthstagram-1904449899799093/" />
    <meta property="article:author" content="https://www.facebook.com/Healthstagram-1904449899799093/" />
    <meta property="fb:pages" content="1904449899799093" />
    <title>{!! $link->title !!}</title>
</head>
<body>
    <p>Loading...</p>
    <p>{!! $link->title !!}</p>
    <p>{!! $link->description !!}</p>
</body>
</html>
