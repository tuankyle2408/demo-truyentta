@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Chapter</div>
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


            <form method="POST" action="{{route('chapter.store')}}"> <!-- gui bang phuong thuc de truyen du lieu de luu vao co so du lieu-->
                @csrf


                   <div class="form-group">
                <label for="exampleInputEmail1">Tên Chapter</label>
                    <input type="text" class="form-control"value="{{old('tieude')}}"onkeyup="ChangeToSlug();" name="tieude" id="slug" aria-describedby="emailHelp" placeholder="Tên Danh Mục...">

                </div>


                 <div class="form-group">
                <label for="exampleInputEmail1">Slug Chapter</label>
                    <input type="text" class="form-control" value="{{old('slug_chapter')}}" name="slug_chapter" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug Danh Mục...">

                </div>

               <div class="form-group">
                <label for="exampleInputEmail1">Tóm Tắt Chapter</label>
                    <input type="text" class="form-control" value="{{old('tomtat')}}" name="tomtat" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô Tả Danh Mục...">

                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Nội Dung</label>
                    <textarea name="noidung" id="noidung_chapter" class="form-control" rows="5" style="resize:none;"></textarea>
                </div>

                 <div class="form-group">
                <label for="exampleInputEmail1">Thuộc Truyện</label>
                    <select name="truyen_id" class="custom-select"> <!-- Select Menu -->
                        @foreach($truyen as $key => $value)
                    <option value="{{$value->id}}">{{$value->tentruyen}}</option>
                    @endforeach
                </select>

                </div>



                <div class="form-group">
                <label for="exampleInputEmail1">Kích Hoạt</label>  <!-- http://localhost/Laravel_SachTruyenTT/danhmuc/create -->
                <select name="kichhoat" class="custom-select"> <!-- Select Menu -->
                    <option value="0">Kích Hoạt</option>
                    <option value="1">Không Kích Hoạt</option>
                </select>
            </div>
                <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm</button>

            </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
