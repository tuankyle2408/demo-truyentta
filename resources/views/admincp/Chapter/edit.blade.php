@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập Nhật Chapter</div>
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


            <form method="POST" action="{{route('chapter.update',[$chapter->id])}}"> <!-- gui bang phuong thuc de truyen du lieu de luu vao co so du lieu-->
                @csrf
                  @method('PUT')

                   <div class="form-group">
                <label for="exampleInputEmail1">Tên Chapter</label>
                    <input type="text" class="form-control"value="{{$chapter->tieude}}"onkeyup="ChangeToSlug();" name="tieude" id="slug" aria-describedby="emailHelp" placeholder="Tên Danh Mục...">

                </div>


                 <div class="form-group">
                <label for="exampleInputEmail1">Slug Chapter</label>
                    <input type="text" class="form-control" value="{{$chapter->slug_chapter}}" name="slug_chapter" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug Danh Mục...">

                </div>

               <div class="form-group">
                <label for="exampleInputEmail1">Tóm Tắt Chapter</label>
                    <input type="text" class="form-control" value="{{$chapter->tomtat}}" name="tomtat" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô Tả Danh Mục...">

                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Nội Dung</label>
                    <textarea name="noidung"  id="noidung_chapter" class="form-control" rows="5" style="resize:none;">{{$chapter->noidung}}</textarea>
                </div>

                 <div class="form-group">
                <label for="exampleInputEmail1">Thuộc Truyện</label>
                    <select name="truyen_id" class="custom-select"> <!-- Select Menu -->
                        @foreach($truyen as $key => $value)
                    <option {{$chapter->truyen_id==$value->id ? 'selected': ''}} value="{{$value->id}}">{{$value->tentruyen}}</option>
                    @endforeach
                </select>

                </div>



                <div class="form-group">
                <label for="exampleInputEmail1">Kích Hoạt</label>  <!-- http://localhost/Laravel_SachTruyenTT/danhmuc/create -->
                <select name="kichhoat" class="custom-select"> <!-- Select Menu -->
                    @if($chapter->kichhoat==0)
                    <option selected value="0">Kích Hoạt</option>
                    <option value="1">Không Kích Hoạt</option>
                    @else
                    <option  value="0">Kích Hoạt</option>
                    <option selected value="1">Không Kích Hoạt</option>

                    @endif
                </select>
            </div>
                <button type="submit" name="themdanhmuc" class="btn btn-primary">Cập Nhật</button>

            </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
