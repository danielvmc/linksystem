@extends('layouts.master')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Tạo link giả</h1>
    </div>
    <div class="panel-body">
        <form method="POST" action="/create-fake-link">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="fake_link">Link site gốc: (bình thường, dấu sét đều được, nếu bị LỖI thì XOÁ đi và điền thủ công ở dưới)</label>
                <input type="text" class="form-control" name="fake_link" id="fake_link" value="{{ old('fake_link') }}">
            </div>

            <div class="form-group">
              <label for="fake_domain">Chọn website tuỳ vào nước spam:</label>
              <select name="fake_domain" id="fake_domain" class="form-control">
                {{-- @foreach ($domains as $domain)
                  <option value="{{ $domain->name }}">{{ $domain->name }}</option>
                @endforeach --}}

    <optgroup label="Việt Nam">
        <option value="tuoitrehot.info">tuoitrehot.info</option>
        <option value="gioitrevietnam.info">gioitrevietnam.info</option>
        <option value="danvietnam.info">danvietnam.info</option>
        <option value="nguoivietbonphuong.info">nguoivietbonphuong.info</option>
        <option value="baonguoiviet.info">baonguoiviet.info</option>
        <option value="baonhandan.info">baonhandan.info</option>
        <option value="baophunuviet.info">baophunuviet.info</option>
        <option value="vzexpress.info">vzexpress.info</option>
        <option value="vmexpress.info">vmexpress.info</option>
        <option value="congtin.info">congtin.info</option>
        <option value="docbaophapluat.info">docbaophapluat.info</option>
        <option value="tokhoe.info">tokhoe.info</option>
        <option value="tamsueva.info">tamsueva.info</option>
    </optgroup>
    <optgroup label="Indonesia">
        <option value="medan.tribunnews-indo.info">medan.tribunnews-indo.info</option>
        <option value="jambi.tribunnews-indo.info">jambi.tribunnews-indo.info</option>
        <option value="style.tribunnews-indo.info">style.tribunnews-indo.info</option>
        <option value="solo.tribunnews-indo.info">solo.tribunnews-indo.info</option>
        <option value="bogor.tribunnews-indo.info">bogor.tribunnews-indo.info</option>
        <option value="wartakota.tribunnews-indo.info">wartakota.tribunnews-indo.info</option>
        <option value="superball.tribunnews-indo.info">superball.tribunnews-indo.info</option>
        <option value="jatim.tribunnews-indo.info">jatim.tribunnews-indo.info</option>
        <option value="blog.tribunnews-indo.info">blog.tribunnews-indo.info</option>
        <option value="jabar.tribunnews-indo.info">jabar.tribunnews-indo.info</option>
        <option value="palembang.tribunnews-indo.info">palembang.tribunnews-indo.info</option>
        <option value="wow.tribunnews-indo.info">wow.tribunnews-indo.info</option>
        <option value="medan.thetribunnews.info">medan.thetribunnews.info</option>
        <option value="jambi.thetribunnews.info">jambi.thetribunnews.info</option>
        <option value="style.thetribunnews.info">style.thetribunnews.info</option>
        <option value="solo.thetribunnews.info">solo.thetribunnews.info</option>
        <option value="bogor.thetribunnews.info">bogor.thetribunnews.info</option>
        <option value="wartakota.thetribunnews.info">wartakota.thetribunnews.info</option>
        <option value="jatim.thetribunnews.info">jatim.thetribunnews.info</option>
        <option value="blog.thetribunnews.info">blog.thetribunnews.info</option>
        <option value="superball.thetribunnews.info">superball.thetribunnews.info</option>
        <option value="jabar.thetribunnews.info">jabar.thetribunnews.info</option>
        <option value="palembang.thetribunnews.info">palembang.thetribunnews.info</option>
        <option value="wow.thetribunnews.info">wow.thetribunnews.info</option>
    </optgroup>
    <optgroup label="Philippines">
        <option value="philippinesdaily.info">philippinesdaily.info</option>
        <option value="newsbalita.info">newsbalita.info</option>
        <option value="manilatimesph.info">manilatimesph.info</option>
        <option value="sunstarph.info">sunstarph.info</option>
        <option value="gmanews.info">gmanews.info</option>
        <option value="inquirernews.info">inquirernews.info</option>
        <option value="abscbn-news.info">abscbn-news.info</option>
        <option value="trendingnewsportals.info">trendingnewsportals.info</option>
        <option value="trendingnewsportalph.info">trendingnewsportalph.info</option>
        <option value="abscbnph.info">abscbnph.info</option>
        <option value="rapplerph.info">rapplerph.info</option>
    </optgroup>
              </select>
            </div>

            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Hết mụn trong 4 ngày">
            </div>

            <div class="form-group">
                <label for="description">Dưới tiêu đề:</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" placeholder="Chỉ dùng vỏ chuối thôi không cần bất kỳ gì khác mà hết mụn trong 4 ngày đó hay không? Nguyên liệu: Vỏ chuối (trời ơi nó còn tầm thường và rẻ tiền hơn là">
            </div>

            <div class="form-group">
                <label for="image">Link ảnh: (up lên <a href="http://www.upsieutoc.com/" target="_blank">upsieutoc.com</a> )</label>
                <input type="text" class="form-control" name="img" id="img" value="{{ old('img') }}" placeholder="http://www.webtretho.com/contentreview/wp-content/uploads/sites/53/2015/11/banana-peels-acne-treatment-317x1024.png">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Tạo link giả</button>
            </div>

            <div class="form-group">
                @include('layouts.errors')
            </div>
        </form>

         @if (session()->has('link'))
            <div class="form-group">
                <hr>
                <button class="btn btn-primary" onclick="copyToClipboard('#result-link')">Copy</button><br>
                <a id="result-link" href="{{ session()->get('link')->link }}">{{ session()->get('link')->link }}</a><br>
            </div>
         @endif
    </div>
@endsection

<script>
(function () {
   if ($(".switch").checked(true)) {
    $(".advanced-form").show();
   } else {
    $(".advanced-form").hide();
   }
});

    function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
    }

    function copyFakeLink() {
        var title = $('#title').val();
        var description = $('#description').val();
        var image = $('#image').val();
        var web = $('#web').val();
        var realLink = $('#result-link').val();

        var link = 'https://www.facebook.com/sharer/sharer.php?&u=' + realLink + '&caption=' + web + '&title=' + title + '&description=' + description + '&picture=' + image;

        var dummy = document.createElement("input");
      document.body.appendChild(dummy);
      $(dummy).css('display','none');
      dummy.setAttribute("id", "dummy_id");
      document.getElementById("dummy_id").value=link;
      dummy.select();
      document.execCommand("copy");
      document.body.removeChild(dummy);
    }
</script>
