@extends('layout.admin')

@section('contenido')
    <div class="row mb-2">
        <div class="col sm-6">
            <h1>Ventas
                <a href="{{route('venta.create')}}">
                    <button class="btn btn-primary">Nuevo Venta</button>
                </a>
            </h1>
        </div>
        <div class="col sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('categoria.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Lista de Ventas</li>
            </ol>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar Ventas</h3>
                    @include('ventas.venta.search')
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-consend table-hover">
                                    <thead class="table-primary">
                                        <th>Fecha Ingreso</th>
                                        <th>Cliente</th>
                                        <th>Comprobante</th>
                                        <th>Impuesto</th>
                                        <th>Estado</th>
                                        <th>Total</th>
                                        <th colspan="2">Opciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($ventas as $venta)
                                            <tr>
                                                <td>{{ $venta->fecha_hora }}</td>
                                                <td>{{ $venta->nombre }}</td>
                                                <td>{{ $venta->tipo_comprobante.' : '.$venta->serie_comprobante.' - '.$venta->num_comprobante }}</td>
                                                <td>{{ $venta->impuesto.' %' }}</td>
                                                @if ($venta->estado == "A")
                                                    <td>
                                                        <span class="badge badge-success">Activo</span>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <span class="badge badge-warning">Anulado</span>
                                                    </td>
                                                @endif
                                                <td>{{ $venta->total_venta }}</td>

                                                <td width="10px">
                                                    <a href="{{route('venta.show',$venta->idventa)}}">
                                                        <button class="btn btn-info">
                                                            Detalles
                                                        </button>
                                                    </a>
                                                </td>
                                                <td width="10px">
                                                    <form action="{{route('venta.destroy',$venta->idventa)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger">
                                                            Anular
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end" id="paginator">
                            {{ $ventas->links() }}                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
