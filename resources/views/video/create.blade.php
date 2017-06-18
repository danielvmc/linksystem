@extends('layouts.master')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Tạo link Ad</h1>
    </div>
    <div class="panel-body">
            <div class="form-group">
                <label for="link-video">Link video:</label>
                <input type="text" class="form-control" name="link-video" id="link-video" onchange="getInfo();">
            </div>

            <div class="form-group">
                <label for="real-link">Link đích:</label>
                <input type="text" class="form-control" name="real-link" id="real-link">
            </div>

            <div class="form-group video-review" id="video-review">
                <img id="play-button" src="/img/play.png">
                <div class="video-text" id="video-text">
                    <div id="video-title">Tân Nhàn - Album Chiều Nắng | Nhạc Trữ Tình</div>
                    <div id="video-website" class="video_desc">youtube.com</div>
                </div>
            </div>

            <div class="form-group">
                <label for="title">Tiêu đề video:</label>
                <input type="text" class="form-control" name="title" id="title" onchange="setVideoTitle();" required>
            </div>

            <div class="form-group">
                <label for="website">Địa chỉ website:</label>
                <input type="text" class="form-control" name="website" id="website" onkeyup="setVideoWebsite();" required>
            </div>

            <div class="form-group">
                <label for="thumbnail">Ảnh thumbnail:</label>
                <input type="text" class="form-control" name="thumbnail" id="thumbnail" onchange="setThumbnail();">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" onclick="createLink()">Tạo link</button>
                <a id="share" class="btn btn-primary" target="_blank">Share Facebook</a>
            </div>


            <div id="result">
                <div class="form-group">
                    <input type="text" class="form-control" name="result-url" id="result-url"">
                </div>
            </div>

            <div class="form-group">
                @include('layouts.errors')
            </div>

            @if (session()->has('link'))
                <div class="form-group">
                    <h3>Lưu ý 1 link chỉ đăng 1 nick</h3><br>
                    <a href="{{ session()->get('link')->full_link }}">{{ session()->get('link')->full_link }}</a><br>
                </div>
            @endif
            </div>

    </div>
@endsection

<script>
function setVideoTitle(){
    document.getElementById("video-title").textContent=document.getElementById('title').value;
}

function setVideoWebsite(){
    document.getElementById("video-website").textContent=document.getElementById('website').value;
}

function setThumbnail(imageUrl) {
    var link = document.getElementById('thumbnail').value;

    $('#video-review').css('background-image', 'url(' + link + ')');
}

    function echo(embedCode) {
        $('.video-review').empty();
        $('.video-review').append(embedCode);
    }
    function getInfo () {
        var link = $('#link-video').val();
        $.ajax({
            url: '/get-info',
            type: 'POST',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                link: link
            },
        }).done(function (data) {
            var embedCode = data.embedCode;
            var imageUrl = data.image;
            var title = data.title;

            document.getElementById("video-title").textContent = title;
            document.getElementById("video-website").textContent = "youtube.com";

            document.getElementById("title").value = title;
            document.getElementById("website").value = 'youtube.com';
            document.getElementById("thumbnail").value = imageUrl;

            $('#video-review').show();
            $('#video-review').css('background-image', 'url(' + imageUrl + ')');

        });
    }

    function shareLink() {
        var linkVideo = $('#link-video').val();
        var realLink = $('#real-link').val();
        var title = $('#title').val();
        var website = $('#website').val();
        var image = $('#thumbnail').val();

        $.ajax({
           url: '/link-ad',
           type: 'POST',
           dataType: 'json',
           data: {
                "_token": "{{ csrf_token() }}",
                linkVideo: linkVideo,
                realLink: realLink,
                title: title,
                website: website,
                image: image
           }
        }).done(function (data) {



        });
    }

    function createLink() {
        var linkVideo = $('#link-video').val();
        var realLink = $('#real-link').val();
        var title = $('#title').val();
        var website = $('#website').val();
        var image = $('#thumbnail').val();

        $.ajax({
           url: '/link-ad',
           type: 'POST',
           dataType: 'json',
           data: {
                "_token": "{{ csrf_token() }}",
                linkVideo: linkVideo,
                realLink: realLink,
                title: title,
                website: website,
                image: image
           },
           statusCode: {
            422: function () {
                alert('Cần điền đủ link video và link đích.');
            }
           }
        }).done(function (data) {
            $('#result').show();
            document.getElementById("result-url").value = data.fullLink;
            var a = document.getElementById("share");
            a.href = data.linkFb;
        });
    }
</script>
