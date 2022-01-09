@extends('../layout')
{{--@section('slide')
@include('pages.slide')
@endsection --}}
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang Chủ</a></li>
    <li class="breadcrumb-item"><a href="{{url('the-loai/'.$truyen_breadcrumb->theloai->slug_theloai)}}">{{$truyen_breadcrumb->theloai->tentheloai}}</a></li>
    <li class="breadcrumb-item"><a href="{{url('xem-truyen/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item"><a href="{{url('xem-truyen/'.$chapter->truyen->slug_truyen)}}">{{$chapter->truyen->tentruyen}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$chapter->tieude}}</li>
  </ol>
</nav>

<div class="row">

<div class="col-md-12">
	<h4>{{$chapter->truyen->tentruyen}}</h4>
	<p>Chương hiện tại: {{$chapter->tieude}}</p>
	<div class="col-md-5">


   <!-- Chặn copy  -->
    <style>
body{
-webkit-touch-callout: none;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
}
</style><script type=”text/JavaScript”>
function killCopy(e){
return false
}
function reEnable(){
return true
}
document.onselectstart=new Function (“return false”)
if (window.sidebar){
document.onmousedown=killCopy
document.onclick=reEnable
}
</script>


    <!-- end copy -->


    <!-- chặn click chuột phải -->

    <script language="JavaScript">
    window.onload = function() {
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        }, false);
        document.addEventListener("keydown", function(e) {
            //document.onkeydown = function(e) {
            // "I" key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                disabledEvent(e);
            }
            // "J" key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                disabledEvent(e);
            }
            // "S" key + macOS
            if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                disabledEvent(e);
            }
            // "U" key
            if (e.ctrlKey && e.keyCode == 85) {
                disabledEvent(e);
            }
            // "F12" key
            if (event.keyCode == 123) {
                disabledEvent(e);
            }
        }, false);

        function disabledEvent(e) {
            if (e.stopPropagation) {
                e.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
            e.preventDefault();
            return false;
        }
    };
</script>

    <!--end click chuột phải -->
    <!-- xử lý làm mờ nút chuyển chapter khi hết truyện -->
        <style type=text/css>
        .isDisabled{
            color: currentColor;
            pointer-events: none;
            opacity: 0.5;
            text-decoration: none;
        }
        </style>
        <!-- end button -->


		<div class="form-group">


	<label for="exampleInputEmail1">Chọn Chương</label>
           <p> <a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' :''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Tập Trước</a> </p>
           <select name="select-chapter" class="custom-select select-chapter">

            @foreach($all_chapter as $key => $chap)

            <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>

            @endforeach

</select>
        <p class="mt-4"> <a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' :''}} "  href="{{url('xem-chapter/'.$next_chapter)}}">Tập Sau</a> </p>
		<!-- Nếu chapter id = max id thì disabled còn không thì rỗng -->
    </div>

	</div>

	<div class="noidungchuong">
	<p>{!! $chapter->noidung !!}</p>

	</div>

            <div class="form-group">
        <label for="exampleInputEmail1">Chọn Chương</label>

        <p> <a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' :''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Tập Trước</a> </p>
        <select name="select-chapter" class="custom-select select-chapter">
            @foreach($all_chapter as $key => $chap)
        <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
        <!-- Xử lý chọn chương tại layout.blade.php  -->
        @endforeach

        </select>
        <p class="mt-4"> <a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' :''}} "  href="{{url('xem-chapter/'.$next_chapter)}}">Tập Sau</a> </p>

    </div>
    <h3> Chia sẻ truyện</h3>
	<a class="fab fa-facebook-f">Facebook</a>
	<a class="fab fa-twitter">Facebook</a>
    <div class="row">
        <div class="col-md-12">
    <div class="fb-comments" data-href="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fphoto.php%3Ffbid%3D744472553034934%26set%3Da.141227870026075%26type%3D3&show_text=true&width=500" data-width="" data-order-by="reverse_time" data-numposts="10"></div>
    </div>
</div>

</div>
</div>
@endsection
