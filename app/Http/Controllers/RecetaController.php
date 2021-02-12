<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use App\Models\CategoriaReceta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{

   public function __construct()
   {
       //exigir autenticacion
       $this->middleware('auth', ['except' => 'show']);
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = auth()->user()->recetas;

        return view('recetas.index')->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //obtener categoria sin modelo
        /*
        $categorias = DB::table('categoria_recetas')->get()->pluck('nombre', 'id');
        */
        //con modelo
        $categorias = CategoriaReceta::all(['id', 'nombre']);
        return view('recetas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion

        $data = request()->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image',
        ]);

        //guardar imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        //resize imagne
        $img = Image::make(public_path("storage/$ruta_imagen"))->fit(1000, 550);
        $img->save();

        //almacenar en la base de datos sin modelo
        /* DB::table('recetas')->insert([
            'titulo' =>  $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'user_id' => Auth::user()->id,
            'categoria_id' => $data['categoria'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); */

        auth()->user()->recetas()->create([
            'titulo' =>  $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']
        ]);

        return redirect()->route('recetas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        return view('recetas.show')->with('receta', $receta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $this->authorize('view', $receta);

        $categorias = CategoriaReceta::all(['id', 'nombre']);

        return view('recetas/edit')->with('categorias', $categorias)
                                    ->with('receta', $receta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        // cumplir la autorizacion del policy
        $this->authorize('update', $receta);

        //validacion

        $data = request()->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'image',
        ]);
        //asigando a valores
        $receta->titulo = $data['titulo'];
        $receta->categoria_id = $data['categoria'];
        $receta->preparacion = $data['preparacion'];
        $receta->ingredientes = $data['ingredientes'];

        if(request('imagen')){
            //guardar imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        //resize imagne
        $img = Image::make(public_path("storage/$ruta_imagen"))->fit(1000, 550);
        $img->save();

        $receta->imagen = $ruta_imagen;
        }
        //actualizar datos
        $receta->save();

        //redirect

        return redirect()->route('recetas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {

        //verificar que es usuario autenticado
        $this->authorize('delete', $receta);

        //eliminar receta

        $receta->delete();

        return redirect()->route('recetas.index');

    }
}
