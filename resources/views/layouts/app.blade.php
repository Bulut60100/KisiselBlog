<!DOCTYPE html>
<html lang="en">

  <head>
    <title>@yield('title','Blog')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />

    <link rel="shortcut icon" href="ftco-32x32.png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">


    <link rel="stylesheet" href="{{asset('assets/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/flaticon/font/flaticon.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  </head>

  <body>

    <header role="banner">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
          <div class="container">
            <a class="navbar-brand" href="/">Mustafa Bulut</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample05">
              <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
                <li class="nav-item">
                  <a class="nav-link active" href="/">Anasayfa</a>
                </li>
                <li class="nav-item dropdown">
                  <p class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategoriler</p>
                  <div class="dropdown-menu" aria-labelledby="dropdown04">
                    @foreach ($categories as $key => $value)
                        <a class="dropdown-item" href="{{route('category',$value->slug)}}">{{$value['name']}}</a>
                    @endforeach

                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('aboutus')}}">Hakkımızda</a>
                </li>
              </ul>

              <ul class="navbar-nav ml-auto">
                <li class="nav-item cta-btn">
                  <a class="nav-link" href="{{route('contact')}}">İletişim</a>
                </li>
              </ul>

            </div>
          </div>
        </nav>
      </header>

      <div class="slider-wrap">
        <section class="home-slider owl-carousel">

          <div class="slider-item" style="background-image: url('{{asset('assets/img/slider.jpg')}}')">
            <div class="container">
              <div class="row slider-text align-items-center justify-content-center">
                <div class="col-md-8 text-center col-sm-12 ">
                  <h1 data-aos="fade-up">Web Tasarım|Yazılım</h1>
                  <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Türkçe yönetim panelli modern kullanıcı dostu ve mobil uyumlu web siteniz olsun. Aklınızdaki projeyi veya istediğiniz yazılım hizmetinizi hayata geçirelim.</p>
                  <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-white btn-outline-white">Get Started</a></p>
                </div>
              </div>
            </div>

          </div>

        </section>
      <!-- END slider -->
      </div>

      @yield('content')

      <footer class="site-footer" role="contentinfo">

        <div class="container">
          <div class="row mb-5">
            <div class="col-md-4 mb-5">
              <h3>Mustafabulut.com</h3>
              <p class="mb-5">Faydalı bilgileri paylaşmayı amaçlamış , kaliteli hizmetler vermeyi
                vizyonu olarak br görmüş genç bir geliştirici.</p>
              <ul class="list-unstyled footer-link d-flex footer-social">
                <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
                <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
                <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
                <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
              </ul>

            </div>
            <div class="col-md-5 mb-5">
              <div>
                <h3>İletişim</h3>
                <ul class="list-unstyled footer-link">
                  <li class="d-block">
                    <span class="d-block text-black">Adres:</span>
                    <span>Tokat/Merkez</span></li>
                  <li class="d-block"><span class="d-block text-black">Telefon:</span><span>+90 534 977 08 69</span></li>
                  <li class="d-block"><span class="d-block text-black">Email:</span><span>muhammedmustafabulut6@gmail.com</span></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 mb-5">
              <h3>Hizmetlerim</h3>
              <ul class="list-unstyled footer-link">
                <li><a href="#">Web Yazılım</a></li>
                <li><a href="#">Web Tasarım</a></li>
                <li><a href="#">Mobil Uygulama</a></li>
                <li><a href="#">Wordpress</a></li>
              </ul>
            </div>
            <div class="col-md-3">

            </div>
          </div>
          <div class="row">
            <div class="col-12 text-md-center text-left">
              <p>
                <!-- Link back to Free-Template.co can't be removed. Template is licensed under CC BY 3.0. -->
            <small class="block">&copy; 2019 <strong class="text-black">Foody</strong> Free Template. All Rights Reserved. <br> Design by <a href="https://free-template.co/" target="_blank">Free-Template.co</a></small>
            </p>
            </div>
          </div>
        </div>
      </footer>

    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/aos.js')}}"></script>

    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/magnific-popup-options.js')}}"></script>


    <script src="{{asset('assets/js/main.js')}}"></script>



  </body>
