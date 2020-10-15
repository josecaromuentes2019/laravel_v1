<?php

namespace App\Http\Controllers;

use App\Receta;
use App\Categoria;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{

    /**
     * abilita la autenticaion de usuarios
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //auth()->user()->relacionRecetas->dd();
        $recetas = auth()->user()->recetas;
        return view('recetas.index',compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       //$categorias = DB::table('categorias')->get()->pluck('nombre','id');

       $categorias = Categoria::all(['id','nombre']);
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
        //dd($request->all());

        //dd( $request['imagen']->store('upload-imagen','public'));
       
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'ingredientes' => 'required',
            'preparacion' => 'required',
            'imagen' => 'required|image',
        ]);
       

        /**
         * Almacenar imagen
         */
        $ruta_imagen =  $request['imagen']->store('upload-imagen','public');
        /**
         * Recocotar imagen usando intervention image
         * instalacion: composer require intervention/image
         */
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(800,350);
        $img->save();
    
      /*
       DB::table('recetas')->insert([
            'titulo'=>$data['titulo'],
            'categoria_id'=>$data['categoria'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'foto'=> $ruta_imagen,
            'user_id' => Auth::user()->id
        ]);*/

        /**
         * Almacenar con modelo 
         * */
      
        auth()->user()->recetas()->create([
        'titulo'=>$data['titulo'],
        'categoria_id'=>$data['categoria'],
        'ingredientes' => $data['ingredientes'],
        'preparacion' => $data['preparacion'],
        'foto'=> $ruta_imagen,
       ]);
       
       
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        return view('recetas.show',compact('receta'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $tituloReceta= 'Editar Receta';
        $categorias = Categoria::all(['id','nombre']);
        return view('recetas.edit')->with('receta',$receta)
                                   ->with('categorias',$categorias)
                                   ->with('titulo_receta',$tituloReceta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
