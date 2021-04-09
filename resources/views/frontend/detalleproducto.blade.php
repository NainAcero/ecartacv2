@extends('frontend.base')

@section('cabecera')
@include('frontend.cabecera')
@endsection

@section('content')

<section class="py-3 bg-light">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Categoría</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Menú/Carta</li>
        </ol>
    </div>
</section>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg-white padding-y">
    <div class="container">
        <style>
            .active{
                opacity: 1;
            }
        </style>
        @section('ogTitle')
        {{$producto->categoria->categoria}}: {{$producto->producto}}
        @stop
        @section('ogDesc')
            {{$producto->ingredientes}}
        @stop
        @section('ogImage')
            {{asset($producto->portada)}}
        @stop
        <!-- ============================ ITEM DETAIL ======================== -->
        <div class="row">
            <aside class="col-md-6">
                <div class="card">
                    <article class="gallery-wrap"> 
                        <div class="img-big-wrap" style="text-align: center" >
                            <div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        
                                        @if ($producto->portada)
                                            <img src="{{asset($producto->portada)}}" alt="First slide"> 
                                        @else
                                            <img src="{{asset($producto->tienda->portada)}}" alt="First slide"> 
                                        @endif
                                    </div>
                                    {{-- <img src="{{asset($producto->portada)}}" alt="product" class="active" id="currentImage"> --}}
                                    
                                </div>
                            </div> 
                        </div>
                        {{-- <div class="thumbs-wrap">
                                    <div class="item-thumb">
                                        <img src="{{asset($producto->portada)}}">
                                    </div>
                            @if ($galeriimagen)
                                @if ($galeriimagen->imagen_pri)
                                    <div class="item-thumb">
                                        <img src="{{asset($galeriimagen->imagen_pri)}}">
                                    </div>
                                @endif
                                @if ($galeriimagen->imagen_seg)
                                    <div class="item-thumb">
                                        <img src="{{asset($galeriimagen->imagen_seg)}}">
                                    </div>
                                @endif
                                @if ($galeriimagen->imagen_ter)
                                    <div class="item-thumb">
                                        <img src="{{asset($galeriimagen->imagen_ter)}}">
                                    </div>
                                @endif
                            @endif
                        </div> --}}
                    </article>
                </div>
            </aside>
            <main class="col-md-6">
                <article class="product-info-aside">
                    <h2 class="title mt-3">{{$producto->producto}}</h2>
                    <p>
                        {{$producto->ingredientes}}
                    </p>
                    <p>
                        {!! $producto->contenido !!}
                    </p>
                    <div class="mb-3"> 
                        <var class="price h4">S/ {{$producto->precio}}</var> 
                        @if ($producto->oferta)
                            <p class="text-warning mr-2" data-toggle="tooltip" title="Oferta/Promoción"><i class="fas fa-tag"></i> En oferta</p>
                        @endif
                        {{-- <span class="text-muted">S/ 562.65 incl. VAT</span>  --}}
                    </div> <!-- price-detail-wrap .// -->
                    <div class="form-row  mt-4">
                        {{-- <div class="form-group col-md flex-grow-0">
                            <div class="input-group mb-3 input-spinner">
                                <div class="input-group-prepend">
                                    <button class="btn btn-light" type="button" id="button-plus"> + </button>
                                </div>
                                <input type="text" class="form-control" value="1">
                                <div class="input-group-append">
                                    <button class="btn btn-light" type="button" id="button-minus"> &minus; </button>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group col-md">
                            {{-- <a href="#"  class="btn  btn-primary"> 
                                <i class="fas fa-shopping-cart"></i> <span class="text">Agregar al carrito</span> 
                            </a> --}}
                            <a 
                            href="https://wa.me/51{{$producto->tienda->celular}}?text=Hola, deseo realizar este pedido. %0D%0A *{{$producto->producto}}* %0D%0A *Precio:* S/ {{$producto->precio}} %0D%0A%0D%0A Gracias" 
                            target=".../" 
                            class="btn btn-success">
                                <i class="fas fa-shopping-cart"></i> Pedir por delivery <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="tel:+51{{$producto->tienda->celular}}" class="btn btn-info">{{$producto->tienda->celular}} <i class="fas fa-phone"></i></a>
                            
                            {{-- <a href="#" class="btn btn-light">
                                <i class="fas fa-envelope"></i> <span class="text">Facebook</span> 
                            </a>
                            <a href="#" class="btn btn-light">
                                <i class="fas fa-envelope"></i> <span class="text">Web</span> 
                            </a> --}}
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                    {{-- <div class="rating-wrap my-3">
                        <ul class="rating-stars">
                            <li style="width:80%" class="stars-active"> 
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                            </li>
                            <li>
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                            </li>
                        </ul>
                        <small class="label-rating text-muted">132 vistas</small>
                        <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 ordenes </small>
                    </div> --}}
                    <hr>
                    <dl class="row">
                        <dt class="col-sm-2">Restaurante: </dt>
                        <dd class="col-sm-10"><a href="{{url('r/'.$producto->tienda->slug)}}"  style="color: royalblue">{{$producto->tienda->tienda}}</a></dd>
                    </dl>
                </article> <!-- product-info-aside .// -->
            </main> <!-- col.// -->
        </div> <!-- row.// -->

        <!-- ================ ITEM DETAIL END .// ================= -->


    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
{{-- <section class="section-name padding-y bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h5 class="title-description">Descripción</h5>
                {!! $producto->contenido !!}
            </div>
        </div>
    </div>
</section> --}}
<!-- ========================= SECTION CONTENT END// ========================= -->
<script>
    // $('.item-thumb').on('click', function() {
    //     const image_element = $(this).find('img');
    //     $('.product-image').prop('src', $(image_element).attr('src'))
    //     $('.item-thumb.active').removeClass('active');
    //     $(this).addClass('active');
    // });

    (function(){
            const currentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.item-thumb');
            images.forEach((element) => element.addEventListener('click', thumbnailClick));
            function thumbnailClick(e) {
                console.log(currentImage)
                currentImage.classList.remove('active');
                currentImage.addEventListener('transitionend', () => {
                    currentImage.src = this.querySelector('img').src;
                    console.log(currentImage.src)
                    currentImage.classList.add('active');
                })
                // console.log(currentImage)
                images.forEach((element) => element.classList.remove('selected'));
                console.log(images)
                this.classList.add('selected');
            }
        })();
</script>

@endsection
