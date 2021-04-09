<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="cache-control" content="max-age=604800" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


		<meta property="og:title" content="@yield('ogTitle', 'eCartac - Ecommerce de la Gastronomia Tacneña')"/>
		{{-- <meta name="description" content="eCartac - Un Ecommerce de restaurantes de Tacna donde podrás visualizar sus cartas digitales."> --}}
		<meta property="og:description" content="@yield('ogDesc', 'eCartac - Un Ecommerce de restaurantes de Tacna donde podrás visualizar sus cartas digitales.')"/>
		<meta property="og:image" content="@yield('ogImage', 'https://ecartac.com/img/logo4.png')"/>
		<meta property="og:image:width" content="200" />
		{{-- <meta property="og:image:height" content="400" /> --}}

        <meta name="keywords" content="ecommerce tacna, restaurantes tacna, comida tacna, plato criollo tacna, delivery tacna, platos a la carta tacna, mercado de comidas tacna, qr carta, qr restaurantes tacna">

		{{-- <title>eCartac - Ecommerce de la Gastronomia Tacneña</title> --}}

        <meta name="csrf-token" content="{{ csrf_token() }}">


        <link href="{{asset('ecom/images/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">

		<!-- jQuery -->
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
        <link href="{{asset('ecom/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


        <!-- Font awesome 5 -->
        <link href="{{asset('ecom/fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">

        <!-- custom style -->
        <link href="{{asset('ecom/css/ui.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('ecom/css/responsive.css')}}" rel="stylesheet" type="text/css" />

		<link href="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/plugins/owlcarousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="https://bootstrap-ecommerce.com/bootstrap-ecommerce-html/plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">

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
                font-size: 16px; /* Cambiar el tamaño de la tipografia */
                text-transform: uppercase; /* Texto en mayusculas */
                font-weight: bold; /* Fuente en negrita o bold */
                color: #ffffff; /* Color del texto */
                border-radius: 5px; /* Borde del boton */
                letter-spacing: 2px; /* Espacio entre letras */
                background-color: #E91E63; /* Color de fondo */
                padding: 18px 30px; /* Relleno del boton */
                position: fixed;
                bottom: 30px;
                right: 120px;
                transition: all 300ms ease 0ms;
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                z-index: 99;
            }

            .btn-flotante-ecart {
                text-transform: uppercase; /* Texto en mayusculas */
                font-weight: bold; /* Fuente en negrita o bold */
                color: #000; /* Color del texto */
                border-radius: 5px; /* Borde del boton */
                letter-spacing: 2px; /* Espacio entre letras */
                background-color: #fff; /* Color de fondo */
                padding: 18px 30px; /* Relleno del boton */
                position: fixed;
                bottom: 0px;
                right: 0px;
                transition: all 300ms ease 0ms;
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                z-index: 99;
            }

            .btn-flotante:hover {
                background-color: #2c2fa5; /* Color de fondo al pasar el cursor */
                box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
                transform: translateY(-7px);
            }
            @media only screen and (max-width: 600px) {
                .btn-flotante {
                    font-size: 14px;
                    padding: 12px 20px;
                    bottom: 20px;
                    right: 20px;
                }
            }
            </style>

        @yield('styles')
    </head>
	<body>
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
				<section class="footer-top  padding-y-lg">
					<div class="row">
						<aside class="col-md-4 col-12">
							<article class="mr-md-4">
								{{-- <h5 class="title">Sobre nosotros</h5> --}}
								<p>eCartac, una plataforma web que muestra la Carta/Menú de los Restaurantes y/o al escanear el código QR desde su celular.</p>
								{{-- <p>tus clientes podrán escanear el código QR desde su celular y acceder al menú online de tu local.</p> --}}

								<ul class="list-icon">
									<li> <i class="icon fa fa-map-marker"> </i>Tacna </li>
									<li> <i class="icon fa fa-envelope"> </i> wgcalisaya@gmail.com</li>
									<li>
										{{-- <i class="icon fa fa-whatsapp"> </i>  --}}
										<i class="fab fa-whatsapp-square" style="color:#50c55c;"></i>
										<a href="https://wa.me/51952633245?text=Más información para publicar mi menu/carta ..." target="../" class="widget-view">952633245</a>
										</li>
									{{-- <li> <i class="icon fa fa-clock"> </i>Lun-Vie 9:00am - 5:00pm</li> --}}
								</ul>
							</article>
						</aside>
						{{-- <aside class="col-md col-6">
							<h5 class="title">Información</h5>
							<ul class="list-unstyled">
								<li> <a href="#">Sobre nosotros</a></li>
								<li> <a href="#">Contáctanos</a></li>
								<li> <a href="#">Encuentra un restaurant</a></li>
								<li> <a href="#">Terminos y condiciónes</a></li>
								<li> <a href="#">Sitios</a></li>
							</ul>
						</aside>
						<aside class="col-md col-6">
							<h5 class="title">Preguntas frecuentes</h5>
							<ul class="list-unstyled">
								<li> <a href="#">Formas de pago</a></li>
								<li> <a href="#">Estado de pedidos</a></li>
								<li> <a href="#">Info de envíos</a></li>
								<li> <a href="#">Disponibilidad de productos</a></li>
							</ul>
						</aside> --}}
						<aside class="col-md-4 col-12">
							<p class="text-white-50 mb-2">Síguienos en nuestra red social</p>
							<div>
								{{-- <a href="https://www.facebook.com/ecartac" target="../" class="btn btn-icon btn-outline-light"><i class="fab fa-facebook-f"></i></a> --}}
								{{-- <a href="#" class="btn btn-icon btn-outline-light"><i class="fab fa-twitter"></i></a>
								<a href="#" class="btn btn-icon btn-outline-light"><i class="fab fa-instagram"></i></a>
								<a href="#" class="btn btn-icon btn-outline-light"><i class="fab fa-youtube"></i></a> --}}
								{{-- <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fecartac&tabs&width=340&height=130&small_header=false&adapt_container_width=false&hide_cover=true&show_facepile=false&appId=369870783750134" width="340" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> --}}
								<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fecartac&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=369870783750134" width="340" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
							</div>

						</aside>
					</div> <!-- row.// -->
				</section>	<!-- footer-top.// -->

				<section class="footer-bottom text-center">
					<p class="text-muted"> &copy 2021 NodeLab, All rights reserved </p>
			</section>
			</div><!-- //container -->
		</footer>
			<!-- ========================= FOOTER END // ========================= -->




        @yield('scripts')

	</body>

</html>
