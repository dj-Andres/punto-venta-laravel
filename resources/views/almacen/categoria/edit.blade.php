@extends('layout.admin')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('categoria.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Gestión de Categorias</li>
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
                                <h3 class="card-title">Editar Categoria</h3>
                            </div>
                            <div class="card-body">
                                {!! Form::model($categoria, ['route'=>['categoria.update',$categoria->id],'method'=>'PUT']) !!}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::label('nombre', 'Nombre') !!}
                                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}

                                            @error('nombre')
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
                                            {!! Form::label('descripcion', 'Descripción') !!}
                                            {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción']) !!}

                                            @error('descripcion')
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
