@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">Liệt Kê User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped" >
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tên User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Password</th>
                          <th scope="col">Vai Trò</th>
                          <th scope="col">Quyền</th>
                          <th scope="col">Quản Lý</th>


                        </tr>
                      </thead>
                      <tbody>
                          @foreach($user as $key => $u)

                        <tr>
                        <th scope="row">{{$key}}</th>
                        <th scope="row">{{$u->name}}</th>
                        <th scope="row">{{$u->email}}</th>
                        <th scope="row">{{$u->password}}</th>

                        <th scope="row">
                            @foreach($u->roles as $key => $role)
                            <span class="badge badge-dark"> {{$role->name}}</span>
                            @endforeach
                        </th>
                        <th scope="row">
                        @foreach($role->permissions as $key => $permission)
                             <span class="badge badge-info">{{$permission->name}}</span>
                            @endforeach
                        </th>
                        <th scope="row">
                            <a href="{{url('phan-vai-tro/'.$u->id)}}" class="btn btn-primary">Phân Vai Tròn</a>
                            <a href="{{url('phan-quyen/'.$u->id)}}" class="btn btn-danger">Phân Quyền</a>
                            <a href="{{url('impersonate/user/'.$u->id)}}" class="btn btn-success">Chuyển Quyền Nhanh</a>
                        </th>



                          </td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
