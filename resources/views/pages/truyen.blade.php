
@extends('../layout')
{{--@section('slide')
@include('pages.slide')
@endsection --}}
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
  </ol>
</nav>

<div class="row">
<div class="col-md-9">
	<div class="row">
	<div class="col-md-3">
		<img class="card-img-top" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="300" width="150">
	</div>

	<div class="col-md-9">
		<style type="text/css">
			 .infotruyen{
			 	list-style: none;
			 }
		</style>
		<ul class="infotruyen">
        <div class="fb-share-button" data-href="http://localhost/Laravel_SachTruyenTT/xem-chapter/quyen-2-chuong-1-1-loi-dan"
         data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FLaravel_SachTruyenTT%2Fxem-chapter%2Fquyen-2-chuong-1-1-loi-dan&amp;src=sdkpreparse"
        class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
			<li>Tên Truyện: {{$truyen->tentruyen}}</li>
			<li>Tác Giả: {{$truyen->tacgia}}</li>
			<li>Danh Mục Truyện: <a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}} </a></li>
            <li>Thể Loại: <a href="{{url('the-loai/'.$truyen->theloai->slug_theloai)}}">{{$truyen->theloai->tentheloai}} </a></li>
			<li>Số Chapter: 200</li>
			<li>Số Lượt Xem: 12512</li>
			<li><a href="#">Xem Mục Lục</a></li>
			@if($chapter_dau)
			<li><a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc Online</a></li>
            <li><a href="{{url('xem-chapter/'.$chapter_cuoi->slug_chapter)}}" class="btn btn-success mt-2">Đọc Chương Mới Nhất</a></li>
			@else
			<li><a href="" class="btn btn-danger">Hiện tại chưa có chương</a></li>
			@endif
		</ul>
	</div>

		</div>

		<div class="col-md-12">
			<hr>
			<p>{!! $truyen->tomtat !!}</p>
		</div>

		<hr>

        <style type="text/css">
            .tagcloud05 ul {
	margin: 0;
	padding: 0;
	list-style: none;
}
.tagcloud05 ul li {
	display: inline-block;
	margin: 0 0 .3em 1em;
	padding: 0;
}
.tagcloud05 ul li a {
	position: relative;
	display: inline-block;
	height: 30px;
	line-height: 30px;
	padding: 0 1em;
	background-color: #3498db;
	border-radius: 0 3px 3px 0;
	color: #fff;
	font-size: 13px;
	text-decoration: none;
	-webkit-transition: .2s;
	transition: .2s;
}
.tagcloud05 ul li a::before {
	position: absolute;
	top: 0;
	left: -15px;
	content: '';
	width: 0;
	height: 0;
	border-color: transparent #3498db transparent transparent;
	border-style: solid;
	border-width: 15px 15px 15px 0;
	-webkit-transition: .2s;
	transition: .2s;
}
.tagcloud05 ul li a::after {
	position: absolute;
	top: 50%;
	left: 0;
	z-index: 2;
	display: block;
	content: '';
	width: 6px;
	height: 6px;
	margin-top: -3px;
	background-color: #fff;
	border-radius: 100%;
}
.tagcloud05 ul li span {
	display: block;
	max-width: 100px;
	white-space: nowrap;
	text-overflow: ellipsis;
	overflow: hidden;
}
.tagcloud05 ul li a:hover {
	background-color: #555;
	color: #fff;
}
.tagcloud05 ul li a:hover::before {
	border-right-color: #555;
}
        </style>


        <p>Từ khóa tìm kiếm :

			@php
			$tukhoa = explode(",",$truyen->tukhoa);
			@endphp
			<div class="tagcloud05">
				<ul>
					@foreach($tukhoa as $key => $tu)

					<li><a href="{{url('tag/'.\Str::slug($tu))}}"><span>{{$tu}}</span></a></li>

					@endforeach
				</ul>
			</div>
		</p>



	<h4>Danh Sách Chương</h4>
	<ul class="mucluctruyen" style="list-style:none" >
		@php
		$mucluc = count($chapter);

		@endphp
		@if($mucluc>0)

				@foreach($chapter as $key => $chap)
				<li><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
				@endforeach
				@else
				<li>Chương đang được cập nhật...</li>
			@endif


			</ul>

            <!-- Facebook comment -->


            <div class="fb-comments" data-href="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fphoto.php%3Ffbid%3D744472553034934%26set%3Da.141227870026075%26type%3D3&show_text=true&width=500" data-width="" data-order-by="reverse_time" data-numposts="10"></div>


			<h4>Sách Cùng Danh Mục</h4>

			<div class="row">


          @foreach($cungdanhmuc as $key => $value)

           <div class="col-md-3" >
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh )}}" height="300" width="150">
                <div class="card-body">
                   <h5>{{$value->tentruyen}}</h5>
                  <p class="card-text" >{{$value->tomtat}}</p>


                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{url('xem-truyen/'.$value->slug_truyen)}}"  type="button" class="btn btn-sm btn-outline-secondary">Đọc Đi Nào</a>
                    </div>
                    <small class="text-muted">7 mins ago</small>
                  </div>
                </div>

              </div>
            </div>
            @endforeach
			</div>
   </div>

<div class="col-md-3">
	<h3>Sách Hay Xem Nhiều</h3>
    <div class="row mt-2">








</div>

</div>

</div>



@endsection
