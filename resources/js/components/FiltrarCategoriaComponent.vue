<template>
    <div>
        <div class="row" v-if="tab == 0">

            <a href="#" @click="changeTab()" class="btn-flotante" v-if="listwsp.length > 0" style="width:85%">
                <p class="d-inline p-2 bg-dark text-white" >{{ listwsp.length }}</p>
                <h4 class="d-inline p-2">Ver Canasta</h4>
            </a>

            <main class="col-md-12">
                <header class="border-bottom mb-4 pb-3">
                    <div class="form-inline">
                        <select class="mr-2 form-control" v-model="categoriaid" @change="getCateProd()">
                            <option value="0">Ver toda la Carta</option>
                            <option v-for="(categoria, index) in listCategoria" :value="categoria.id">{{categoria.categoria}} </option>
                        </select>
                        <div class="input-group">
                            <input type="text" v-model="textBusc" @change="getCatProdInput()" class="form-control" placeholder="Buscar Producto">
                            <div class="input-group-append">
                              <button class="btn btn-primary" @click="getBuscProd()" type="submit">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                        </div>

                    </div>
                </header>

                <article v-for="(categoria, index) in categorias" class="card" v-if="categoria.productos.length > 0">
                    <header class="card-header text-center">
                        <h3>
                            <strong class="card-title mb-4">{{categoria.categoria.replace(/\b\w/g, l => l.toUpperCase())}}</strong>
                        </h3>
                    </header>
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        <tr v-for="(item, index) in categoria.productos">
                            <td width="20">
                                <a :href="'../productos/'+ item.slug">
                                   <img class="icon icon-md rounded-circle" :src="'../img/elpadrino-logo.png'">
                                </a>
                            </td>
                            <td>
                                <h6 class="title mb-0"><a :href="'../productos/'+ item.slug"> {{item.producto}}  </a>  <span v-if="item.oferta" class="text-warning mr-2" data-toggle="tooltip" title="Oferta/Promoción"><i class="fas fa-tag"></i></span></h6>
                                <small class="text-muted"><p>{{item.ingredientes}}</p></small>

                                <button class="btn btn-warning btn-sm float-right" @click="addProducto(item)"> <i class="fas fa-plus"></i></button>

                                <var class="price text-muted float-right  mr-2">S/ {{item.precio}}</var>
                            </td>
                        </tr>
                        </tbody></table>
                    </div>
                </article>
                <br>
            </main>
        </div>

        <div class="row" v-if="tab == 1">
            <div class="btn-flotante-ecart" v-if="listwsp.length > 0" style="width:100%">
                <p class="text-center">Selecciona el tipo de servicio:</p>
                <div class="container ">
                    <div class="row justify-content-md-center ">
                        <div class="col-md-3 col-6">
                            <div class="card">
                                <a :href="'https://wa.me/51'+ restcelular + '?text=Hola, deseo realizar este pedido. '+listwsp +'%0D%0A%0D%0A Gracias'" class="btn btn-primary">
                                    <i class="fab fa-whatsapp"></i> En sitio</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card">
                                <a @click="showModal()" href="#" class="btn btn-primary"><i class="fas fa-motorcycle"></i> Domicilio</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <main class="col-md-12">
                <button type="button" @click="changeTab()" class="btn btn-light">Volver al menú</button>
                <div class="card" v-if="listwsp.length > 0">
                    <h5 class="card-header">Su Canasta</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col"></th>
                                    <th scope="col">Lista de Pedidos</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col" width="100" class="text-center">Cantidad</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in carrito" v-if="item.xmaster == idrest">
                                        <td width="20">
                                            <a :href="'../productos/'+ item.slug">
                                            <img class="icon icon-md rounded-circle" :src="'../img/elpadrino-logo.png'">
                                            </a>
                                        </td>
                                        <td>
                                            <a :href="'../productos/'+ item.xslug" class="title text-dark">{{item.xprod}}</a>
                                        </td>
                                        <td class="text-lefth">
                                            <var class="text-muted">{{item.xprecio}}</var>
                                        </td>
                                        <td>
                                            <input type="number" v-model="item.xcantidad" @change="cantidadPedidos()" min="0" class="form-control">
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-danger btn-sm float-right" @click="removeCart(index)"><i class="fa fa-trash-alt"></i></button>
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
                                                <div v-if="is_modal_visible" id="modal" class="modal fade">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header" v-if="is_second_modal">
                                                            <button @click="regresarForm()" class="btn btn-light">Regresar</button>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-header" v-else>
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Sus datos</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div v-if="is_second_modal">
                                                                <div class="alert alert-success text-center" role="alert">
                                                                    <b>Solo falta 1 click, </b> tu solicitud nos llegará por whatsapp
                                                                </div>
                                                                <p class="font-weight-bold mb-3">
                                                                    Resumen del pedido
                                                                </p>
                                                                <table class="table table-hover">
                                                                    <tbody>
                                                                        <tr v-for="(item, index) in carrito">
                                                                            <td>{{item.xprod}}</td>
                                                                            <td class="text-right">
                                                                                <input type="number" v-model="item.xcantidad" @change="cantidadPedidos()" class="form-control" style="width: 120px;">
                                                                            </td>
                                                                            <td>
                                                                                <button class="btn btn-outline-danger btn-sm float-right" @click="removeCart(index)"><i class="fa fa-trash-alt"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div v-else>                                                  <div class="form-group">
                                                                <label >Su nombre</label>
                                                                    <input type="text" v-model="model.nombre" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label >Teléfono</label>
                                                                    <input type="text" v-model="model.telefono" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label >Dirección</label>
                                                                    <input type="text" v-model="model.direccion" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div v-if="is_second_modal">
                                                                <button type="button" class="btn btn-primary btn-block" @click="confirmDelivery()">
                                                                    <span class="v-btn__content">
                                                                        <i class="fab fa-whatsapp"></i>
                                                                        Click aquí para enviar tu pedido
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div v-else>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" @click="enviarDelivery()">Validar</button>
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
                <div v-if="listwsp.length < 1" class="alert alert-warning text-center" role="alert">
                Tus pedidos se visualizarán aquí. <p>Aún no cuentas con pedidos para este Restaurante.</p>
                <p v-if="restdelivery !=''" class="icontext" style="color: black;"><i class="icon text-success fa fa-truck"></i> {{restdelivery}}</p>
                </div>
            </main>
            <br>
        </div>
    </div>
</template>


<script>

    import toastr from 'toastr';
    export default {
        props : ['idrest','celular','portada','delivery'],
        data(){
            return{
                restcelular:this.celular,
                restportada:this.portada,
                restdelivery:this.delivery,
                listCategoria:[],
                categorias:[],
                categoriaid:'0',
                buscador:'',
                tab: 0,

                carrito:[],
                newCat:null,
                pedidos:'',
                listwsp:[],
                textBusc: "",
                is_modal_visible: false,
                is_second_modal: false,
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

            showModal() {
                this.is_modal_visible = true;
                this.$nextTick(() => {
                    $('#modal').modal('show');
                });
            },
            getCateProd(){
                // this.valuemultisel = {iglesia:'Buscar...', codigo:'', manual_online:''}
                axios.get('../getcategoria?category='+this.categoriaid+'&key='+this.idrest).then(res=>{
                    this.categorias = res.data.categoria;
                    console.log(res);
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
            enviarDelivery() {
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

                // this.calcularTotal()
                this.is_second_modal = true;
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
                    productos: this.carrito
                }).then(res=>{
                    if(res.status == 201) {
                        toastr.success("Pedido Enviado con éxito")
                        this.carrito = []
                        this.saveCarts();
                        window.location.replace('https://wa.me/51'+ this.restcelular + '?text=Hola, deseo realizar este pedido. '+ this.listwsp +'%0D%0A%0D%0A Gracias');

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
                this.is_second_modal = false;
            },
            // persist() {
            //     localStorage.name = this.name;
            //     localStorage.age = this.age;
            //     console.log('imaginen que estoy haciendo más cosas...');
            // }
            addProducto(val) {
                // ensure they actually typed something
                // if(!this.newCat) return;
                this.pedidos = {
                    'xmaster':this.idrest,
                    'xid':val.id,
                    'xprod':val.producto,
                    'xprecio':val.precio,
                    'xportada':val.portada,
                    'xslug':val.slug,
                    'xcantidad':'1'

                }
                this.carrito.push(this.pedidos);
                this.newCat = '';
                this.saveCarts();
                toastr.success('Se agregó a la lista');
            },
            removeCart(x) {
                this.carrito.splice(x,1);
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
                        this.listwsp.push('%0D%0A • *'+val.xprod+'* | _Cant_=*'+val.xcantidad+'*')
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
