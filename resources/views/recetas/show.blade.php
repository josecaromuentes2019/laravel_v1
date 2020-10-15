@extends('layouts.app')

@section('content')
{{--<h4>{{$receta}}</h4>--}}

<article class="recetas-meta">
    <h2 class="text-center">{{$receta->titulo}}</h2>
    
    <div class="imagen-receta ">
        <img src="/storage/{{$receta->foto}}" alt="" class="w-100">
    </div>

    <p>
        <span class="font-weight-bold mt-2 text-danger">Seccion: </span>
        {{$receta->categoria->nombre}}

    </p>

    <p>
        <span class="font-weight-bold mt-2 text-danger">Autor: </span>
        {{--user, para este caso se refiere al metodo que determina relacion en Receta--}}
        {{$receta->user->name}}

    </p>

    <p>
        <span class="font-weight-bold mt-2 text-danger">Ingredientes: </span>
        {!!$receta->ingredientes!!}
    </p>

    <p>
        <span class="font-weight-bold mt-2 text-danger">Preparacion: </span>
        {!!$receta->preparacion!!}
    </p>

</article>


@endsection