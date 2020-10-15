@extends('layouts.app')

@section('botones')
<a href="{{route('recetas.create')}}" class="btn btn-primary">Crear Recetas</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Arministrar recetas</h2>

   <div class="mx-auto col-md-10 bg-white p-3">
      
        <table class="table table-striped table-hover">
            <thead class="bg-primary">
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Controles</th>
                </tr>

            </thead>
            <tbody>
                @foreach($recetas as $receta)
                    <tr>
                        <td>{{$receta->titulo}}</td>
                        <td>{{$receta->categoria->nombre}}</td>
                        <td>
                            <a href="" class="btn btn-danger ">Eliminar</a>
                            <a href="{{route('recetas.edit',['receta'=>$receta->id])}}" class="btn btn-dark">Editar</a>
                            <a href="{{route('recetas.show',['receta'=>$receta->id])}}" class="btn btn-success">Ver</a>  
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        <table>
   </div>
@endsection