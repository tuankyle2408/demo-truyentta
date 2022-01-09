@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Người Dùng</div>
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


            <form method="POST" action="{{route('user.store')}}"> <!-- gui bang phuong thuc de truyen du lieu de luu vao co so du lieu-->
                @csrf


                   <div class="form-group">
                <label for="exampleInputEmail1">Tên Người Dùng</label>
                    <input type="text" class="form-control"value="{{old('name')}}" name="tennguoidung" id="slug" aria-describedby="emailHelp" placeholder="Tên Người Dùng...">

                </div>


                 <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" value="{{old('email')}}" name="email" id="convert_slug" aria-describedby="emailHelp" placeholder="Email...">

                </div>

               <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" value="{{old('password')}}" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password...">

                </div>



                <button type="submit" name="themuser" class="btn btn-primary">Thêm</button>

            </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
