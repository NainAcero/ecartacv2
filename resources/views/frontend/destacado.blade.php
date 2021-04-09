<section  class="padding-bottom-sm">

    <header class="section-heading heading-line">
        <h4 class="title-section text-uppercase">Recomendados</h4>
    </header>

    <div class="row row-sm">
        @foreach ($productos as $item)
        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
            <figure class="card card-product-grid card-lg" style="border-radius: 5px;">
                {{-- <span class="topbar">
					<span class="badge badge-success"> Envío Gratis </span>
                </span> --}}

                <a href="{{ url('productos/'.$item->slug)}}" class="img-wrap" style="border-top-left-radius: 5px;border-top-right-radius: 5px;" data-toggle="tooltip" title="{{$item->ingredientes}}">
                    @if ($item->portada)
                        {{-- <img src="{{asset($item->portada)}}"> --}}
                        <img src="{{asset('img/elpadrino-logo.png')}}">
                    @else
                        {{-- <img src="{{asset($item->tienda->portada)}}">  --}}
                        <img src="{{asset('img/elpadrino-logo.png')}}">
                    @endif
                </a>
                <figcaption class="info-wrap">

                        {{-- {{ $item->tienda->categorias[0]->categoria }} --}}

                        <a href="{{ url('productos/'.$item->slug)}}" class="title" data-toggle="tooltip" title="{{$item->ingredientes}}"><b>{{$item->categoria->categoria}}:</b> {{$item->producto}}</a>

                        <small><p class="text-muted">{{$item->tienda->tienda}}</p></small>
                        {{-- <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                        </div> --}}
                </figcaption>
                <div class="bottom-wrap">
                    {{-- <a href="#" class="btn  btn-primary float-right"> Buy now </a> --}}
                    {{-- <a class="btn btn-sm btn-success float-right" href="https://wa.me/51{{$item->tienda->celular}}?text=Hola, deseo realizar este pedido. %0D%0A *{{$item->producto}}* %0D%0A *Precio:* S/ {{$item->precio}} %0D%0A%0D%0A Gracias" target="../">Delivery <i class="fab fa-whatsapp"></i></a> --}}
                    <div class="price-wrap">
                        {{-- <span class="price h5">S/ {{$item->precio}}</span>  --}}
                        <var class="price">S/ {{$item->precio}}</var>
                        {{-- <small class="text-warning">Envío Gratis</small> --}}
                        @if ($item->oferta)
                            <p class="text-warning float-right mr-2" data-toggle="tooltip" title="Oferta/Promoción"><i class="fas fa-tag"></i></p>
                        @endif

                    </div> <!-- price-wrap.// -->
                </div> <!-- bottom-wrap.// -->
            </figure>

            {{-- <div class="card card-sm card-product-grid">
                <a href="{{ url('productos/'.$item->slug)}}" class="img-wrap"> <img src="{{asset($item->portada)}}"> </a>
                <figcaption class="info-wrap">
                    <a href="{{ url('productos/'.$item->slug)}}" class="title text-truncate">{{$item->producto}}</a>
                    <div class="mt-2">
                        <var class="price">S/ {{$item->precio}}</var>
                        <a href="https://wa.me/51{{$item->tienda->celular}}?text=Hola, deseo comprar este producto.%0D%0A *{{$item->producto}}* %0D%0A *Precio:* S/ {{$item->precio}} %0D%0A%0D%0A Gracias" target="../" class="btn btn-sm btn-outline-success float-right">Pedir <i class="fab fa-whatsapp"></i></a>
                    </div>
                </figcaption>
            </div> --}}
        </div>
        @endforeach
    </div> <!-- row.// -->
    {{ $productos->appends(['tipo'=>request('tipo'), 'data' => request('data')])->links() }}
</section>
