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
                    <h3 class="card-title">Información de Ingresos</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'ingreso.store', 'autocomplete' => 'off','id'=>"formulario",'accept-charset'=>'UTF-8']) !!}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('proveedor', 'Porveedor') !!}
                                    <select name="proveedor" id="proveedor" class="form-control" style="width:100%">
                                        @foreach ($personas as $persona)
                                            <option value="{{ $persona->idpersona }}">{{ $persona->nombre }}</option>
                                        @endforeach
                                    </select>

                                    @error('proveedor_id')
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('tipo_comprobante', 'Tipo de Comprobante') !!}
                                    {!! Form::select('tipo_comprobante', ['cedula' => 'Cedula', 'ruc' => 'RUC', 'factura' => 'Factura'], null, ['class' => 'form-control']) !!}

                                    @error('tipo_comprobante')
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('serie_comprobante', 'Serie Comprobante') !!}

                                    {!! Form::number('serie_comprobante', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Serie de Comprobante']) !!}

                                    @error('serie_comprobante')
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('num_comprobante', 'Numero Comprobante') !!}

                                    {!! Form::number('num_comprobante', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Numero de Comprobante']) !!}

                                    @error('num_comprobante')
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('articulo', 'Articulo') !!}

                                    <select name="articulo" id="articulo" class="form-control" style="width:100%">
                                        @foreach ($articulos as $articulo)
                                            <option class="form-control" value="{{ $articulo->id }}" style="width:100%">
                                                {{ $articulo->articulo }}</option>
                                        @endforeach
                                    </select>

                                    @error('articulo_id')
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('cantidad', 'Cantidad') !!}

                                    {!! Form::number('cantidad', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la cantidad', 'id' => 'cantidad']) !!}

                                    @error('cantidad')
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-3">
                                <div class="form-group">
                                    {!! Form::label('precio_compra', 'Precio  Compra') !!}

                                    {!! Form::number('precio_compra', null, ['class' => 'form-control', 'placeholder' => 'Precio Compra', 'id' => 'precio_compra']) !!}

                                    @error('precio_compra')
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-3">
                                <div class="form-group">
                                    {!! Form::label('precio_venta', 'Precio Venta') !!}

                                    {!! Form::number('precio_venta', null, ['class' => 'form-control', 'placeholder' => 'Precio Venta', 'id' => 'precio_venta']) !!}

                                    @error('precio_venta')
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <span><i class="fas fa-times m-1"></i>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-3">
                                <div class="form-group my-4 pb-3">
                                    <button id="btn-agregar" class="btn btn-primary">Agregar</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table id="detalles" class="table table-hover table-condensed table-bordered table-striped">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Opciones</th>
                                                <th>Articulos</th>
                                                <th>Cantidad</th>
                                                <th>Precio Compra</th>
                                                <th>Precio Venta</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <th>Total</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                <h4 id="total">$ 0.00</h4>
                                            </th>
                                        </tfoot>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                                <div class="form-group">
                                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <button type="reset" class="btn btn-danger">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@include('layout.partials.js')

<script>
    $(document).ready(function() {
        
        total = 0;
        var count = 0;
        Subtotal = [];
        $('#guardar').hide();

        //$(".select2").select2();

        $(document).on('click','#btn-agregar',(e)=>{

            e.preventDefault();

            let id_articulo = $('#articulo').trigger("change");
            let articulo = $('#articulo option:selected').text();
            let cantidad = $('#cantidad').val();
            let precio_venta = $('#precio_venta').val();
            let precio_compra = $('#precio_compra').val();

            if(id_articulo != "" && articulo != "" && cantidad != "" && precio_compra != "" && precio_venta != "")
            {
                Subtotal[count] = (cantidad * precio_compra);
                total = total + Subtotal[count];

                let fila =
                  `<tr class="selected" id="fila${count}">
                        <td>
                            <button class="elimar-art btn btn-warning"><i class="fas fa-times-circle"></i></button>
                        </td>
                        <td>
                            <input type="hidden" name="id_articulo[]" value="${id_articulo}">${articulo}
                        </td>
                        <td>
                            <input type="number" name="cantidad[]" class="form-control" value="${cantidad}">
                        </td>
                        <td>
                            <input type="number" name="precio_compra[]" class="form-control" value="${precio_compra}">
                        </td>
                        <td>
                            <input type="number" name="precio_venta[]" class="form-control" value="${precio_venta}">
                        </td>
                        <td>
                            ${Subtotal[count]}
                        </td>
                    </tr>`;

                count++;
                clear();
                $('#total').html("$ "+total);
                evaluar();
                $('#detalles').append(fila);

            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se puede dejar campos vacios, por favor llenar todos los campos!',
                });
            }
        });

        function evaluar(){
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function clear(){
            let cantidad = $('#cantidad').val("");
            let precio_venta = $('#precio_venta').val("");
            let precio_compra = $('#precio_compra').val("");
        }

        $(document).on('click','.elimar-art',(e)=>{
            let elememto = $(this)[0].activeElement.parentElement.parentElement;
            total = total-Subtotal[elememto];
            $('#total').html("$ "+total);
            //$('#fila'elememto).remove();
            elememto.remove();
        });
    });
</script>
