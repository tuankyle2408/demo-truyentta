@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Danh Mục Truyện</div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


            <form method="POST" action="{{route('truyen.store')}}"  enctype="multipart/form-data"> <!-- gui bang phuong thuc de truyen du lieu de luu vao co so du lieu-->
                @csrf


                                <div class="form-group">

                <label for="exampleInputEmail1">Tên truyện</label>

                <input type="text" class="form-control" value="{{old('tentruyen')}}" onkeyup="ChangeToSlug();" name="tentruyen" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện">



                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Từ Khóa</label>
                    <input type="text" class="form-control"value="{{old('tukhoa')}}" name="tukhoa" id="slug" aria-describedby="emailHelp" placeholder="Từ Khóa...">

                </div>

                 <div class="form-group">
                <label for="exampleInputEmail1">Tác Giả</label>
                    <input type="text" class="form-control"value="{{old('tacgia')}}"onkeyup="ChangeToSlug();" name="tacgia" id="slug" aria-describedby="emailHelp" placeholder="Tác Giả...">

                </div>


                                    <div class="form-group">

                    <label for="exampleInputEmail1">Slug truyện</label>

                    <input type="text" class="form-control" value="{{old('slug_truyen')}}" name="slug_truyen" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyện...">



                    </div>


               <div class="form-group">
                <label for="exampleInputEmail1">Tóm Tắt Truyện</label>
                   <textarea name="tomtat" class="form-control" rows="5" style="resize: none;"></textarea>
                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Danh Mục Truyện</label>
                <select name="danhmuc" class="custom-select">
                    @foreach($danhmuc as $Key => $muc)
                    <option value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Thể Loại </label>
                <select name="theloai" class="custom-select">
                    @foreach($theloai as $Key => $the)
                    <option value="{{$the->id}}">{{$the->tentheloai}}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Hình Ảnh Truyện</label>
                    <input type="file" class="form-control-file" name="hinhanh">

                </div>


                <div class="form-group">
                <label for="exampleInputEmail1">Kích Hoạt</label>  <!-- http://localhost/Laravel_SachTruyenTT/danhmuc/create -->
                <select name="kichhoat" class="custom-select"> <!-- Select Menu -->
                    <option value="0">Kích Hoạt</option>
                    <option value="1">Không Kích Hoạt</option>
                </select>
            </div>
                <button type="submit" name="themtruyen" class="btn btn-primary">Thêm</button>

            </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
