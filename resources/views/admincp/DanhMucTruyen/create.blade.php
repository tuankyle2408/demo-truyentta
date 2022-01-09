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
                   

            <form method="POST" action="{{route('danhmuc.store')}}"> <!-- gui bang phuong thuc de truyen du lieu de luu vao co so du lieu-->
                @csrf 

                
                   <div class="form-group">
                <label for="exampleInputEmail1">Tên Danh Mục</label>
                    <input type="text" class="form-control"value="{{old('tendanhmuc')}}"onkeyup="ChangeToSlug();" name="tendanhmuc" id="slug" aria-describedby="emailHelp" placeholder="Tên Danh Mục...">

                </div>

        
                 <div class="form-group">
                <label for="exampleInputEmail1">Slug Danh Mục</label>
                    <input type="text" class="form-control" value="{{old('slug_danhmuc')}}" name="slug_danhmuc" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug Danh Mục...">

                </div>

               <div class="form-group">
                <label for="exampleInputEmail1">Mô Tả Danh Mục</label>
                    <input type="text" class="form-control" value="{{old('mota')}}" name="mota" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô Tả Danh Mục...">

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
