@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cấp Quyền : {{$user->name}}</div>

                <form action="{{url('/insert_permission',[$user->id])}}" method="POST">
                  @csrf
                  @if(isset($name_roles))
                  Vai Trò Hiện Tại: {{$name_roles}}
                  @endif

                <br>
                @foreach($permission as $key => $per)
                <div class="form-check">
            <input class="form-check-input" type="checkbox"
            @foreach($get_permission_via_role as $key => $get)
            @if($get->id == $per->id)
            checked
            @endif
            @endforeach

            name="permission[]" value="{{$per->id}}" id="{{$per->id}}">
            <label class="form-check-label" for="{{$per->id}}">
            {{$per->name}}
            </label>
            </div>
            @endforeach
                <input type="submit" name="insertroles" value="Cấp quyền cho user" class="btn btn-success">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">

            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


            <form method="POST" action="{{url('insert-permission')}}"> <!-- gui bang phuong thuc de truyen du lieu de luu vao co so du lieu-->
                @csrf


                   <div class="form-group">
                <label for="exampleInputEmail1">Thêm Tên Quyền</label>
                    <input type="text" class="form-control"value="{{old('permission')}}"" name="permisssion" aria-describedby="emailHelp" placeholder="Tên Quyền...">

                </div>


            </form>
<div>
            <input type="submit" name="insertper" value="Thêm Quyền" class="btn btn-success">
            </div>
        </div>
    </div>
</div>

@endsection
