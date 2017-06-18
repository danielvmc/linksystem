<!DOCTYPE html>
<html style="margin-top:0 !important;"><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="image" content="{{ $thumbnail }}">
<link rel="image_src" href="{{ $thumbnail }}">
<meta property="og:image" content="{{ $thumbnail }}">
@if (!$title)
<meta property="og:title" content="{{ $title }}">
@endif
<meta property="og:description" content="">
<meta property="og:video" content="{{ $embed }}">
<meta property="og:video:type" content="application/x-shockwave-flash">
<meta property="og:video:width" content="1280">
<meta property="og:video:height" content="720">
<meta property="og:video" content="{{ $embed }}">
<meta property="og:video:secure_url" content="{{ $embed }}">
<meta property="og:video:type" content="text/html">
<link itemprop="embedURL" href="{{ $embed }}">
<meta name="twitter:card" content="summary_large_image">
<!--For Twitter, Always don't embeded--><meta name="twitter:site" content="www.youtube.com">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="">
<meta name="twitter:domain" content="www.youtube.com">
@if (!$title)
<meta itemprop="name" content="{{ $title }}">
@endif
<meta itemprop="image" content="{{ $thumbnail }}">
<meta itemprop="description" content="">
@if (!$title)
<title>{{ $title }}</title>
@endif
</head></html>
