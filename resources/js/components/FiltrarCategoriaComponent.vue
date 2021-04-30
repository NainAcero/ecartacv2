<template>
    <div>
        <!-- Modal Show producto By Id -->
        <div class="modal fade" id="productoShow"  tabindex="-1" role="dialog" aria-labelledby="productoShow" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" v-if="response.producto != null">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" v-if="response.producto != null">
                    <img v-if="response.producto.portada" class="card-img-top" :src="'../'+response.producto.portada" alt="Card image cap">
                    <img v-else class="card-img-top" :src="'../'+response.producto.tienda.portada" alt="Card image cap">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ response.producto.producto }}</h5>
                            <p class="card-text">{{ response.producto.ingredientes }}</p>
                            <span v-html="response.producto.contenido"></span>
                            <!-- <var class="price h5"></var>  -->
                            <p><h5 class="modal-title">S/ {{ response.producto.precio }}</h5></p>
                            <!-- <div class="mb-3">
                                <p class="text-warning mr-2" data-toggle="tooltip" title="" data-original-title="Oferta/Promoción"><i class="fas fa-tag"></i> En oferta</p>
                            </div> -->
                            <hr>
                            <h6 class="card-text text-primary text-center" > {{ response.producto.tienda.tienda }}</h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" @click="addProducto(response.producto)"> <i class="fas fa-cart-plus"></i></button>
                </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <span type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="28"><title>Close</title><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="38" d="M368 368L144 144M368 144L144 368"/></svg>
                    </span>
                </div>
                <div class="modal-body">
                  <h4 class="modal-title">{{ resttienda }}</h4>
                    <h5 class="text-center">Horarios de Atención</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr v-for="(horario, index) in horarios" :key="index">
                                    <td class="text-left bg-light text-dark" v-if="index == dia">{{ horario.day }}</td>
                                    <td class="text-left" v-if="index != dia">{{ horario.day }}</td>

                                    <td class="text-right bg-light text-dark" v-if="horario.estatus == 1 && index == dia">{{ horario.inicio }} - {{ horario.fin }}</td>
                                    <td class="text-right " v-if="horario.estatus == 1 && index != dia">{{ horario.inicio }} - {{ horario.fin }}</td>

                                    <td class="text-right bg-light text-dark" v-if="horario.estatus == 0 && index == dia">Cerrado</td>
                                    <td class="text-right" v-if="horario.estatus == 0 && index != dia">Cerrado</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div> -->
                </div>
            </div>
        </div>

        <div v-if="tab == 0">
            <div class="d-block w-100">
                  <div class="card-banner card-bodyv2 img-fluid d-flex restaurant-header"
                        :style="restimagen_pri">
                    <article class="restaurant-content container">
                         <div class="icontext mb-lg-3 align-items-end">
                             <div class="d-flex align-items-center flex-md-row flex-column">
                                 <div class="restaurant-img mb-3 mb-md-0 mr-md-4">
                                     <img :src="restportada" class="rounded-circle">
                                 </div>
                                 <div class="restaurant-info">
                                     <div class="d-flex mb-2 align-items-md-center">
                                       <h3 class="card-title mb-md-0 mr-md-3">{{ resttienda }} </h3>
                                      <button type="button" class="btn btn-sm px-3" data-toggle="modal" data-target="#exampleModalCenter">{{ estatus }}
                                      </button>
                                     </div>
                                        <p class="restaurant-description mb-3">{{ restdescripcion }}</p>
                                        <p class="restaurant-direccion"><i class="fa fa-map-marker-alt mr-2 mb-2"></i> {{ restdireccion }}</p>
                                        <p class="restaurant-direccion"><i class="fas fa-phone mr-2"></i><b>{{restcelular}}</b></p>
                                 </div>
                             </div>
                         </div>
                         <div class="restaurant-socials mb-lg-3">
                             <a :href="'https://wa.me/51'+ restcelular + '?text=Hola' + resttienda + '.. quisiera un pedido'" target=".../"
                                class="btn btn-lg btn-success ">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a :href="'tel:+51' + restcelular" class="btn btn-lg btn-info "><i class="fas fa-phone"></i></a>
                            <a v-if="restfacebook != null" :href="restfacebook" target="../" class="btn btn-lg btn-secondary" style="background-color: #0d3be0;"><i class="fab fa-facebook-f"></i></a>
                            <a v-if="restweb != null" :href="restweb" target="../" class="btn btn-lg btn-gray "> <i class="fa fa-globe"></i></a>
                        </div>
                    </article>
                  </div>
            </div>
        </div>

        <div class="container">
        <section class="section-content padding-y">
            <div class="" id="app">
                <div class="row" v-if="tab == 0">

                <div class="bottom-section-fixed">
                  <div class="container-btn">
                    <a href="javascript:void(0);" @click="changeTab()" class="btn-flotante" v-if="listwsp.length > 0">
                        <div class="col-md-5 col-3">
                        <span class="py-1 px-2 text-white rounded" style="background:#ff8c3b" >{{ listwsp.length }}</span>
                        </div>
                        <h5 class="p-2 m-0 col-md-6"> <i class="fas fa-shopping-basket"></i> Ver Canasta</h5>
                    </a>
                  </div>
                </div>

                <main class="col-md-12">
                    <header class="border-bottom mb-4 pb-3">
                        <div class="form-inline justify-content-between">
                            <select class="mr-2 form-control" v-model="categoriaid" @change="getCateProd()">
                                <option value="0">Ver toda la Cartas</option>
                                <option v-for="(categoria, index) in listCategoria" :value="categoria.id" :key="index">{{categoria.categoria}} </option>
                            </select>
                            <div class="input-group mt-md-0 mt-2">
                                <input type="text" v-model="textBusc" @change="getCatProdInput()" class="form-control" placeholder="Buscar Producto">
                                <div class="input-group-append">
                                <button class="btn btn-primary" @click="getBuscProd()" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                </div>
                            </div>

                        </div>
                    </header>
                    <template>
                    <template  v-if="ofertas.length > 0">
                        <div class="lista-categoria">
                            <header class="py-3">
                                <h3>
                                    <strong class="card-title mb-4">OFERTAS</strong>
                                </h3>
                            </header>
                            <div class="menu-holder mb-5 mt-3">
                            <div v-for="(item, index) in ofertas" :key="index" class="menu-post flex-column text-center">
                                <div class="menu-post-img overflow-hidden position-relative" style="height:194px">
                                <!-- <a :href="'../productos/'+ item.slug"> -->
                                <a href="javascript:void(0);" @click="getProductoById(item.slug)" class="d-block h-100">
                                    <img v-if="item.portada" class="w-100 h-100" :src="'../'+item.portada">
                                    <img v-else class="w-100 h-100" :src="'../' + restportada">
                                </a>
                                </div>
                                <div class="menu-info pt-4 pb-3 px-2 bg-white">
                                <h6 class="title mb-1">
                                    <!-- <a :href="'../productos/'+ item.slug" class="bg-white position-relative"> -->
                                    <a href="javascript:void(0);" @click="getProductoById(item.slug)" class="bg-white position-relative">
                                        {{item.producto}}
                                    </a>
                                </h6>
                                <small class="text-muted"><p>{{item.ingredientes}}</p></small>
                                <div class="menu-bottom d-flex justify-content-around mt-3 align-items-center">
                                    <span class="font-weight-bold">S/ {{item.precio}}</span>
                                    <div class="product-btn">
                                    <button class="btn btn-warning" @click="addProducto(item)"> <i class="fas fa-cart-plus"></i></button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </template>
                    <article v-for="(categoria, index) in categorias" v-if="categoria.productos.length > 0" class="mb-3">
                        <template >
                        <div class="card lista-categoria">
                            <input :id="'group-toggle-'+categoria.categoria.replace(/ /g,'')" type="checkbox" style="position: absolute; clip: rect(0, 0, 0, 0);" :checked="index === 0">
                            <header class="card-header border-3 position-relative">
                            <h4 class="mb-0">
                                <strong class="card-title mb-4">{{categoria.categoria}}</strong>
                            </h4>
                            <label :for="'group-toggle-'+categoria.categoria.replace(/ /g,'')" class="mb-0"></label>
                            <i class="fa fa-chevron-down"></i>
                            </header>
                            <div class="table-responsive contenido-categoria px-4">
                            <div class="table table-hover">
                                <div v-for="(item, index) in categoria.productos" :key="index" class="row align-items-center mt-3 flex-nowrap cat-prod">
                                    <div class="p-2">
                                        <!-- <a :href="'../productos/'+ item.slug"> -->
                                        <a href="javascript:void(0);" @click="getProductoById(item.slug)">
                                            <img v-if="item.portada" class="icon icon-md rounded-circle" :src="'../'+item.portada">
                                            <img v-else class="icon icon-md rounded-circle" :src="'../' + restportada">
                                        </a>
                                    </div>
                                    <div class="col-xl-11 p-2">
                                    <div class="d-flex align-items-md-center">
                                        <div class="product-info">
                                        <h6 class="title mb-1">
                                            <!-- <a :href="'../productos/'+ item.slug" class="bg-white position-relative" style="z-index:2">  -->
                                            <a href="javascript:void(0);" @click="getProductoById(item.slug)"
                                                class="bg-white position-relative" style="z-index:2">
                                                {{item.producto}}
                                            </a>
                                            <span v-if="item.oferta" class="text-warning mr-2" data-toggle="tooltip" title="Oferta/Promoción">
                                                <i class="fas fa-tag"></i>
                                            </span>
                                            <span class="menu-dots"></span>
                                            <span class="price bg-white pl-2">S/ {{item.precio}}</span>
                                        </h6>
                                        <small class="text-muted"><p>{{item.ingredientes}}</p></small>
                                        </div>
                                        <div class="product-btn ml-md-4">
                                        <button class="btn btn-warning" @click="addProducto(item)"> <i class="fas fa-cart-plus"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </template>

                    </article>

                    </template>
                    <!-- <template v-else>
                    </template> -->
                </main>
            </div>

            <div class="row" v-if="tab == 1">
                <!-- <div class="btn-flotante-ecart" v-if="listwsp.length > 0" style="width:100%">
                    <p class="text-center">Selecciona el tipo de delivery:</p>
                    <div class="container ">
                        <div class="row justify-content-md-center ">
                            <div class="col-md-3 col-6">
                                <div class="card">
                                    <a href="#" @click="showModal(5)" class="btn btn-primary">
                                        <i class="fab fa-whatsapp"></i> Restaurante</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="card">
                                    <a @click="showModal(1)" href="#" class="btn btn-primary"><i class="fas fa-motorcycle"></i> Galedi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <main class="col-md-12">
                    <div class="d-flex justify-content-between flex-column flex-md-row">
                        <button type="button" @click="changeTab()" class="btn btn-light mr-md-2 mb-2 mb-md-0"><i class="fa fa-arrow-circle-left"></i> Ir a la Carta</button>
                        <button v-if="listwsp.length > 0" type="button" @click="showModal()" class="btn btn-primary"><i class="fas fa-motorcycle"></i> Solicitar delivery</button>
                    </div>
                    <div class="mt-4" v-if="listwsp.length > 0">
                        <!-- <h4 class="py-4">Su Canasta</h4> -->
                        <div class="bg-white cart-wrapper">
                        <h4 class="pb-4"> <i class="fas fa-shopping-basket"></i> Canasta</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-muted cart-header">
                                    <tr class="text-uppercase">
                                        <th scope="col">Plato</th>
                                        <th scope="col" class="head-delete"></th>
                                        <th scope="col">Precio</th>
                                        <th scope="col" width="100" class="text-center">Cantidad</th>
                                        <th scope="col">Nota</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in carrito" v-if="item.xmaster == idrest">
                                            <td width="20">
                                                <a href="javascript:void(0);" @click="getProductoById(item.xslug)">
                                                <img v-if="item.portada" class="icon icon-md" :src="'../'+item.portada">
                                                <img v-else class="icon icon-md" :src="'../' + restportada">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" @click="getProductoById(item.xslug)" class="font-weight-bold text-dark" style="font-size:16px">{{item.xprod}}</a>
                                            </td>
                                            <td class="text-lefth">
                                                <var class="text-muted">S/ {{item.xprecio}}</var>
                                            </td>
                                            <td>
                                                <input type="number" v-model="item.xcantidad" @change="cantidadPedidos()" min="0" class="form-control text-center">
                                            </td>
                                            <td>
                                                <input type="text" v-model="item.descripcion" @change="cantidadPedidos()" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-outline-danger" @click="removeCart(index)"><i class="fa fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <p v-if="restdelivery !=''" class="icontext"><i class="icon text-success fa fa-truck"></i> {{restdelivery}}</p>
                                            </td>
                                            <td colspan="3">
                                                <div class="align-self-end ml-auto">
                                                    <!-- <a class="btn btn-success float-right"
                                                        :href="'https://wa.me/51'+ restcelular + '?text=Hola, deseo realizar este pedido. '+listwsp +'%0D%0A%0D%0A Gracias'"
                                                        target="../" >
                                                        Enviar mi Pedido
                                                        <i class="fab fa-whatsapp"></i>
                                                    </a>
                                                    <a @click="showModal()" class="mr-2 ml-2 btn btn-info float-right">
                                                        Delivery
                                                        <i class="fab fa-whatsapp"></i>
                                                    </a> -->
                                                    <!-- @click="enviarDelivery()" -->
                                                    <div v-if="is_modal_visible" id="modal" class="modal fade modal-delivery">
                                                            <div class="modal-dialog modal-dialog-centered delivery" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <span type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="28"><title>Close</title><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="38" d="M368 368L144 144M368 144L144 368"/></svg>
                                                                </span>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div v-if="modal_page === 3">
                                                                <h4 class="modal-title" id="exampleModalLongTitle">Resumen del pedido</h4>
                                                                    <div class="alert alert-success text-center" role="alert">
                                                                        <strong>Solo falta 1 click, </strong> tu solicitud nos llegará por whatsapp
                                                                    </div>
                                                                    <table class="table table-modal">
                                                                        <tbody>
                                                                            <tr v-for="(item, index) in carrito" v-if="item.xmaster == idrest">
                                                                                <td>{{item.xprod}}</td>
                                                                                <td class="text-right">
                                                                                    <input type="number" v-model="item.xcantidad" @change="cantidadPedidos()" class="form-control text-center" readonly="readonly" style="width: 80px;margin:0 auto">
                                                                                </td>
                                                                                <!-- <td>
                                                                                    <button class="btn btn-outline-danger btn-sm float-right" @click="removeCartModal(index)"><i class="fa fa-trash-alt"></i></button>
                                                                                </td> -->
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <template v-else-if="modal_page === 2">
                                                                <h4 class="modal-title" id="exampleModalLongTitle">Ingresa tus datos</h4><div>                                                  <div class="form-group">
                                                                    <label >Nombre</label>
                                                                    <input type="text" v-model="model.nombre" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label >Celular</label>
                                                                        <input type="tel" v-model="model.telefono" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label >Dirección</label>
                                                                        <input type="text" v-model="model.direccion" class="form-control">
                                                                    </div>
                                                                    </div>
                                                                </template>
                                                                <template v-else-if="modal_page === 1">
                                                                <h4 class="modal-title" id="exampleModalLongTitle">Seleccionar Delivery</h4>
                                                                <div class="options-wrapper">
                                                                    <!-- <div class="option">
                                                                        <input type="radio" name="delivery" id="deliv_res" v-model="selector" value="0">
                                                                        <div class="option-body">
                                                                            <div class="option-img">
                                                                            <i class="fab fa-whatsapp"></i>
                                                                            </div>
                                                                            <strong>Restaurante</strong>
                                                                            <label for="deliv_res"></label>
                                                                        </div>
                                                                    </div> -->

                                                                    <div class="option" v-for="(delivery, index) in deliveries" :key="index">
                                                                        <input type="radio" name="delivery[]" v-bind:id="delivery.id" v-model="selector" @click="changeP()" v-bind:value="delivery.id">
                                                                        <div class="option-body">
                                                                            <div class="option-img">
                                                                            <img class="icon icon-md" :src="'../' + delivery.logo" alt="Delivery" >
                                                                            </div>
                                                                            <strong>{{ delivery.nombres }}</strong>
                                                                            <label v-bind:for="delivery.id"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                </template>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div v-if="modal_page === 3" class="d-flex justify-content-between w-100">
                                                                    <button @click="regresarForm()" class="btn btn-light"><i class="fa fa-chevron-left mr-2"></i>Regresar</button>
                                                                    <button type="button" class="btn btn-primary" @click="confirmDelivery()">
                                                                        <span class="v-btn__content">
                                                                            <i class="fab fa-whatsapp mr-2"></i>Enviar pedido
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                                <div v-else-if="modal_page === 2" class="d-flex justify-content-between w-100">
                                                                <button @click="regresarForm()" class="btn btn-light"><i class="fa fa-chevron-left mr-2"></i>Regresar</button>
                                                                <div>
                                                                    <button type="button" class="btn btn-outline-dark cancel-btn" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-primary" @click="confirmDelivery()" :disabled="!(model.nombre && model.telefono && model.direccion)">
                                                                        <span class="v-btn__content">
                                                                            <i class="fab fa-whatsapp mr-2"></i>Enviar pedido
                                                                        </span>
                                                                    </button>

                                                                </div>
                                                                </div>
                                                                <div v-else-if="modal_page === 1">
                                                                    <button type="button" class="btn btn-outline-dark cancel-btn" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button"  class="btn btn-primary" :disabled="aux" @click="enviarDelivery()">Siguiente<i class="fa fa-arrow-right ml-2"></i></button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between flex-column flex-md-row">
                        <p class=" mr-md-2 mb-2 mb-md-0"></p>
                        <!-- <button type="button" @click="changeTab()" class="btn btn-light mr-md-2 mb-2 mb-md-0"><i class="fa fa-arrow-circle-left"></i> Ir a la Carta</button> -->
                        <button v-if="listwsp.length > 0" type="button" @click="showModal()" class="btn btn-primary"><i class="fas fa-motorcycle"></i> Solicitar delivery</button>
                    </div>
                    <div v-if="listwsp.length < 1" class="alert alert-warning text-center mt-4" role="alert">
                    Tus pedidos se visualizarán aquí. <p>Aún no cuentas con pedidos para este restaurante.</p>
                    <p v-if="restdelivery !=''" class="icontext" style="color: black;"><i class="icon text-success fa fa-truck"></i> {{restdelivery}}</p>
                    </div>
                </main>
                <br>
            </div>
            </div>
        </section>
        </div>
    </div>
</template>


<script>

    import toastr from 'toastr';
    export default {
        props : ['idrest','celular','portada','delivery', 'tienda', 'imagen_pri', 'portada', 'facebook', 'direccion', 'descripcion', 'web'],
        data(){
            return{
                restcelular:this.celular,
                restportada:this.portada,
                restdelivery:this.delivery,
                restdireccion : this.direccion,
                restweb : this.web,
                restdescripcion : this.descripcion,
                resttienda:this.tienda,
                restimagen_pri: "min-height:320px; background-image: url(../"+ this.imagen_pri +");",
                restportada: "../" + this.portada,
                restinfo: "https://wa.me/51"+ this.celular +"?text=Hola "+ this.tienda +" deseo más información...",
                restfacebook: this.facebook,

                listCategoria:[],
                categorias:[],
                categoriaid:'0',
                buscador:'',
                tab: 0,
                estatus: '',
                dia: 0,
                selector: 1,
                horarios: [],
                ofertas: [],
                deliveries: [],
                response: {},
                aux: true,

                carrito:[],
                newCat:null,
                pedidos:'',
                listwsp:[],
                textBusc: "",
                is_modal_visible: false,
                is_second_modal: false,
                modal_page: 1,
                total: 0.00,
                model: {
                    nombre: '',
                    telefono: '',
                    direccion: '',
                }
            }
        },
        created(){
            var urlcategprod = '../catemenu/'+this.idrest
            axios.get(urlcategprod).then(res=>{
                this.categorias = res.data.categprod;
                this.listCategoria = res.data.categprod;
            })
            this.get_horarios();
            this.get_productos_by_oferta();
            this.get_deliveries();
        },
        // computed:{
        //     buscarMenu: function () {
        //         return this.categorias.filter((item) => item.categoria.includes(this.buscador));
        //     }
        // },
        methods:{

            changeTab() {
                this.tab = !this.tab;
            },

            changeP() {
                this.aux = false;
            },

            get_deliveries(){
                axios.get('../get_deliveries?id='+this.idrest).then(res=>{
                    this.deliveries = res.data.deliveries;
                    // console.log(this.deliveries);
                })
            },

            getProductoById(id){
                axios.get('../get_producto_by_id?id='+id).then(res=>{
                    this.response = res.data;
                    this.$nextTick(() => {
                        $('#productoShow').modal('show');
                    });

                })
            },

            showModal(select) {
                 // this.selector = select;
                this.is_modal_visible = true;
                this.$nextTick(() => {
                    $('#modal').modal('show');
                });
                // console.log(this.selector);
            },
            get_productos_by_oferta() {
                axios.get('../get_productos_by_oferta?id='+this.idrest).then(res=>{
                    this.ofertas = res.data.productos;
                })
            },
            getCateProd(){
                // this.valuemultisel = {iglesia:'Buscar...', codigo:'', manual_online:''}
                axios.get('../getcategoria?category='+this.categoriaid+'&key='+this.idrest).then(res=>{
                    this.categorias = res.data.categoria;
                    // console.log(res);
                })
            },
            getBuscProd() {

                axios.get('../getbuscador?category='+this.categoriaid+'&buscar='+this.textBusc+'&key='+this.idrest).then(res=>{
                    this.categorias = res.data.categoria;
                })
            },
            getCatProdInput() {
                if(this.textBusc == ''){
                    this.getCateProd();
                }
            },
            get_horarios() {
                this.horarios = [];
                axios.get('../get_horarios?tienda_id='+this.idrest).then(res=>{
                    this.dia = res.data.dia;
                    this.estatus = res.data.estatus;
                    this.horarios = res.data.horarios;
                })

            },
            enviarDelivery() {
                if(this.modal_page === 2){
                    if(this.model.nombre.trim() == "" || this.model.nombre == null) {
                        toastr.warning("Ingrese su nombre...");
                        return;
                    }
                    if(this.model.telefono.trim() == "" || this.model.telefono == null) {
                        toastr.warning("Ingrese su telefono...");
                        return;
                    }
                    if(this.model.direccion.trim() == "" || this.model.direccion == null) {
                        toastr.warning("Ingrese su dirección...");
                        return;
                    }
                }
                // this.calcularTotal()
                this.modal_page += 1;
            },
            confirmDelivery() {
                // var aux = 0
                // this.carrito.forEach(element => {
                //     if(element.xprecioNew == null){
                //         toastr.error("Ingrese precios: " + element.xprod)
                //         aux = 1
                //         return
                //     }
                // })
                // if(aux) return
                // Enviar Base de datos
                axios.post('/pedido', {
                    nombre: this.model.nombre,
                    telefono: this.model.telefono,
                    direccion: this.model.direccion,
                    tienda_id: this.idrest,
                    productos: this.carrito,
                    estado: Number(this.selector)
                }).then(res=>{
                    if(res.status == 201) {
                        toastr.success("Pedido Enviado con éxito")
                        this.carrito = []
                        this.saveCarts();
                        if(Number(this.selector) > 0){
                            window.open('https://wa.me/51'+res.data.delivery.celular+'?text=Hola, deseo realizar este pedido. %0D%0A%0D%0A *'+this.tienda+'* %0D%0A'+ this.listwsp +'%0D%0A'+ this.model.nombre +', Dir: '+ this.model.direccion+', Cel: '+ this.model.telefono+'%0D%0A%0D%0A Gracias', '_blank');
                        }else{
                            window.open('https://wa.me/51'+ this.restcelular + '?text=Hola, deseo realizar este pedido. '+ this.listwsp +'%0D%0A%0D%0A'+ this.model.nombre +', Dir: '+ this.model.direccion+', Cel: '+ this.model.telefono+'%0D%0A%0D%0A Gracias', '_blank');
                        }
                    }else{
                        toastr.error("Ocurrio un error!..")
                    }
                })
                this.is_modal_visible = false;
                $('#modal').modal('hide');
            },
            calcularTotal() {
                this.total = 0.00
                this.carrito.forEach(element => {
                    if(element.xprecioNew != null){
                        this.total += parseFloat(element.xprecioNew) * parseInt(element.xcantidad)
                    }
                })
            },
            regresarForm() {
                this.modal_page -= 1;
            },
            // persist() {
            //     localStorage.name = this.name;
            //     localStorage.age = this.age;
            //     console.log('imaginen que estoy haciendo más cosas...');
            // }
            addProducto(val) {
                var check = false;
                // ensure they actually typed something
                // if(!this.newCat) return;
                this.pedidos = {
                    'xmaster':this.idrest,
                    'xid':val.id,
                    'xprod':val.producto,
                    'xprecio':val.precio,
                    'xportada':val.portada,
                    'xslug':val.slug,
                    'xcantidad': 1

                }

                for (var i = 0; i < this.carrito.length; i++) {
                    if(this.carrito[i].xid == this.pedidos.xid) {
                        this.carrito[i].xcantidad += 1;
                        check = true;
                    }
                }

                this.newCat = '';
                if(!check) {
                    this.carrito.push(this.pedidos);
                    toastr.success('Se agregó a la lista');
                    this.saveCarts();
                }else {
                    this.cantidadPedidos();
                }

            },
            removeCart(x) {
                this.carrito.splice(x,1);
                this.saveCarts();
            },
            removeCartModal(x) {
                this.carrito.splice(x,1);
                if(this.carrito.length <= 0) {
                    this.is_modal_visible = false;
                    $('#modal').modal('hide');
                }
                this.saveCarts();
            },
            saveCarts() {
                let parsed = JSON.stringify(this.carrito);
                localStorage.setItem('carrito', parsed);
            },
            cantidadPedidos(){
                this.listwsp = []
                this.carrito.forEach(val => {
                    if (val.xmaster == this.idrest) {
                        if(val.descripcion != null) {

                            this.listwsp.push('%0D%0A • '+val.xprod+' | _Cant_='+val.xcantidad+' | _Nota_='+val.descripcion
                            + ' | ')
                        }else {
                            this.listwsp.push('%0D%0A • '+val.xprod+' | _Cant_='+val.xcantidad+ ' | ')
                        }
                    }
                });
                this.saveCarts();
                // this.calcularTotal();
            }

        },
        mounted() {
            // console.log('Component mounted.')
            // if (localStorage.name) {
            //     this.name = localStorage.name;
            // }
            // if (localStorage.age) {
            //   this.age = localStorage.age;
            // }

            if(localStorage.getItem('carrito')) {
                try {
                    this.carrito = JSON.parse(localStorage.getItem('carrito'));
                } catch(e) {
                    localStorage.removeItem('carrito');
                }
            }
        },
        watch: {
            name(newName) {
            localStorage.name = newName;
            },
            carrito(){
                this.cantidadPedidos();
            }
        }
    }
</script>


<style scoped>
  .product-btn {
    display: flex;
  }
  .product-info {
    flex-grow: 1;
  }
  .menu-dots {
    position: absolute;
    top: 14px;
    left: 80px;
    right: 0;
    margin: 0;
    border: 0;
    height: 5px;
    display: block;
    background: radial-gradient(#d5d5d5 40%,transparent 10%);
    background-position: 0 0;
    background-size: 4px 4px;
    background-repeat: repeat-x;
  }
  .menu-post-img::before {
    content: "";
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    height: 5px;
    z-index: 2;
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAFCAYAAABxeg0vAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAGZJREFUeNpi/P//PwMy+PvnFw+QWgjET4G4gpmF7RuKApAGGP7z+6cSEF8C4v9QfAeIbZHVICt2BOLXSIph+C8Q9wMxF0gdI4gAOiMLaNkEIGZlwA1uA3ESI1DnUiAjioE48A8gwABE92fYusK+KwAAAABJRU5ErkJggg==) left bottom repeat-x;
  }
  .menu-info {
    border: 1px solid #ededed;
    border-top: none;
  }
  .price {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
  }
  .table-hover tbody tr:hover .product-info a,
  .table-hover tbody tr:hover .product-info .price {
    background: #ececec !important;
  }
  .table td, .table th {
    vertical-align: middle;
    border-top: 0;
  }
  .table.table-modal td {
    border-bottom: 1px solid #dee2e6;
  }
  .title {
    text-transform: uppercase;
    line-height: 1.45;
    font-size: 16px;
  }
  .icon-md {
    width: 80px;
    height: 80px;
    line-height: 80px;
  }
  .lista-categoria > input:checked ~ .contenido-categoria {
    max-height: 9999px;
  }
  .contenido-categoria {
    overflow: hidden;
    max-height: 0;
  }
  .lista-categoria label {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    cursor: pointer;
  }
  .card-header {
    border: 3px solid #2c2c2c;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 16px;
    padding: 15px;
  }

  .cart-header {
    font-size: 13px;
  }
  .table thead th {
    border-bottom: 1px solid #dee2e6;
  }
  .cart-wrapper {
    border-radius: 8px;
    padding: 25px 30px;
  }
  .modal-content {
    border-radius: 12px;
  }
  .modal-content label{
    font-size: 13px;
    font-weight: 600;
    margin-bottom: .4rem;
  }
  .modal-title {
    margin-bottom: 1.6rem;
  }
  .modal-header {
    border-bottom: 0;
    padding: .8rem;
    justify-content: flex-end;
  }
  .modal-footer {
    border-top: 0;
    padding: 1.7rem 1.8rem 2rem;
  }
  .modal-footer .btn {
    padding: 8px 14px;
    border-radius: 20px;
    font-size: 14px;
  }
  .modal-body {
    padding: 0 1.85rem 1rem ;
  }
  .form-control {
    border-radius: 20px;
    height: unset;
    padding: 0.65rem;
  }
  .close-btn {
    border: 0;
    color: #7d7d7c;
    background: 0;
  }
  .btn i {
    color: inherit !important;
  }
  .options-wrapper {
    display: flex;
    gap: 15px;
    padding: 15px 0;
    justify-content: center;
  }
  .option-body {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 30px 45px 45px;
    border: 1px solid #dfdee3;
    border-radius: 8px;
    position: relative;
    text-align: center;
    min-width: 180px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  }
  .option-body:hover {
    background: #fff4ec;
    border-color: #ff6a00;
  }
  .option-body::before {
    content: '';
    position: absolute;
    top: 10px;
    right: 10px;
    border: 3px solid #dfdee3;
    border-radius: 50%;
    padding: 5%;
  }
  .option-body label {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    cursor: pointer;
    margin-bottom: 0;
  }
  .option input {
    display: none;
  }
  .option input:checked ~ .option-body {
    border-color: #ff6a00;
    background: #F8F8FF;
  }
  .option input:checked ~ .option-body::before {
    content: '\f00c';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    color: #ff6a00;
    padding: .7% 2.2%;
    border-color: #ff6a00;
    font-size: 13px;
  }
  .option input:checked ~ .option-body .option-img{
    color: #ff6a00;
  }
  .option-img {
    font-size: 55px;
    color: #B7B8BD;
  }

  .input-group-prepend .btn, .input-group-append .btn {
    border-radius: 20px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }

  .menu-holder {
    display: flex;
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
    gap: 30px;
  }

  .menu-post {
    flex: 0 0 260px;
  }

  .bottom-section-fixed {
    position: fixed;
    width: 100%;
    bottom: 0;
    left: 0;
    z-index: 10;
  }

  .container-btn {
        width: 100%;
    padding: 9px;
    margin-right: auto;
    margin-left: auto;
  }


@media (min-width: 960px){

  .container-btn {
      max-width: 900px;
  }

}

  @media (min-width: 1264px){

    .container-btn {
        max-width: 1185px;
    }

  }

  @media (min-width: 768px){
      .form-inline .input-group {
        width: 30%;
      }

      .table .product-btn span {
        display: none;
      }

      .cat-prod .title {
        position: relative;
      }
  }
  @media (min-width: 576px){
    .modal-dialog.delivery {
        max-width: unset;
        min-width: 450px;
            display: inline-flex;
    text-align: left;
    }
  }

  @media (max-width: 768px) {
    .cart-wrapper > .table-responsive >.table >tbody> tr>td:first-child {
      display: none;
    }

    .cart-wrapper {
      padding: 25px 10px;
    }

    .card-header h4 {
      font-size: 20px;
    }

    .cat-prod {
      position: relative;
      align-items: center;
      margin-bottom: 25px;
    }

    /* .cat-prod > div:last-child {
      position: unset;
    } */
    .cat-prod > div>div {
      flex-direction: column;
    }

    .menu-dots {
      position: static;
    }

    .price {
    top: unset;
    right: unset;
    bottom: 13px;
    left: 0;
    font-size: 20px;
    }

    .product-info small p {
      margin-bottom: 1rem;
    }

    .product-btn {
      justify-content: flex-end;
    }

    /* .product-btn button {
      width: 100%;
    } */

    .head-delete {
      display: none;
    }

    .options-wrapper {
      flex-direction: column;
    }

    .option-body {
      padding: 19px 50px 19px;
    }

    .cancel-btn {
      display: none;
    }
  }

  .restaurant-header {
    min-height: 250px;
  }

  .restaurant-header::before {
      content: "";
      background: rgba(0, 0, 0, 0.6);
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
  }

  .restaurant-content {
      display: flex;
      justify-content: space-between;
      color: #fff;
      z-index: 3;
  }

  .restaurant-content::after {
      content: none;
  }

  .restaurant-content .restaurant-img {
      flex: 0 0 190px;
      height: 180px;
      background: white;
      border: 4px solid #ff6a00;
      border-radius: 50%;
      overflow: hidden;
  }

  .restaurant-content .restaurant-img img {
      width: 100%;
      height: 100%;
  }

  .restaurant-content .restaurant-socials {
      display: flex;
      align-items: flex-end;
      gap: 10px;
  }
  .restaurant-content .restaurant-socials a {
      border-radius: 24px;
  }

  .restaurant-info .btn {
      background-color: #91b622;
      border-color: #91b622;
      color: #fff;
  }

  @media (max-width: 768px) {
      .restaurant-content .restaurant-img {
          flex: 0 0 150px;
          height: 140px;
          display: none;
      }

      .restaurant-info > div {
          flex-direction: column-reverse;
          gap: 15px;
      }
      .restaurant-info > div > h3 {
          font-size: 24px;
      }
      .restaurant-info > div > .btn {
          width: 35%;
      }

      .restaurant-description,
      .restaurant-direccion {
          font-size: 14px;
      }

      .restaurant-content .restaurant-socials {
          justify-content: flex-start;
      }
  }

  @media (max-width: 992px) {
    .restaurant-content {
        justify-content: space-around;
        flex-direction: column;
    }

    .restaurant-content .restaurant-socials {
        justify-content: center;
    }
}

.modal-delivery {
  text-align: center;
}
</style>
