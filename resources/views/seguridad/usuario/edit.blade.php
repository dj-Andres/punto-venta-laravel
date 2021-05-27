@extends('layout.admin')

@section('contenido')
        <div class="row mb-2">
            <div class="col sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('categoria.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Lista de Usuarios</li>
                </ol>
            </div>
        </div>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Editar Categoria</h3>
                            </div>
                            <div class="card-body">
                                {!! Form::model($usuario, ['route'=>['usuario.update',$usuario->id],'method'=>'PUT']) !!}
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label('nombre', 'Nombre') !!}
                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}

                                            @error('name')
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
                                            {!! Form::label('eamil', 'Correo Electronico') !!}
                                            
                                            <input type="email" name="email" id="email" placeholder="Ingrese su dirección de correo electronico" class="form-control" />

                                            @error('email')
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
                                            {!! Form::label('clave', 'Clave') !!}
                                            
                                            <input type="password" name="password" id="password" placeholder="Ingrese su dirección de correo contrasena" class="form-control" />

                                            @error('password')
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
