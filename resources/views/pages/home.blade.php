
@extends('../layout')
@section('slide')
@include('pages.slide')
@endsection
@section('content')
<h2><strong>TRUYỆN MỚI CẬP NHẬT</strong></h2>

<div class="album py-5 bg-light">

        <div class="container">


          <div class="row">
            @foreach($truyen as $key => $value)

           <div class="col-md-3">
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh )}}" height="300" width="150">
                <div class="card-body">
                   <h5>{{$value->tentruyen}}</h5>
                  <p class="card-text" >{{$value->tomtat}}</p>


                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{url('xem-truyen/'.$value->slug_truyen)}}"  type="button" class="btn btn-sm btn-outline-secondary">Đọc Đi Nào</a>
                    </div>
                    <small class="text-muted">7 mins ago</small>
                  </div>
                </div>

              </div>
            </div>
            @endforeach

                  </div>
                  <a class="btn btn-success" href="{{url('/')}}">Xem tất cả</a>
                </div>

              </div>



      @endsection
