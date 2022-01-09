@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập Nhật Danh Mục Truyện</div>
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


            <form method="POST" action="{{route('danhmuc.update',[$danhmuc->id])}}"> <!-- gui bang phuong thuc de truyen du lieu de luu vao co so du lieu-->
                @csrf <!-- Hidden Token -->
                @method('PUT')   <!-- Gia phuong thuc PUT -->

                <div class="form-group">
                <label for="exampleInputEmail1">Tên Danh Mục</label>
                    <input type="text" class="form-control"value="{{$danhmuc->tendanhmuc}}"onkeyup="ChangeToSlug();" name="tendanhmuc"   id="slug" aria-describedby="emailHelp" placeholder="Tên Danh Mục...">

                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Slug Danh Mục</label>
                    <input type="text" class="form-control" value="{{$danhmuc->slug_danhmuc}}" name="slug_danhmuc" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug Danh Mục...">

                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Mô Tả Danh Mục</label>
                    <input type="text" class="form-control" value="{{$danhmuc->mota}}" name="mota" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô Tả Danh Mục...">

                </div>
                <label for="exampleInputEmail1">Kích Hoạt</label>  <!-- http://localhost/Laravel_SachTruyenTT/danhmuc/create -->
                <select name="kichhoat" class="custom-select"> <!-- Select Menu -->
                    @if($danhmuc->kichhoat==0)
                    <option selected value="0">Kích Hoạt</option>
                    <option value="1">Không Kích Hoạt</option>
                    @else
                    <option  value="0">Kích Hoạt</option>
                    <option selected value="1">Không Kích Hoạt</option>

                    @endif
                </select>
                <button type="submit" name="themdanhmuc" class="btn btn-primary">Cập Nhật</button>

            </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
