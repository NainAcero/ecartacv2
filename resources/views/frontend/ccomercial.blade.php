@if ($galerias != '')
<section class="padding-bottom">
    <header class="section-heading heading-line">
        <h4 class="title-section text-uppercase">Centros Comerciales</h4>
    </header>
    
    <div class="card card-home-category">
    <div class="row no-gutters">
        <div class="col-md-3">
        
        <div class="home-category-banner bg-light-orange" style="background-color: #f9d8ae3d; !important">
            <h5 class="title">Encuentra todo los centros comerciales aquí.</h5>
            <p>los centros comerciales más destacadados de Tacna. </p>
            <a href="{{url('ccomerciales')}}" class="btn btn-outline-primary rounded-pill">ver todos</a>
            <img src="ecom/images/galeria.jpg" class="img-bg" style="right: -50px; bottom: -50px; height: 200px; !important">
        </div>
    
        </div> <!-- col.// -->
        <div class="col-md-9">
            <ul class="row no-gutters bordered-cols">
                @foreach ($galerias as $item)    
                <li class="col-6 col-lg-3 col-md-4">
                    <a href="{{'ccomerciales/'.$item->slug}}" class="item"> 
                        <div class="card-body">
                            <h6 class="title">{{$item->galeria}}</h6>
                            <img class="img-sm float-right" src="ecom/images/galeria.jpg"> 
                            {{-- <p class="text-muted"><i class="fa fa-map-marker-alt"></i>{{$item->direccion}}</p> --}}
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div> <!-- col.// -->
    </div> <!-- row.// -->
    </div> <!-- card.// -->
</section>
@endif
