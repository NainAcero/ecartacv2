<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="pragma" content="no-cache" />
  <meta http-equiv="cache-control" content="max-age=604800" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <meta property="og:title" content="@yield('ogTitle', 'eCartac - Cartas . Qr . Restaurantes')" />
  {{-- <meta name="description" content="eCartac - Un Ecommerce de restaurantes de Tacna donde podrás visualizar sus cartas digitales."> --}}
  <meta property="og:description"
    content="@yield('ogDesc', 'eCartac - Un Ecommerce de restaurantes donde podrás visualizar las cartas digitales.')" />
  <meta property="og:image" content="@yield('ogImage', 'https://ecartac.com/img/logo5.png')" />
  <meta property="og:image:width" content="200" />
  {{-- <meta property="og:image:height" content="400" /> --}}

  <meta name="keywords"
    content="ecommerce tacna, restaurantes tacna, comida tacna, plato criollo tacna, delivery tacna, platos a la carta tacna, mercado de comidas tacna, qr carta, qr restaurantes tacna">

  {{-- <title>eCartac - Ecommerce de la Gastronomia Tacneña</title> --}}

  <meta name="csrf-token" content="{{ csrf_token() }}">


  <link href="{{asset('ecom/images/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">

  <!-- jQuery -->
  {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7054594845763014"
  crossorigin="anonymous"></script> --}}
  <script src="{{asset('ecom/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-053M0WK7S9"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-053M0WK7S9');
  </script>

  {{-- <script type="text/javascript">
			WebFontConfig = {
				google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
			};
			(function(d) {
				var wf = d.createElement('script'), s = d.scripts[0];
				wf.src = "{{asset('assets/js/webfont.js')}}";
  wf.async = true;
  s.parentNode.insertBefore(wf, s);
  })(document);
  </script> --}}

  <!-- Bootstrap4 files-->
  <script src="{{asset('ecom/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
  <link href="{{asset('ecom/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


  <!-- Font awesome 5 -->
  <link href="{{asset('ecom/fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">

  <!-- custom style -->
  <link href="{{mix('css/ui.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('ecom/css/responsive.css')}}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- custom javascript -->
  <script src="{{asset('ecom/js/script.js')}}" type="text/javascript"></script>

  <style type="text/css">
    .no-img-cellphone {
      display: block;
    }

    .img-responsi-feria {
      margin-left: 94%;
    }

    .ocultar_name {
      display: block;
    }

    @media (max-width: 720px) {
      .ocultar_name {
        display: none;
      }

      .no-img-cellphone {
        display: none;
      }

      .img-responsi-feria {
        margin-left: 80%;
      }
    }

    .btn-flotante {
      font-size: 16px;
      text-transform: uppercase;
      font-weight: bold;
      color: #ffffff;
      border-radius: 5px;
      background-color: #ff6a00;
      padding: 14px 30px;

      -webkit-transition: all 300ms ease 0ms;

      -o-transition: all 300ms ease 0ms;

      transition: all 300ms ease 0ms;
      -webkit-box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);

      display: -webkit-box;

      display: -ms-flexbox;

      display: flex;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
    }

    .btn-flotante h5 {
      letter-spacing: 1px
    }

    .btn-flotante-ecart {
      font-weight: bold;
      color: #000;
      border-radius: 5px;
      background-color: #fff;
      padding: 18px 30px;
      position: fixed;
      bottom: 0px;
      right: 0px;
      -webkit-transition: all 300ms ease 0ms;
      -o-transition: all 300ms ease 0ms;
      transition: all 300ms ease 0ms;
      -webkit-box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      z-index: 99;
    }

    .btn-flotante:hover {
      background-color: #F79D5C;
      -webkit-box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
      box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
      -webkit-transform: translateY(-7px);
      -ms-transform: translateY(-7px);
      transform: translateY(-7px);
      color: #fff
    }

    .btn-flotante:hover span {
      background-color: #ff6a00 !important;
    }

    @media only screen and (max-width: 600px) {
      .btn-flotante {
        font-size: 14px;
        padding: 12px 20px;
      }
    }
  </style>

  @yield('styles')
</head>

<body>
  <!-- Messenger plugin de chat Code -->
  {{-- <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v10.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script> --}}

  <!-- Your plugin de chat code -->
  <div class="fb-customerchat" attribution="biz_inbox" page_id="105521838211254">
  </div>
  <b class="screen-overlay"></b>
  @yield('cabecera')

  <div class="container">
    @yield('content')
    <!-- =============== SECTION REGION =============== -->
    {{-- <section  class="padding-bottom">

		<header class="section-heading heading-line">
			<h4 class="title-section text-uppercase">Choose region</h4>
		</header>

		<ul class="row mt-4">
			<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="ecom/images/icons/flags/CN.png"> <span>China</span> </a></li>
			<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="ecom/images/icons/flags/DE.png"> <span>Germany</span> </a></li>
			<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="ecom/images/icons/flags/AU.png"> <span>Australia</span> </a></li>
			<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="ecom/images/icons/flags/RU.png"> <span>Russia</span> </a></li>
			<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="ecom/images/icons/flags/IN.png"> <span>India</span> </a></li>
			<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="ecom/images/icons/flags/GB.png"> <span>England</span> </a></li>
			<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="ecom/images/icons/flags/TR.png"> <span>Turkey</span> </a></li>
			<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="ecom/images/icons/flags/UZ.png"> <span>Uzbekistan</span> </a></li>
			<li class="col-md col-6"><a href="#" class="icontext"> <i class="mr-3 fa fa-ellipsis-h"></i> <span>More regions</span> </a></li>
		</ul>
		</section> --}}
    <!-- =============== SECTION REGION .//END =============== -->

    <article class="my-4">
      {{-- <img src="{{asset('ecom/images/banners/ad-sm.png')}}" class="w-100"> --}}
    </article>
  </div>
  <!-- container end.// -->

  <!-- ========================= SECTION SUBSCRIBE  ========================= -->
  {{-- <section class="section-subscribe padding-y-lg">
			<div class="container">
				<p class="pb-2 text-center text-white">Te mostramos las últimas tendencias en platos a la carta.</p>
				<div class="row justify-content-md-center">
					<div class="col-lg-5 col-md-6">
						<form class="form-row">
							<div class="col-md-8 col-7">
							<input class="form-control border-0" placeholder="Tu email" type="email">
							</div>
							<div class="col-md-4 col-5">
							<button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscríbete </button>
							</div>
						</form>
						<small class="form-text text-white-50">Nunca compartiremos su dirección de correo electrónico con un tercero. </small>
					</div>
				</div>
			</div>
		</section> --}}
  <!-- ========================= SECTION SUBSCRIBE END// ========================= -->


  <!-- ========================= FOOTER ========================= -->
  <footer class="section-footer bg-secondary text-white">
    <div class="container">
      @yield('quienessomos')

      <section class="footer-bottom text-center">
        <p class="text-muted"> &copy 2021 eCartac, Todos los derechos reservados </p>
      </section>
    </div><!-- //container -->
  </footer>
  <!-- ========================= FOOTER END // ========================= -->




  @yield('scripts')

</body>

</html>