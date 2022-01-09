@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liệt Kê Truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


            <table class="table table-striped table-responsive" >
                        <thread>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Truyện</th>
                                <th scope="col">Từ Khóa</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Slug Truyện</th>
                                <th scope="col">Tóm Tắt</th>
                                <th scope="col">Danh Mục</th>
                                <th scope="col">Thể Loại</th>
                                <th scope="col">Đăng Truyện</th>
                                <th scope="col">Kích Hoạt</th>
                                <th scope="col">Quản Lý</th>

                            </tr>
                        </thread>
                        <tbody>
                        @foreach($list_truyen as $key => $truyen)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$truyen->tentruyen}}</td>
                                <td>{{$truyen->tukhoa}}</td>
                                <td><img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="250" width="150"></td>
                                 <td>{{$truyen->slug_truyen}}</td>
                                <td>{{$truyen->tomtat}}</td>
                                <td>{{$truyen->DanhMucTruyen->tendanhmuc}}</td>
                                <td>{{$truyen->theloai->tentheloai}}</td>
                                <td>{{$truyen->created_at}}</td>



                            <td>

                               @if($truyen->kichhoat==0)

                              <span class="text text-success">Kích Hoạt</span>
                               @else
                               <span class="text text-danger">Không Kích Hoạt</span>
                               @endif
                                 </td>

                                <td>
                                @can('edit articles')

                                     <a href="{{route('truyen.edit',[$truyen->id])}}" class="btn btn-warning">Edit</a>
                                     @endcan

                                     @can('delete articles')
                                    <form action="{{route('truyen.destroy',[$truyen->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có muốn xóa truyện này không?');" class="btn btn-danger">Delete</button>

                                    </form>
                                    @endcan
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
