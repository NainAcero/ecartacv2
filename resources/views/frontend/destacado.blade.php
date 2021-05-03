<section  class="padding-bottom-sm">

    <header class="section-heading heading-line">
        <h4 class="title-section text-uppercase">Recomendados</h4>
    </header>

    <div class="row">
        @foreach ($productos as $item)
        <div class="col-lg-3 col-md-4 col-6 mb-3">
            <figure class="card card-product-grid card-lg" style="border-radius: 5px;">
                {{-- <span class="topbar">
					<span class="badge badge-success"> Envío Gratis </span>
                </span> --}}

                <a href="{{ url('productos/'.$item->slug)}}" class="item" data-toggle="tooltip" title="{{$item->ingredientes}}">
                    <div class="img-container position-relative">
                    @if ($item->portada)
                        <img src="{{asset($item->portada)}}" class="card-img-top">
                    @else
                         <img src="{{asset($item->tienda->portada)}}" class="card-img-top">
                    @endif
                    </div>
                </a>


                <div class="card-body card-bodyv2  text-center">

                    <figcaption class="info-wrap">

                    <a href="{{ url('productos/'.$item->slug)}}" class="title" data-toggle="tooltip" title="{{$item->ingredientes}}">
                        <b>{{$item->producto}}</b>: 
                        <small><p class="text-muted">{{$item->ingredientes}}</p></small>
                    </a>

                    <span class="label-rating text-warning">{{$item->tienda->tienda}}</span>

                </figcaption>
                    <div class="bottom-wrap">
                        <div class="price-wrap">
                            <var class="price">S/ {{$item->precio}}</var>
                            @if ($item->oferta)
                                <p class="text-warning float-right mr-2" data-toggle="tooltip" title="Oferta/Promoción"><i class="fas fa-tag"></i></p>
                            @endif
                        </div> <!-- price-wrap.// -->
                    </div> <!-- bottom-wrap.// -->
                </div>


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
