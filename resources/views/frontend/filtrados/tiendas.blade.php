@extends('frontend.base')

@section('cabecera')
    @include('frontend.cabecera')
@endsection

@section('content')
    @if ($tiendas != '')
    <section  class="padding-bottom-sm">

        <header class="section-heading heading-line">
            <h2 class="title-section text-uppercase">Restaurantes</h2>
        </header>

        <div class="row ">
            @foreach ($tiendas as $item)
            <div class="col-lg-3 col-md-4 col-6 mb-3">
                <a href="{{url('r/'.$item->slug)}}" class="item">
                <article class="card card-product-grid card-lg h-100">
                    <div class="img-container position-relative">
                    <img src="{{asset($item->portada)}}" class="card-img-top">
                    </div>

                    <div class="card-body card-bodyv2  text-center">
                    <h5 class="title text-uppercase">{{$item->tienda}}</h5>
                    <p class="small text-muted">{{$item->direccion}}</p>
                    </div>
                </article>
                <!-- card.// -->
                </a>
            </div> <!-- col.// -->
            @endforeach
        </div> <!-- row.// -->

    </section>

    @endif

@endsection
