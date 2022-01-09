
@extends('../layout')
{{--@section('slide')
@include('pages.slide')
@endsection--}}
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{'/'}}">Trang Chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$tendanhmuc}}</li>
  </ol>
</nav>



<h2><strong>{{$tendanhmuc}}</strong></h2>


<div class="album py-5 bg-light">

        <div class="container">


          <div class="row">
            @php
            $count = count($truyen);
            @endphp
            @if($count==0)
            <div class="col-md-12">
              <div class="card mb-3 box-shadow">

                <div class="card-body">
                  <p>Truyện Đang Cập Nhật....</p>

                </div>

              </div>
            </div>

            @else
            @foreach($truyen as $key => $value)

           <div class="col-md-3">
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh )}}" height="300" width="150">
                <div class="card-body">
                   <h5>{{$value->tentruyen}}</h5>
                  <p class="card-text">{{$value->tomtat}}</p>
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
            @endif

                  </div>

                </div>

              </div>



      @endsection
