<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::to('/') }}/public/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="{{URL::to('/') }}/public/css/blog.css" rel="stylesheet">
    <link href="{{ url('public/css/app.css') }}" rel="stylesheet">

     <title>@yield('title')</title>
     <style type="text/css">
       .context-dark, .bg-gray-dark, .bg-primary {
    color: rgba(255, 255, 255, 0.8);
}

.footer-classic a, .footer-classic a:focus, .footer-classic a:active {color: #ffffff;}
.nav-list li {padding-top: 5px;padding-bottom: 5px;}

.nav-list li a:hover:before {margin-left: 0;opacity: 1;visibility: visible;}

ul, ol {list-style: none;padding: 0;margin: 0;}

.social-inner {display: flex;flex-direction: column;align-items: center;width: 100%;padding: 23px;font: 900 13px/1 "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Rob"Helvetica Neue", Arial, sans-serif;text-transform: uppercase;color: rgba(255, 255, 255, 0.5);}

.social-container .col {border: 1px solid rgba(255, 255, 255, 0.1);}

.nav-list li a:before {content: "\f14f";font: 400 21px/1 "Material Design Icons";color: #4d6de6;display: inline-block;vertical-align: baseline;margin-left: -28px;margin-right: 7px;opacity: 0;visibility: hidden;transition: .22s ease;}

     </style>
     @yield('css') 
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item @yield('home_active')">
        <a class="nav-link" href="{{URL::to('/') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item  @yield('about_active')">
        <a class="nav-link" href="{{URL::to('/') }}/about">About Us</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <li class="nav-item  @yield('contact_active')">
        <a class="nav-link " href="{{URL::to('/') }}/contact" tabindex="-1" aria-disabled="true">Cantact Us</a>
      </li>
    </ul>
    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownad" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hi, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                     <a class="dropdown-item" href="{{ route('home') }}" >My Account
                                         
                                      </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
    <form class="form-inline my-2 my-lg-0" action="{{ url('search')}}" method="get">
      <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search" required>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    @yield('content')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
        <div class="container" style="margin-top: 20px;">
          <div class="row row-30 ">
            <div class="col-md-4 col-xl-5">
              <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37" srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
                <p>We are an award-winning creative agency, dedicated to the best result in web design, promotion, business consulting, and marketing.</p>
                <!-- Rights-->
                <p class="rights"><span>©  </span><span class="copyright-year">2018</span><span> </span><span>Waves</span><span>. </span><span>All Rights Reserved.</span></p>
              </div>
            </div>
            <div class="col-md-4">
              <h5>Contacts</h5>
              <dl class="contact-list">
                <dt>Address:</dt>
                <dd>Gali No.1 Mamura Secotr 66 Noida, Uttar Prdesh, India(201301)</dd>
              </dl>
              <dl class="contact-list">
                <dt>email:</dt>
                <dd><a href="mailto:ddpwpareshan@gmail.com">ddpwpareshan@gmail.com</a></dd>
              </dl>
              <dl class="contact-list">
                <dt>phones:</dt>
                <dd><a href="tel:8932854447">8932854447</a>
                </dd>
              </dl>
            </div>
            <div class="col-md-4 col-xl-3">
              <h5>Links</h5>
              <ul class="nav-list">
                <li><a href="#">About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contacts</a></li>
                <li><a href="#">Pricing</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row no-gutters social-container">
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
        </div>
   <p>
    <a href="#">Back to top</a>
  </p>
</footer>
    <script src="{{URL::to('/') }}/public/js/jquery.min.js"></script> 
    <script src="{{URL::to('/') }}/public/js/popper.min.js"></script>
    <script src="{{URL::to('/') }}/public/js/bootstrap.min.js" ></script>
    @yield('script')
  </body>
</html>