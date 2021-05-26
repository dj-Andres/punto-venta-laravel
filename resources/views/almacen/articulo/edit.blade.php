@extends('layout.admin')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('categoria.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Gestión de Articulos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Guardar Categoria</h3>
                            </div>
                            <div class="card-body">
                                {!! Form::model($articulo,['route' => ['articulo.update',$articulo->id],'autocomplete'=>'off','files'=> true,'method'=>'PUT']) !!}
                                {!! Form::token() !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('nombre', 'Nombre') !!}
                                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del articulo']) !!}
                                
                                            @error('nombre')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('categoria', 'Categoria') !!}
                                            
                                            <select name="categoria_id" class="form-control">
                                                @foreach ($categorias as $categoria)
                                                    @if ($categoria->id == $articulo->categoria_id)
                                                        <option value="{{$categoria->id}}" selected>{{$categoria->nombre}}</option>    
                                                    @else
                                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                            @error('categoria_id')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            {!! Form::label('codigo', 'Codigo') !!}
                                            {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el codigo']) !!}
                                
                                            @error('codigo')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            {!! Form::label('stock', 'Stock') !!}
                                            {!! Form::number('stock', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el stock']) !!}
                                
                                            @error('stock')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            {!! Form::label('descripcion', 'Descripción') !!}
                                            {!! Form::textarea('descripcion', null, ['class'=>'form-control','placeholder' => 'Ingresar la descripcion']) !!}
                                
                                            @error('descripcion')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            {!! Form::label('file', 'Imagen de muestra en caso que de que no suba una !') !!}
                                            {!! Form::file('file', ['class'=>'form-control-file','accept'=>'image/*']) !!}

                                            @if (($articulo->imagen) != '')
                                                <img src="{{asset('imagenes/articulos'.$articulo->imagen)}}">
                                            @endif
                                
                                            @error('imagen')
                                                <div class="alert alert-danger mt-2" role="alert">
                                                    <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                                            <button type="reset" class="btn btn-danger">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
