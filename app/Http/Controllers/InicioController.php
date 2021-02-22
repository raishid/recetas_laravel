<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoriaReceta;

class InicioController extends Controller
{
    public function index()
    {
        //mostrar recetas mas gustadas
        //$gustadas = Receta::has('likes', '>', 0)->get();
        $gustadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        //OBTENER RECETAS NUEVAS
        $recetas = Receta::latest()->limit(5)->get();

        //recetas por categorias
        $categorias = CategoriaReceta::all();
        //agrupar por categorias
        $recetas_categorias = array();
        foreach ($categorias as $categoria) {
            $recetas_categorias[Str::slug($categoria->nombre)][] = Receta::where('categoria_id',  $categoria->id )->take(3)->get();
        }

        return view('inicio.index', compact('recetas', 'recetas_categorias', 'gustadas'));
    }
}
