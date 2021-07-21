<header class="section-header">
    <section class="header-main border-bottom">
      <div class="nav-container">
        <div class="row align-items-center">
          <div class="col-lg-8 col-md-8 col-6">
            <a href="{{url('/')}}" class="brand-wrap">
              <img class="logo" src="{{asset('img/logo5.png')}}">
            </a> <!-- brand-wrap.// -->
          </div>
          {{-- <div class="col-lg-5 col-md-6 px-lg-4 order-md-0 order-3 px-0">
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
            </form> 
          </div> --}}
          <div class="col-lg-4 col-md-3 col-6">
            <div class="widgets-wrap float-md-right">

          <nav class="navbar navbar-main navbar-expand-lg p-0 justify-content-end">
            

            <div class="d-flex align-items-center" id="main_nav">
              <ul class="navbar-nav">
                
                <li class="nav-item mr-4">
                  <a class="nav-link navlink-icon" href="{{url('/')}}"><svg xmlns="http://www.w3.org/2000/svg"
                      width="18" viewBox="0 0 512 512">
                      <title>Restaurantes</title>
                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
                        d="M448 448V240M64 240v208M382.47 48H129.53c-21.79 0-41.47 12-49.93 30.46L36.3 173c-14.58 31.81 9.63 67.85 47.19 69h2c31.4 0 56.85-25.18 56.85-52.23 0 27 25.46 52.23 56.86 52.23s56.8-23.38 56.8-52.23c0 27 25.45 52.23 56.85 52.23s56.86-23.38 56.86-52.23c0 28.85 25.45 52.23 56.85 52.23h1.95c37.56-1.17 61.77-37.21 47.19-69l-43.3-94.54C423.94 60 404.26 48 382.47 48zM32 464h448M136 288h80a24 24 0 0124 24v88h0-128 0v-88a24 24 0 0124-24zM288 464V312a24 24 0 0124-24h64a24 24 0 0124 24v152" />
                    </svg><span class="d-lg-block d-none">Restaurantes</span></a>
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
