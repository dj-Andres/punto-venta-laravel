@extends('layout.admin')
@section('contenido')
    <div class="row mb-2">
        <div class="col sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('categoria.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Lista de Ventas</li>
            </ol>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detalle de Ventas</h3>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('cliente', 'Cliente') !!}
                                    <p>{{$venta->nombre}}</p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('tipo_comprobante', 'Tipo de Comprobante') !!}
                                    <p>{{$venta->tipo_comprobante}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('serie_comprobante', 'Serie Comprobante') !!}
                                    <p>{{$venta->serie_comprobante}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('num_comprobante', 'Numero Comprobante') !!}
                                    <p>{{$venta->num_comprobante}}</p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table id="detalles" class="table table-hover table-condensed table-bordered table-striped">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Articulo</th>
                                                <th>Cantidad</th>
                                                <th>Precio Venta</th>
                                                <th>Descuento</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                <h4 id="total">
                                                    {{ $venta->total_venta}}
                                                </h4>
                                            </th>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($detalles as $detalle)
                                                <tr>
                                                    <td>{{$detalle->articulo}}</td>
                                                    <td>{{$detalle->cantidad}}</td>
                                                    <td>{{$detalle->precio_venta}}</td>
                                                    <td>{{$detalle->descuento}}</td>
                                                    <td>{{$detalle->cantidad * $detalle->precio_venta - $detalle->descuento}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <div>
                        <a href="{{ route('venta.index') }}" class="btn btn-primary">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

