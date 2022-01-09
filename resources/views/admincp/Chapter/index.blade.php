@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt Kê Chapter</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thread>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Chapter</th>
                                <th scope="col">Slug Chapter</th>
                                <th scope="col">Tóm Tắt</th>
                                <th scope="col">Thuộc Truyện</th>
                                <th scope="col">Kích Hoạt</th>
                                <th scope="col">Quản Lý</th>

                            </tr>
                        </thread>
                        <tbody>
                            @foreach($chapter as $key => $chap)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$chap->tieude}}</td>
                                 <td>{{$chap->slug_chapter}}</td>
                                <td>{{$chap->tomtat}}</td>
                                <td>{{$chap->truyen->tentruyen}}</td>
                                <td>
                               @if($chap->kichhoat==0)
                              <span class="text text-success">Kích Hoạt</span>
                               @else
                               <span class="text text-danger">Không Kích Hoạt</span>
                               @endif
                                 </td>

                                <td>
                                     <a href="{{route('chapter.edit',[$chap->id])}}" class="btn btn-warning">Edit</a>

                                    <form action="{{route('chapter.destroy',[$chap->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có muốn xóa Chapter này hay không?');" class="btn btn-danger">Delete</button>

                                    </form>
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
