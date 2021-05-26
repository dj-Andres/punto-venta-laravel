@extends('layout.admin')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('categoria.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Gestión de Proveedores</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container-fluid">

                {!! Form::open(['route' => 'proveedor.store', 'autocomplete' => 'off']) !!}
                {!! Form::token() !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre']) !!}

                            @error('nombre')
                                <div class="alert alert-danger mt-2" role="alert">
                                    <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('direccion', 'Dirección') !!}
                            {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la dirección']) !!}

                            @error('direccion')
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
                            {!! Form::label('tipo_documento', 'Tipo de Documento') !!}
                            
                            {!! Form::select('tipo_documento',['cedula'=>'cedula','ruc'=>'ruc','pasaporte'=>'pasaporte'],null ,['class' => 'form-control']) !!}

                            @error('tipo_documento')
                                <div class="alert alert-danger mt-2" role="alert">
                                    <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            {!! Form::label('num_documento', 'Numero de Documento') !!}
                            {!! Form::number('num_documento', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su documento']) !!}

                            @error('num_documento')
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
                            {!! Form::label('telefono', 'Telefono') !!}
                            {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingresar su telefono']) !!}

                            @error('telefono')
                                <div class="alert alert-danger mt-2" role="alert">
                                    <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            {!! Form::label('email', 'Correo Electronico') !!}
                            {!! Form::email('email', $value=null, ['class'=>'form-control','placeholder'=>'Ingresar su dirección de correo electronico']) !!}

                            @error('imail')
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

    </section>
    </div>
@endsection
