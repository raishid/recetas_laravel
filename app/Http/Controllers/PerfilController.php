<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        return view('perfiles.show')->with('perfil', $perfil);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        $this->authorize('view', $perfil);

        return view('perfiles.edit')->with('perfil', $perfil);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //verificar que sea el mismo usuario modificando el perfil
        $this->authorize('update', $perfil);

        //validar
        $data = request()->validate([
            'nombre' => 'required',
            'url' => 'required',
            'biografia' => 'required',
            'imagen'=> 'image'
        ]);

        //si el usuario sube la imagen
        if( $request['imagen'] ){
            //guardar imagen
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');
            //dd($ruta_imagen, "storage/$ruta_imagpen");
            //resize imagne
            $img = Image::make(public_path("storage/$ruta_imagen"))->fit(600, 600);
            $img->save();
            $data['imagen'] = $ruta_imagen;
        }

        //guardar
        //aginar nombre y url
        auth()->user()->url = $data['url'];
        auth()->user()->name = $data['nombre'];
        auth()->user()->save();

        //eliminar campo
        unset($data['url']);
        unset($data['nombre']);

        //asigar biografia e imagen
        auth()->user()->perfil()->update(
            $data
        );

        return redirect()->route('recetas.index');
    }

}
