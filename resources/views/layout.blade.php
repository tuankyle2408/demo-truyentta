<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sách Truyện TT</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
         <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



    </head>


    <body class="hello">

       <div class="container">
           <!--------------------- Menu trang chu ---------------------->
           <nav class="navbar navbar-expand-lg navbar-light bg-light" style = "border: 1px solid LightGray" >
  <a class="navbar-brand" href="{{url('/')}}">Truyện T&T</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Trang Chủ <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Danh Mục Truyện
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @foreach($danhmuc as $key => $danh)
          <a class="dropdown-item" href="{{url('danh-muc/'.$danh->slug_danhmuc)}}">{{$danh->tendanhmuc}}</a>

          @endforeach

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Thể Loại
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach($theloai as $key => $the)
          <a class="dropdown-item" href="{{url('the-loai/'.$the->slug_theloai)}}">{{$the->tentheloai}}</a>

          @endforeach

        </div>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="GET">
        @csrf
      <input class="form-control mr-sm-2" type="search" name="tukhoa" placeholder="Tìm truyện, tác giả....v.v................" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm Kiếm</button>

      {{--  <input class="switch_color_xam" type="checkbox" id="switch_color" data-on="Đen" data-off="Xám" data-toggle="toggle" data-onstyle="dark" data-offstyle="light" data-style="border"> --}}
                    <select class="custom-select mr-sm-2" id="switch_color">

                      <option value="xam">Xám</option>
                      <option value="den">Đen</option>

    </select>

    </form>
    <ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						@guest
							@if (Route::has('login'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}">{{ __('Đăng Nhập') }}</a>
								</li>
							@endif

							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Đăng Ký') }}</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }}
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
  </div>

</nav>

<!-----------------------------------------------------------Truyen nen doc ---------------------------------------------- -->
@yield('slide')

<!-- ---------------------------------------------Sách mới cập nhật------------------------------------------------------ -->
@yield('content')





<!-- Plugin zalo  -->
<div class="zalo-chat-widget" data-oaid="579745863508352884" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="300" data-height="300"></div>


<!-- end -->
<!-- -------------------------------Footer----------------------------------------------------------------- -->





<!-- Footer -->
<footer class="page-footer font-small unique-color-dark" style="border: solid;">

  <div style="background-color: #6351ce;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Hãy Kết Nối Đến Chúng Tôi Nào Các Bro !!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Tuấn Thành Entertainment</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Chúng tôi tạo sự giải trí và niềm vui đến các bạn, mong các bạn luôn ủng hộ ghé thăm !</p>
        <div class="fb-page"
data-href="https://www.facebook.com/facebook"
data-width="380"
data-hide-cover="false"
data-show-facepile="false"></div>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Sáng Tạo</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="https://laravel.com">Laravel</a>
        </p>
        <p>
          <a href="https://getbootstrap.com">Bootstrap</a>
        </p>
        <p>
          <a href="https://www.facebook.com/RythmSamuel/">Tuan&Thanh ProVip</a>
        </p>
        <p>
          <a href="https://code.visualstudio.com"> Visual Studio Code</a>
        </p>

      </div>


      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Liên Kết Hữu Ích</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="https://www.facebook.com/RythmSamuel/">Facebook</a>
        </p>
        <p>
          <a href="hutech.edu.vn/">Website</a>
        </p>

        <p>
          <a href="https://www.facebook.com/RythmSamuel/">Hỗ Trợ</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Liên Hệ</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> 475A DBP P.25 Q.BT TP.HCM</p>
        <p>
          <i class="fas fa-envelope mr-3"></i>hothanhtuan292000@gmail.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 84 929 055 221</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 84 398 006 04</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2021 Copyright:
    <a href="https://hutech.edu.vn/"> Hutech.edu.vn</a>
  </div>
  <!-- Copyright -->

  <a href="#" style="right:25px;position:absolute"; >Về Đầu Trang</a>

</footer>
<!-- Footer -->

<!-- -----------------------------------------------------Script------------ ------------------------------ -->

       <script src="{{ asset('js/app.js') }}" defer></script>
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
       <script src="{{asset('js/owl.carousel.js') }}"></script>
       <script src="https://sp.zalo.me/plugins/sdk.js"></script>

       <script type="text/javascript">
      $(document).ready(function(){

         if(localStorage.getItem('switch_color')!==null){
            const data = localStorage.getItem('switch_color');
            const data_obj = JSON.parse(data);
            $(document.body).addClass(data_obj.class_1);
            $('.album').addClass(data_obj.class_2);
            $('.card-body').addClass(data_obj.class_1);
            $('ul.mucluctruyen > li > a').css('color','#fff');
            $('.sidebar > a').css('color','#fff');

            $("select option[value='den']").attr("selected", "selected");

          }
        })
      $("#switch_color").change(function(){
           $(document.body).toggleClass('switch_color');
           $('.album').toggleClass('switch_color_light');
            $('.card-body').toggleClass('switch_color');
             $('.noidungchuong').addClass('noidung_color');
               $('ul.mucluctruyen > li > a').css('color','#fff');
                $('.sidebar > a').css('color','#fff');

           if($(this).val() == 'den'){

               var item = {
                  'class_1':'switch_color',
                  'class_2':'switch_color_light'

                }
              localStorage.setItem('switch_color', JSON.stringify(item));

            }else if($(this).val() == 'xam'){

              localStorage.removeItem('switch_color');
              $('ul.mucluctruyen > li > a').css('color','#000');
               $('.sidebar > a').css('color','#000');

            }




      });

    </script>


<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="2FCOTrsI"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



       <!-- <script type="text/javascript">
      $('#keywords').keyup(function(){
          var keywords = $(this).val();

            if(keywords != '')
              {
               var _token = $('input[name="_token"]').val();

               $.ajax({
                url:"{{url('/autocomplete-ajax')}}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                 $('#search_ajax').fadeIn();
                  $('#search_ajax').html(data);
                }
               });

              }else{

                $('#search_ajax').fadeOut();
              }
          });

          $(document).on('click', '.li_search_ajax', function(){
              $('#keywords').val($(this).text());
              $('#search_ajax').fadeOut();
          });
      </script> -->



       <script type="text/javascript">
           $('.owl-carousel').owlCarousel({
        loop:true,
         margin:10,

        nav:true,
        responsive:{
            0:{
            items:1
           },
             600:{
            items:3
             },
               1000:{
            items:5


        }

    }

})

       </script>
       <script type="text/javascript">
         $('.select-chapter').on('change',function(){

            $('.waiting').text('Đang chuyển chương vui lòng chờ xíu....');

            var url = $(this).val();


            if(url){


              window.location = url;

            }
            return false;
         });

         current_chapter();

         function current_chapter(){
            var url  = window.location.href;  // Lấy đường dẫn hiện tại


            $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
            // Tìm option có giá trị url đã lấy để thêm phương thức selected =selected vào
         }
       </script>

    </body>
</html>
