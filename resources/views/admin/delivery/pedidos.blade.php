@extends('layouts.init')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}} ">Home</a></li>
                <li class="breadcrumb-item active">form</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')

<section class="content">
    <div id="app"></div>
    <audio class="my_audio" preload="none">
        <source src="{{ asset('audio/notification.mp3') }}" type="audio/mpeg">
    </audio>

    <!-- Modal Restaurante-->
    <div class="modal fade" id="restauranteModal" tabindex="-1" role="dialog" aria-labelledby="restauranteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="name"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <img class="card-img-top" src="https://media-cdn.tripadvisor.com/media/photo-s/0e/6f/79/7a/frontis-del-restaurante.jpg" alt="Card image cap">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-text" id="nombre"></h6>
                        <h6 class="card-text" id="direccion"></h6>
                        <h6 class="card-text" id="telefono"></h6>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal Pedidos-->
    <div class="modal fade bd-example-modal-lg" id="pedidosModal" tabindex="-1" role="dialog" aria-labelledby="pedidosModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="pedidosModalLabel">Productos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead class="text-muted">
                                    <tr class="small text-uppercase">
                                        <th scope="col"></th>
                                        <th scope="col">Lista de Pedidos</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th></th>
                                    </tr>
                                    <tbody id="productos">

                                    </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pedidos</h3>
                <div class="card-tools">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="pedidos">

                    </tbody>
                  </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
        <!-- /.row -->
</section>

@endsection

@section('scripts')

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>

    $(".my_audio").trigger('load');
    $pedido = $('#pedidos');

    var pedidos = [];
    var ads = null;

    $(function () {
        const url = `/get_pedidos`;
        $.getJSON(url, onPedidosLoaded);
    });

    function onPedidosLoaded(data) {
        pedidos = data.pedidos;
        cargarPedidos();
    }

    function cargarPedidos() {
        let htmlOptions = '';

        pedidos.forEach(pedido => {
            htmlOptions += `<tr>`;
            htmlOptions += `<td>${pedido.nombre}</td>`;
            htmlOptions += `<td>${pedido.telefono}</td>`;
            htmlOptions += `<td>${pedido.direccion}</td>`;
            htmlOptions += `<td>
                <button class="btn btn-dark btn-sm text-white" onclick="showRestaurante(${pedido.tienda_id})" data-toggle="modal" data-target="#restauranteModal"><i class="fas fa-store-alt"></i></button>
                <button class="btn btn-success btn-sm text-white" onclick="shoProductos(${pedido.id})" data-toggle="modal" data-target="#pedidosModal"><i class="fas fa-shopping-cart"></i></button>
                <button class="btn btn-info btn-sm text-white" onclick="showPedido(${pedido.id})"><i class="far fa-check-circle"></i></button>
            </td>`;
            htmlOptions += `</tr>`;
        });

        $pedido.html(htmlOptions);
    }

    function play_audio(task) {
        if(task == 'play'){
            $(".my_audio").trigger('play');
        }
        if(task == 'stop'){
            $(".my_audio").trigger('pause');
            $(".my_audio").prop("currentTime",0);
        }
    }

    function showPedido(id) {
        pedidos = pedidos.filter(pedido => pedido.id != id);
        cargarPedidos();
        const url = `/enviar_delivery?id=${id}`;
        $.getJSON(url, onPedidoLoaded);

        toastr.success("Pedido Recibido", "info");
    }

    function onPedidoLoaded(data) {
        console.log(data);
    }

    function showRestaurante(id) {
        const url = `/get_restaurante?id=${id}`;
        $.getJSON(url, onRestauranteLoaded);
    }

    function shoProductos(id) {
        const url = `/get_productos?id=${id}`;
        $.getJSON(url, onProductosLoaded);
    }

    function onProductosLoaded(data) {
        $productos = $('#productos');
        let htmlOptions = '';

        data.productos.forEach(producto => {
            console.log(producto);
            htmlOptions += `<tr>`;
            htmlOptions += `<td><img class="icon icon-md rounded-circle" width="60" src="https://www.eltiempo.com/files/article_content/uploads/2020/08/03/5f2890b4d9ef7.png"></td>`;
            htmlOptions += `<td>${producto.producto}</td>`;
            htmlOptions += `<td>${producto.precio}</td>`;
            htmlOptions += `<td>${producto.cantidad}</td>`;
            htmlOptions += `</tr>`;
        });

        $productos.html(htmlOptions);
    }

    function onRestauranteLoaded(data) {
        $('#name').text(data.restaurante.tienda);
        $('#nombre').html(`<b>Restaurante: </b> ${data.restaurante.tienda}`);
        $('#direccion').html(`<b>Dirección: </b> ${data.restaurante.direccion}`);
        $('#telefono').html(`<b>Celular: </b> ${data.restaurante.celular}`);
    }

    Pusher.logToConsole = true;
    var pusher = new Pusher('09ea9df0e41a846292ef', {
        cluster: 'us2',
        forceTLS: true
    });
    var channel = pusher.subscribe('chat-channel');

    channel.bind('chat-event', function(data) {
        pedidos.unshift(data.pedido);
        cargarPedidos();
        setTimeout(function(){ play_audio("play"); }, 500);
    });
</script>

@endsection
