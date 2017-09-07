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
                <a id="result-link" href="//{{ session()->get('link')->link }}">{{ session()->get('link')->link }}</a><br>
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
