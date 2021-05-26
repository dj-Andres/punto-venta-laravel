@extends('layout.admin')

@section('contenido')
    <div class="row mb-2">
        <div class="col sm-6">
            <h1>Ingresos
                <a href="{{route('ingreso.create')}}">
                    <button class="btn btn-primary">Nuevo Ingreso</button>
                </a>
            </h1>
        </div>
        <div class="col sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('categoria.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Lista de Ingresos</li>
            </ol>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar Ingresos</h3>
                    @include('compras.ingreso.search')
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-consend table-hover">
                                    <thead class="table-primary">
                                        <th>Fecha Ingreso</th>
                                        <th>Proveedor</th>
                                        <th>Comprobante</th>
                                        <th>Impuesto</th>
                                        <th>Estado</th>
                                        <th>Total</th>
                                        <th colspan="2">Opciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($ingresos as $ing)
                                            <tr>
                                                <td>{{$ing->hora_fecha }}</td>
                                                <td>{{ $ing->nombre }}</td>
                                                <td>{{ $ing->tipo_comprobante.' : '.$ing->serie_comprobante.' - '.$ing->num_comprobante }}</td>
                                                <td>{{ $ing->impuesto.' %' }}</td>
                                                @if ($ing->estado == "A")
                                                    <td>
                                                        <span class="badge badge-success">Activo</span>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <span class="badge badge-warning">Anulado</span>
                                                    </td>
                                                @endif
                                                <td>{{ $ing->total }}</td>

                                                <td width="10px">
                                                    <a href="{{route('ingreso.show',$ing->idingreso)}}">
                                                        <button class="btn btn-info">
                                                            Detalles
                                                        </button>
                                                    </a>
                                                </td>
                                                <td width="10px">
                                                    <form action="{{route('ingreso.destroy',$ing->idingreso)}}" method="POST">
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
                            {{ $ingresos->links() }}                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
