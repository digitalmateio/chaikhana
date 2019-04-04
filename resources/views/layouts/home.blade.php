
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Chaikhana</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="{{ asset('assets/js/notify.js') }}"></script>
  <script src="{{ asset('assets/js/navbar-fix.js') }}"></script>
  <!-- slick slider -->
  <script src="http://kenwheeler.github.io/slick/slick/slick.js"></script>
  <link rel="stylesheet" href="http://kenwheeler.github.io/slick/slick/slick-theme.css">
  <link rel="stylesheet" href="http://kenwheeler.github.io/slick/slick/slick.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <!-- <link rel="stylesheet" href="assets/css/animate.css"> -->
  <script src="{{ asset('assets/js/chanjeLanguage.js') }}"></script>


</head>
<body>
  
<nav class="navbar navbar-light light-blue lighten-4 fixed-top">
    <!-- Navbar brand -->

    <a class="navbar-brand" href="http://chaikhana.digitalmate.io">
      <img src="{{ asset('assets/img/nav-logo.png') }}" class="nav-logo">
      <span class="logo-text">CHAI KHANA</span>
    </a>
    <center class="nav-li">
      <a href="shop-single2.html" data-toggle="collapse" data-target="#rame-id-contentistvis">EDITIONS</a>
      <a href="#" data-toggle="collapse" data-target="#navbarSupportedContent2">STAFF PICKS</a>
      <a href="#" data-toggle="collapse" data-target="#chaikhanaid">CHAIKHANA</a>
      <i class="fa fa-search msearch" onclick="searchdiv()"></i>
    </center>

    <select id="LanguageSwitcher" class="selectpicker langs" name="locale" >
      <option value="en" @if(App::getLocale('locale') == 'en') {{  'selected' }} @endif>ENGLISH</option>
      <option value="ka" @if(App::getLocale('locale') == 'ka') {{  'selected' }} @endif>ქართული</option>
      <option value="ny" @if(App::getLocale('locale') == 'ny') {{  'selected' }} @endif>Հայերեն</option>
      <option value="az" @if(App::getLocale('locale') == 'az') {{  'selected' }} @endif>Azərbaycan</option>
      <option value="ru" @if(App::getLocale('locale') == 'ru') {{  'selected' }} @endif>Русские</option>
      {{ csrf_field() }}
    </select>

    <!-- Collapse button -->
    <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
      <!-- <span class="dark-blue-text"><i
    class="fas fa-bars fa-1x"></i></span> -->
      <div class="container">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>

    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
      <div class="row">
        <div class="col-md-3">
          <ul class="navbar-nav mr-auto topline">
            <li class="nav-item active main-li">
              <a class="nav-link" href="#">EXPLORE <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="topics.php">EDITIONS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">STAFF PICKS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about-page.php">CHAI KHANA</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="navbar-nav mr-auto topline">
            <li class="nav-item active main-li">
              <a class="nav-link" href="#">COMMUNITY <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop1.php">COMMUNITY SHOP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="agency2.php">COMMUNITY AGENCY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contributors.php">CHAI KHANA AUTHORS</a>
            </li>
          </ul>
        </div>
        <div class="col-md-6">
          <div class="row padding-28">
            <div class="col-md-6 story-social-h"> <a class="latest-stories main-li">  LATEST STORIES</a></div>
            <div class="col-md-6 text-right navsocial">
              <i class="fa fa-facebook-square hand"></i>
              <i class="fa fa-twitter hand"></i>
              <i class="fa fa-instagram hand"></i>
              <i class="fa fa-youtube-square hand"></i>
            </div>
          </div>
          <br>
          <div class="row navimg">
            <div class="col-md-4">
              <img src="{{ asset('assets/img/A Goal For Girls (Millenials).jpeg') }}" class="hand">
            </div>
            <div class="col-md-4">
              <img src="{{ asset('assets/img/How1.jpeg') }}" class="hand">
            </div>
            <div class="col-md-4">
              <img src="{{ asset('assets/img/TheChildrenofAzerbaijan.jpg') }}" class="hand">
              <br>
              <br>
              <a class="nav-link" href="story1.php"><p class="text-right  headtext">See All Stories</p></a>
            </div>
          </div>
          <br>
        </div>
      </div>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent2">
      <div class="row">
        <p class="fullw">STAFF PICKS</p>
      </div>
      <div class="row navimg">
        <div class="col">
          <img src="{{ asset('assets/img/Unseen-borders.png') }}" class="hand">
          <div class="bottom-right">Identity</div>
        </div>
        <div class="col">
          <img src="{{ asset('assets/img/Religious-Beliefs.png') }}" class="hand">
          <div class="bottom-right">Journey</div>
        </div>
        <div class="col">
          <img src="{{ asset('assets/img/Peacebuilders.png') }}" class="hand">
          <div class="bottom-right">Millenials.png</div>
        </div>
        <div class="col">
          <img src="{{ asset('assets/img/Journeys.png') }}" class="hand">
          <div class="bottom-right">Peacebuilders.png</div>
        </div>
        <div class="col">
          <img src="{{ asset('assets/img/Spaces.png') }}" class="hand">
          <div class="bottom-right">Spaces.png</div>
        </div>
        <div class="col">
          <img src="{{ asset('assets/img/MEMORY.png') }}" class="hand">
          <div class="bottom-right">Unseen-borders.png</div>
        </div>
      </div>
      <br>
      <p class="text-center hand explore">Explore more</p>
    </div>

    <div class="collapse navbar-collapse" id="rame-id-contentistvis">
      <div class="row">
        <p class="fullw">
          LAST 10 EDITIONS
          <span class="pull-right hand">EXPLORE MORE</span>
        </p>
      </div>
      <div class="row navimg">
        <div class="col-md-2">
          <img src="{{ asset('assets/img/IDENTITY.png') }}" class="hand">
          <div class="bottom-right">Identity</div>
        </div>
        <div class="col-md-2">
          <img src="{{ asset('assets/img/Journeys.png') }}" class="hand">
          <div class="bottom-right">Identity</div>
        </div>
        <div class="col-md-2">
          <img src="{{ asset('assets/img/MEMORY.png') }}" class="hand">
          <div class="bottom-right">Identity</div>
        </div>
        <div class="col-md-2">
          <img src="{{ asset('assets/img/Millenials.png') }}" class="hand">
          <div class="bottom-right">Identity</div>
        </div>
        <div class="col-md-2">
          <img src="{{ asset('assets/img/Peacebuilders.png') }}" class="hand">
          <div class="bottom-right">Identity</div>
        </div>
        <div class="col-md-2">
          <img src="{{ asset('assets/img/Religious-Beliefs.png') }}" class="hand">
          <div class="bottom-right">Identity</div>
        </div>
      </div>
      <br>
      
      <br>
      <button class="button btn storis">ALL STORIES</button>
    </div>

    <div class="collapse navbar-collapse" id="chaikhanaid">
      <div class="row">
        <p class="fullw">CHAIKHANA</p>
      </div>
      <div class="row navimg">
        <div class="col-md-2">
          <img src="{{ asset('assets/img/navimg1.png') }}" class="hand">
        </div>
        <div class="col-md-2">
          <img src="{{ asset('assets/img/navimg2.png') }}" class="hand">
        </div>
        <div class="col-md-2">
          <img src="{{ asset('assets/img/navimg3.png') }}" class="hand">
        </div>
        <div class="col-md-2">
          <img src="{{ asset('assets/img/navimg3.png') }}" class="hand">
        </div>
      </div>
      <br>
    </div>
    <!-- Collapsible content -->

  </nav>






    @yield('content')







     <footer class="container-fluid bg-4 ">
    <div class="row mobile-footer-content">
      <div class="col-md-12">
        <p class="subscribe">subscribe</p>
      </div>
      <div class="col-md-12">
        <div class="search">
          <input type="text" class="form-control input-sm" maxlength="64" placeholder="  type your email here">
          <button type="submit" class="btn btn-primary btn-sm footersearchbtn">go</button>
        </div>
      </div>

    </div>
    <div class="row text-left left-footer">
      <div class="col-md-8 ">
        
        <u class="footer-ul white">

          @foreach(getFoooterMenu() as $footerMenu)
          <li>
            <span class="hand">
              <a href="{{ $footerMenu->link }}">
                {{ $footerMenu->TextTrans('title') }}
              </a>
            </span>
          </li>
          @endforeach

          @foreach(getPage_social() as $social)
            <li class="social-footer">
              <a href="{{ $social->link }}" target="_blank">
                {!! $social->icon !!}
              </a>
            </li>
          @endforeach

          {{--      
          <li class="social-footer">
            <i class="fa fa-facebook-square hand"></i>
            <i class="fa fa-twitter hand"></i>
            <i class="fa fa-instagram hand"></i>
          </li> 
          --}}
        </u>

        <img src="{{ asset('assets/img/FOOT.png') }}" class="foot">
      </div>
      <div class="col-md-4 right-footer text-center">
        <div class="row desktop-footer-content">
          <div class="col-md-12">
            <p>Subscribe</p>
          </div>
          <div class="col-md-12">
            <div class="search h40">
              <form action="{{ route('subscribe') }}" method="post">
                <input type="email" name="email" class="form-control input-sm h40" maxlength="64" placeholder="type your email here">
                <button type="submit" class="btn btn-primary btn-sm footersearchbtn h40">GO</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </form>
            </div>
          </div>

        </div>

        <script>
          @if(Session::has('msg'))
            $(document).ready(function(){alert('{{ Session::get("msg") }}');});  
          @endif
        </script>

  

        <div class="row">
          <div class="col-md-12">
            <div class="chaikhana-footer-logo text-center">
              <a href="http://chaikhana.digitalmate.io">
                <img src="{{ asset('assets/img/footerlogo.png') }}" class="text-center">
                <img src="{{ asset('assets/img/footerlogo2.png') }}" class="text-center">
              </a>
              
            </div>
          </div>
        </div>
        <img src="{{ asset('assets/img/er.png') }}" class="er">
      </div>

    </div>

  </footer>

</body>
</html>