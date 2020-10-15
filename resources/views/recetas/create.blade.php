@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
@endsection

@section('botones')
<a href="{{route('recetas.index')}}" class="btn btn-primary">Listar Recetas</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Crear Recetas</h2>
   

   <div class="justify-content-center mx-auto col-md-8 bg-white mt-3">

   <form action="{{route('recetas.store')}}" method="POST" enctype="multipart/form-data" novalidate>

        @csrf
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text"
                       class="form-control @error('titulo') is-invalid @enderror"
                       id='titulo'
                       name="titulo"
                       placeholder="Escribe un titulo"
                       value="{{ old('titulo') }}"/>

                       @error('titulo')
                           <span class="invalid-feedback " role="alert">
                               <strong>{{$message}}</strong>
                           </span>
                       @enderror
            </div>

            <div class="form-group">
                <label for="categoria">Categoria</label>

                <select name="categoria" 
                        id="categoria" 
                        class="form-control @error('categoria') is-invalid @enderror">

                        <option value="">--Selecciona--</option>
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}"  {{old('categoria') == $categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>                       
                    @endforeach
                </select>
                
                @error('categoria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="ingredientes">Ingredientes</label>
                <input type="hidden" name="ingredientes" id="ingredientes" value="{{old('ingredientes')}}">
                <trix-editor 
                class=" form-control @error('ingredientes') is-invalid @enderror"
                input="ingredientes"
                ></trix-editor>
                 @error('ingredientes')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{$message}}</strong>
                        </span>
                 @enderror
            
            </div>

            <div class="form-group">
                <label for="preparacion">Preparacion</label>
                <input type="hidden" name="preparacion" id="preparacion" value="{{old('preparacion')}}">
                <trix-editor 
                class=" form-control @error('preparacion') is-invalid @enderror"
                input="preparacion"
                ></trix-editor>
                 @error('preparacion')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{$message}}</strong>
                        </span>
                 @enderror
            
            </div>


            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file"
                       class="form-control @error('imagen') is-invalid @enderror"
                       id='imagen'
                       name="imagen"
                       value="{{ old('imagen') }}"/>

                       @error('imagen')
                           <span class="invalid-feedback " role="alert">
                               <strong>{{$message}}</strong>
                           </span>
                       @enderror
            </div>


            <div class="form-group">

                <input type="submit" value="Enviar" class="btn btn-primary">
            </div>
    </form>

   </div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous" defer></script>
@endsection