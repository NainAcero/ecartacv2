<header class="section-header">
    <section class="header-main border-bottom">
      <div class="nav-container">
        <div class="row align-items-center">
          <div class="col-lg-3 col-md-3 col-6">
            <a href="{{url('/')}}" class="brand-wrap">
              <img class="logo" src="{{asset('img/logo4.png')}}">
            </a> <!-- brand-wrap.// -->
          </div>
          <div class="col-lg-5 col-md-6 px-lg-4 order-md-0 order-3 px-0">
            <form action="{{url('s/')}}" class="search-header" method="GET">
              <div class="input-group w-100">
                <select class="custom-select border-right" name="tipo" value="{{request()->tipo}}">
                  <option value="P">Menú/Carta</option>
                  <option value="O">Ofertas</option>
                  <option value="T">Restaurantes</option>
                </select>
                <input type="text" name="data" class="form-control" placeholder="Buscar" value="{{request()->data}}"
                  minlength="3">

                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
            </form> <!-- search-wrap .end// -->
          </div> <!-- col.// -->
          <div class="col-lg-4 col-md-3 col-6">
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
          <nav class="navbar navbar-main navbar-expand-lg p-0 justify-content-end">
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
              aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button> --}}

            <div class="d-flex align-items-center" id="main_nav">
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
        <li class="nav-item mr-4">
          <a class="nav-link navlink-icon" href="{{url('restaurantes')}}"><svg xmlns="http://www.w3.org/2000/svg"
              width="18" viewBox="0 0 512 512">
              <title>Restaurantes</title>
              <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
                d="M448 448V240M64 240v208M382.47 48H129.53c-21.79 0-41.47 12-49.93 30.46L36.3 173c-14.58 31.81 9.63 67.85 47.19 69h2c31.4 0 56.85-25.18 56.85-52.23 0 27 25.46 52.23 56.86 52.23s56.8-23.38 56.8-52.23c0 27 25.45 52.23 56.85 52.23s56.86-23.38 56.86-52.23c0 28.85 25.45 52.23 56.85 52.23h1.95c37.56-1.17 61.77-37.21 47.19-69l-43.3-94.54C423.94 60 404.26 48 382.47 48zM32 464h448M136 288h80a24 24 0 0124 24v88h0-128 0v-88a24 24 0 0124-24zM288 464V312a24 24 0 0124-24h64a24 24 0 0124 24v152" />
            </svg><span class="d-lg-block d-none">Restaurantes</span></a>
        </li>
        {{-- <li class="nav-item">
                                                  <a class="nav-link" href="{{url('ccomerciales')}}">Centros
        Comerciales</a>
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
            <a class="nav-link btn btn-primary" href="{{ url('feriadigital') }}">Feria</a>
            {{-- <div class="dropdown-menu dropdown-menu-right">
                                                      <a class="dropdown-item" href="#">Russian</a>
                                                      <a class="dropdown-item" href="#">French</a>
                                                      <a class="dropdown-item" href="#">Spanish</a>
                                                      <a class="dropdown-item" href="#">Chinese</a>
                                                  </div> --}}
          </li>
        </ul>
      </div> <!-- collapse .// -->
      </nav>
      </div> <!-- widgets-wrap.// -->
      </div>
      </div> <!-- row.// -->
      </div> <!-- container.// -->
    </section> <!-- header-main .// -->
  </header> <!-- section-header.// -->
