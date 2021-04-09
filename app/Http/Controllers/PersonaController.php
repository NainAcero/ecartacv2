<?php

namespace App\Http\Controllers;

use App\Galeria;
use App\Imagengaleri;
use App\Persona;
use App\Tienda;
use App\Tipo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('persona.tienda')->get();
        return view('admin.mantenimiento.personas.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tiendas = Tienda::where('estado', 1)->get();
        $tipos = Tipo::get();
        $roles = Role::get();
        return view('admin.mantenimiento.personas.crear', compact('roles','tipos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'tienda' => 'required|string|unique:tiendas',
            'nombres' => 'required|string|max:191',
            'apellidos' => 'required|string|max:191',
            'username' => 'required|string|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'celular' => 'required|numeric',
            'celulart' => 'required|numeric'
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request['nombres'].' '.$request['apellidos'],
                'username' => $request['username'],
                // 'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);
            $user->syncRoles($request->get('roles'));

            // $idpersona = '';
            // if ($request->persona_id == null) {
                //persona
            $persona = new Persona();
            $persona->user_id = $user->id;
            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->dni = $request->dni;
            $persona->celular = $request->celular;
            $persona->tipo = $request->tipo;
            $persona->ciudad = $request->ciudad;
            $persona->estado = 1;
            $persona->save();

            //     $idpersona = $persona->id;
            // }else{
            //     $idpersona = $request->persona_id;
            // }
            //tienda
            $tienda = new Tienda();
            $tienda->persona_id = $persona->id;
            $tienda->codigoqr = time();
            $tienda->tienda = Str::title($request->tienda);
            $tienda->slug = Str::slug($request->tienda, '-');
            $tienda->direccion = $request->direccion;
            $tienda->celular = $request->celulart;
            $tienda->facebook = $request->facebook;
            // $tienda->instagram = $request->instagram;
            $tienda->web = $request->web;
            $tienda->mapa = $request->mapa;
            $tienda->estado = $request->estado;
            $tienda->tipo_id = $request->tipo_id;
            $tienda->descripcion = $request->descripcion;
            $tienda->verificado = $request->verificado;
            // $tienda->portada = $imagen;
            $tienda->save();

            if ($request->file('portada')) {
                $portada = 'tienda/'.time().'-'.$tienda->slug.".jpg";
                $img = \Image::make($request->portada)->resize(null, 700, function ($constraint) {
                                        $constraint->aspectRatio();
                                    })->save($portada);
                // $img->resize(900, 700);
                $tienda->portada = $portada;
                $tienda->save();
            }
            //Registrar galeria de imagenes
            $imagal = new Imagengaleri();
            $imagal->tp_id = $tienda->id;
            $imagal->tipo = 'T';
            if ($request->hasFile('gal1')) {
                $name1 = 'galeriaimage/'.time().'-1'.$tienda->slug.".jpg";
                $img = \Image::make($request->gal1)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                $imagal->imagen_pri = $name1;
            }if($request->gal1_url){
                $request->gal1_url = str_replace(".webp", ".jpg", $request->gal1_url);
                $name1 = 'galeriaimage/'.time().'-1'.$tienda->slug.".jpg";
                $img = \Image::make($request->gal1_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                $imagal->imagen_pri = $name1;
            }

            // if ($request->hasFile('gal2')) {
            //     $name2 = 'galeriaimage/'.time().'-2'.$tienda->slug.".jpg";
            //     $img = \Image::make($request->gal2)->resize(null, 450, function ($constraint) {
            //                                 $constraint->aspectRatio();
            //                             })->save($name2);
            //     $imagal->imagen_seg = $name2;
            // }if($request->gal2_url){
            //     $request->gal2_url = str_replace(".webp", ".jpg", $request->gal2_url);
            //     $name2 = 'galeriaimage/'.time().'-2'.$tienda->slug.".jpg";
            //     $img = \Image::make($request->gal2_url)->resize(null, 450, function ($constraint) {
            //                                 $constraint->aspectRatio();
            //                             })->save($name2);
            //     $imagal->imagen_seg = $name2;
            // }

            // if ($request->hasFile('gal3')) {
            //     $name3 = 'galeriaimage/'.time().'-3'.$tienda->slug.".jpg";
            //     $img = \Image::make($request->gal3)->resize(null, 450, function ($constraint) {
            //                                 $constraint->aspectRatio();
            //                             })->save($name3);
            //     $imagal->imagen_ter = $name3;
            // }if($request->gal3_url){
            //     $request->gal3_url = str_replace(".webp", ".jpg", $request->gal3_url);
            //     $name3 = 'galeriaimage/'.time().'-3'.$tienda->slug.".jpg";
            //     $img = \Image::make($request->gal3_url)->resize(null, 450, function ($constraint) {
            //                                 $constraint->aspectRatio();
            //                             })->save($name3);
            //     $imagal->imagen_ter = $name3;
            // }
            $imagal->estado = 1;
            $imagal->save();
    
            DB::commit();
            return redirect()->route('personal.index')
                ->with('info', 'El registro se guardo con éxito');           

        } catch (Exception $e) {
            DB::rollback();
            throw $e;

            return redirect()->route('personal.index')
                ->with('info', 'No se pudo hacer la operación.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)
        ->with('persona.tienda')
        ->first();
        $userRole = $user->roles->all();
        $tipos = Tipo::get();
        $roles = Role::get();
        $galeriimagen = Imagengaleri::where('tp_id', $user->persona->tienda->id)->where('tipo','T')->first();
        return view('admin.mantenimiento.personas.editar', compact('user','tipos','roles','userRole','galeriimagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tienda' => 'required|string|max:191',
            'nombres' => 'required|string|max:191',
            'apellidos' => 'required|string|max:191',
            'username' => 'required|string|max:191',
            //'password' => 'required|string|min:6|confirmed',
            'celular' => 'required|numeric'
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('id',$id)->first();
            if ($request->has('nombres')) {
                $user->name = $request->nombres.' '.$request->apellidos;
            }
            if ($request->has('username') && $user->username != $request->username) {
                $validatedUserE = $request->validate([
                    'username' => 'required|string|max:191|unique:users,username,' .$user->id,
                ]);
                $user->username = $request->username;
            }
            if ($request->has('password') && $request->password != '') {
                $validatedUser = $request->validate([
                    'password'=>'min:6|confirmed',
                ]);
                $user->password = Hash::make($request->password);
            }
            $user->email = $request->email;
            $user->save();

            $user->syncRoles($request->get('roles'));

            // $idpersona = '';
            // if ($request->persona_id == null) {
                //persona
            $persona = Persona::where('user_id', $user->id)->firstorfail();
            $persona->user_id = $user->id;
            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->dni = $request->dni;
            $persona->celular = $request->celular;
            $persona->tipo = $request->tipo;
            $persona->ciudad = $request->ciudad;
            $persona->estado = $request->estado;
            $persona->save();

            //     $idpersona = $persona->id;
            // }else{
            //     $idpersona = $request->persona_id;
            // }
            //tienda
            $tienda = Tienda::where('persona_id', $persona->id)->firstorfail();
            $tienda->persona_id = $persona->id;
            
            if ($request->has('tienda') && $tienda->tienda != $request->tienda) {
                $validatedUserE = $request->validate([
                    'tienda' => 'required|string|max:191|unique:tiendas,tienda,' .$tienda->id,
                ]);
                $tienda->tienda = Str::title($request->tienda);
                $tienda->slug = Str::slug($request->tienda, '-');
            }
            $tienda->direccion = $request->direccion;
            $tienda->celular = $request->celulart;
            $tienda->facebook = $request->facebook;
            // $tienda->instagram = $request->instagram;
            $tienda->web = $request->web;
            $tienda->mapa = $request->mapa;
            $tienda->estado = $request->estado;
            $tienda->tipo_id = $request->tipo_id;
            $tienda->descripcion = $request->descripcion;
            $tienda->verificado = $request->verificado;
            // $tienda->portada = $imagen;
            $tienda->save();

            if ($request->file('portada')) {
                try{unlink(public_path($tienda->portada));}
                catch(\Exception $e){ }
                $portada = 'tienda/'.time().'-'.$tienda->slug.".jpg";
                $img = \Image::make($request->portada)->resize(null, 700, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($portada);
                // $img->resize(900, 700);
                $tienda->portada = $portada;
                $tienda->save();
            }

            //Registrar galeria de imagenes
            $imagal = Imagengaleri::where('tp_id', $tienda->id)->where('tipo','T')->first();
            // $imagal->tp_id = $tienda->id;
            // $imagal->tipo = 'P';
            if ($imagal) {
                if ($request->hasFile('gal1')) {
                    try{unlink(public_path($imagal->imagen_pri));}
                    catch(\Exception $e){ }
                    $name1 = 'galeriaimage/'.time().'-1'.$tienda->slug.".jpg";
                    $img = \Image::make($request->gal1)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                    $imagal->imagen_pri = $name1;
                }if($request->gal1_url){
                    $request->gal1_url = str_replace(".webp", ".jpg", $request->gal1_url);
                    try{unlink(public_path($imagal->imagen_pri));}
                    catch(\Exception $e){ }
                    $name1 = 'galeriaimage/'.time().'-1'.$tienda->slug.".jpg";
                    $img = \Image::make($request->gal1_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                    $imagal->imagen_pri = $name1;
                }
    
                // if ($request->hasFile('gal2')) {
                //     try{unlink(public_path($imagal->imagen_seg));}
                //     catch(\Exception $e){ }
                //     $name2 = 'galeriaimage/'.time().'-2'.$tienda->slug.".jpg";
                //     $img = \Image::make($request->gal2)->resize(null, 450, function ($constraint) {
                //                             $constraint->aspectRatio();
                //                         })->save($name2);
                //     $imagal->imagen_seg = $name2;
                // }if($request->gal2_url){
                //     $request->gal2_url = str_replace(".webp", ".jpg", $request->gal2_url);
                //     try{unlink(public_path($imagal->imagen_seg));}
                //     catch(\Exception $e){ }
                //     $name2 = 'galeriaimage/'.time().'-2'.$tienda->slug.".jpg";
                //     $img = \Image::make($request->gal2_url)->resize(null, 450, function ($constraint) {
                //                             $constraint->aspectRatio();
                //                         })->save($name2);
                //     $imagal->imagen_seg = $name2;
                // }
    
                // if ($request->hasFile('gal3')) {
                //     try{unlink(public_path($imagal->imagen_ter));}
                //     catch(\Exception $e){ }
                //     $name3 = 'galeriaimage/'.time().'-3'.$tienda->slug.".jpg";
                //     $img = \Image::make($request->gal3)->resize(null, 450, function ($constraint) {
                //                             $constraint->aspectRatio();
                //                         })->save($name3);
                //     $imagal->imagen_ter = $name3;
                // }if($request->gal3_url){
                //     $request->gal3_url = str_replace(".webp", ".jpg", $request->gal3_url);
                //     try{unlink(public_path($imagal->imagen_ter));}
                //     catch(\Exception $e){ }
                //     $name3 = 'galeriaimage/'.time().'-3'.$tienda->slug.".jpg";
                //     $img = \Image::make($request->gal3_url)->resize(null, 450, function ($constraint) {
                //                             $constraint->aspectRatio();
                //                         })->save($name3);
                //     $imagal->imagen_ter = $name3;
                // }
                $imagal->save();
            }else{
                $imagal = new Imagengaleri();
                $imagal->tp_id = $tienda->id;
                $imagal->tipo = 'T';
                if ($request->hasFile('gal1')) {
                    $name1 = 'galeriaimage/'.time().'-1'.$tienda->slug.".jpg";
                    $img = \Image::make($request->gal1)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                    $imagal->imagen_pri = $name1;
                }if($request->gal1_url){
                    $request->gal1_url = str_replace(".webp", ".jpg", $request->gal1_url);
                    $name1 = 'galeriaimage/'.time().'-1'.$tienda->slug.".jpg";
                    $img = \Image::make($request->gal1_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                    $imagal->imagen_pri = $name1;
                }
    
                if ($request->hasFile('gal2')) {
                    $name2 = 'galeriaimage/'.time().'-2'.$tienda->slug.".jpg";
                    $img = \Image::make($request->gal2)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name2);
                    $imagal->imagen_seg = $name2;
                }if($request->gal2_url){
                    $request->gal2_url = str_replace(".webp", ".jpg", $request->gal2_url);
                    $name2 = 'galeriaimage/'.time().'-2'.$tienda->slug.".jpg";
                    $img = \Image::make($request->gal2_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name2);
                    $imagal->imagen_seg = $name2;
                }
    
                if ($request->hasFile('gal3')) {
                    $name3 = 'galeriaimage/'.time().'-3'.$tienda->slug.".jpg";
                    $img = \Image::make($request->gal3)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name3);
                    $imagal->imagen_ter = $name3;
                }if($request->gal3_url){
                    $request->gal3_url = str_replace(".webp", ".jpg", $request->gal3_url);
                    $name3 = 'galeriaimage/'.time().'-3'.$tienda->slug.".jpg";
                    $img = \Image::make($request->gal3_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name3);
                    $imagal->imagen_ter = $name3;
                }
                $imagal->estado = 1;
                $imagal->save();
            }
    
            DB::commit();
            return redirect()->route('personal.index')
                ->with('info', 'El registro se guardo con éxito');           

        } catch (Exception $e) {
            DB::rollback();
            throw $e;

            return redirect()->route('personal.index')
                ->with('info', 'No se pudo hacer la operación.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }

    public function indexusers()
    {
        $users = User::join('personas','personas.user_id','=','users.id')
        ->join('tiendas','tiendas.persona_id','=','personas.id')
        ->where('users.id', '!=', Auth::id())
        ->select('users.id','personas.nombres','tiendas.tienda','users.email','personas.id as idper')
        ->get();
        return $users;
    }
    public function impersonate($user_id){

        $user = User::find($user_id);
        Auth::user()->impersonate($user);
        return redirect()->route('home');
    }
    
    public function impersonate_leave(){

        Auth::user()->leaveImpersonation();
        return redirect()->route('home');
    }
}
