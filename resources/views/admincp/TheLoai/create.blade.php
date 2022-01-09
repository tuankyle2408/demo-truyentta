@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm thể loại</div>
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

                    <form method="POST" action="{{route('theloai.store')}}" enctype='multipart/form-data'>
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tên thể loại</label>
                        <input type="text" class="form-control" value="{{old('tentheloai')}}" onkeyup="ChangeToSlug();" name="tentheloai" id="slug" aria-describedby="emailHelp" placeholder="Tên thể loại">

                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Từ khóa</label>
                        <input type="text" class="form-control" value="{{old('tukhoa')}}" name="tukhoa"  aria-describedby="emailHelp" placeholder="">

                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Slug thể loại</label>
                        <input type="text" class="form-control" value="{{old('slug_theloai')}}" name="slug_theloai" id="convert_slug" aria-describedby="emailHelp" placeholder="">

                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả</label>
                        <input type="text" class="form-control" value="{{old('mota')}}" name="mota" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả thể loại">

                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh danh mục</label>
                        <input type="file" class="form-control-file" name="hinhanh">

                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Kích hoạt</label>
                        <select name="kichhoat" class="custom-select">
                          <option value="0">Kích hoạt</option>
                          <option value="1">Không kích hoạt</option>
                        </select>
                        </div>

                      <button type="submit" name="themtheloai" class="btn btn-primary">Thêm</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
