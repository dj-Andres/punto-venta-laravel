@extends('layout.admin')
@section('contenido')
    <div class="row mb-2">
        <div class="col sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('categoria.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Lista de Ingresos</li>
            </ol>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detalle de Ingresos</h3>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('proveedor', 'Porveedor') !!}
                                    <p>{{$ingreso->nombre}}</p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('tipo_comprobante', 'Tipo de Comprobante') !!}
                                    <p>{{$ingreso->tipo_comprobante}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('serie_comprobante', 'Serie Comprobante') !!}
                                    <p>{{$ingreso->serie_comprobante}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('num_comprobante', 'Numero Comprobante') !!}
                                    <p>{{$ingreso->num_comprobante}}</p>
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
                                                <th>Precio Compra</th>
                                                <th>Precio Venta</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                @php
                                                    $suma = 0;
                                                @endphp    
                                                <h4 id="total">
                                                    $
                                                    @php
                                                        $suma+=$ingreso->cantidad*$ingreso->precio_compra;
                                                    @endphp
                                                    {{$suma}}
                                                </h4>
                                            </th>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($detalles as $detalle)
                                                <tr>
                                                    <td>{{$detalle->articulo}}</td>
                                                    <td>{{$detalle->cantidad}}</td>
                                                    <td>{{$detalle->precio_compra}}</td>
                                                    <td>{{$detalle->precio_venta}}</td>
                                                    <td>{{$detalle->cantidad * $detalle->precio_compra}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

