<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3 col-md-12" style="text-align: center">
                    <a href="{{url('/')}}" class="brand-wrap">
                        <img class="logo" src="{{asset('img/logo4.png')}}">
                    </a> <!-- brand-wrap.// -->
                </div>
                <div class="col-xl-6 col-lg-5 col-md-6">
                    <form action="{{url('s/')}}" class="search-header" method="GET">
                        <div class="input-group w-100">
                            <select class="custom-select border-right"  name="tipo" value="{{request()->tipo}}">
                                    <option value="P">Menú/Carta</option>
                                    <option value="O">Ofertas</option>
                                    <option value="T">Restaurantes</option>
                            </select>
                            <input type="text" name="data" class="form-control" placeholder="Buscar" value="{{request()->data}}" minlength="3">
                            
                            <div class="input-group-append">
                              <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="widgets-wrap float-md-right">
                        {{-- <div class="widget-header mr-3">
                            <a href="{{url('restaurantes')}}" class="widget-view">
                                <img src="{{asset('ecom/images/tiendas.png')}}" alt="" height="45px">
                                <small class="text" style="max-width: 100% !important;">Restaurantes</small>
                            </a>
                        </div> --}}
                        {{-- <div class="widget-header mr-3">
                            <a href="{{url('ccomerciales')}}" class="widget-view">
                                <img src="{{asset('ecom/images/ccomercial.png')}}" alt="" height="50px">
                                <small class="text" style="max-width: 100% !important;">C. Comerciales</small>
                            </a>
                        </div> --}}

                        {{-- <div class="widget-header mr-3">
                            <a href="#" class="widget-view">
                                <div class="icon-area">
                                    <i class="fa fa-user"></i>
                                    <span class="notify">3</span>
                                </div>
                                <small class="text"> My profile </small>
                            </a>
                        </div>
                        <div class="widget-header mr-3">
                            <a href="#" class="widget-view">
                                <div class="icon-area">
                                    <i class="fa fa-comment-dots"></i>
                                    <span class="notify">1</span>
                                </div>
                                <small class="text"> Message </small>
                            </a>
                        </div>
                        <div class="widget-header mr-3">
                            <a href="#" class="widget-view">
                                <div class="icon-area">
                                    <i class="fa fa-store"></i>
                                </div>
                                <small class="text"> Orders </small>
                            </a>
                        </div>
                        <div class="widget-header">
                            <a href="#" class="widget-view">
                                <div class="icon-area">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <small class="text"> Cart </small>
                            </a>
                        </div> --}}
                    </div> <!-- widgets-wrap.// -->
                </div>
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->
    
    
    
    <nav class="navbar navbar-main navbar-expand-lg border-bottom">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bars text-muted mr-2"></i> Categorías </a>
                    <div class="dropdown-menu dropdown-large">
                        <nav class="row">
                            <div class="col-12">
                                @foreach ($categorias as $item)
                                <a href="{{url('c/'.$item->slug)}}">{{$item->categoria}}</a>
                                @endforeach           
                            </div>
                        </nav>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{url('restaurantes')}}">Restaurantes</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{url('ccomerciales')}}">Centros Comerciales</a>
                </li> --}}
                <li class="nav-item">
                {{-- <a class="nav-link" href="#">Quiénes somos?</a> --}}
                </li>
                <li class="nav-item">
                {{-- <a class="nav-link" href="#">Contáctanos</a> --}}
                </li>
            </ul>
            <ul class="navbar-nav ml-md-auto">
                <li class="nav-item">
                    {{-- <a class="nav-link" href="#">Regístrate</a> --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                    {{-- <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Russian</a>
                        <a class="dropdown-item" href="#">French</a>
                        <a class="dropdown-item" href="#">Spanish</a>
                        <a class="dropdown-item" href="#">Chinese</a>
                    </div> --}}
                </li>
            </ul>
        </div> <!-- collapse .// -->
    </div> <!-- container .// -->
    </nav>
    
</header> <!-- section-header.// -->