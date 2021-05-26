@extends('layout.admin')

@section('contenido')
    <div class="row mb-2">
        <div class="col sm-6">
            <h1>Proveedores
                <a href="{{route('proveedor.create')}}">
                    <button class="btn btn-primary">Nuevo Proveedor</button>
                </a>
            </h1>
        </div>
        <div class="col sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('categoria.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Lista de Proveedores</li>
            </ol>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar Proveedores</h3>
                    @include('compras.proveedor.search')
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-consend table-hover">
                                    <thead>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Tipo de Doc</th>
                                        <th>Numero de Doc</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th colspan="2">Opciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($personas as $persona)
                                            <tr>
                                                <td>{{ $persona->idpersona }}</td>
                                                <td>{{ $persona->nombre }}</td>
                                                <td>{{ $persona->tipo_documento }}</td>
                                                <td>{{ $persona->num_documento }}</td>
                                                <td>{{ $persona->telefono }}</td>
                                                <td>{{$persona->email}}</td>
                                                <td width="10px">
                                                    <a href="{{route('proveedor.edit',$persona->idpersona)}}">
                                                        <button class="btn btn-info">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td width="10px">
                                                    <form action="{{route('proveedor.destroy',$persona->idpersona)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger">
                                                            <i class="fas fa-user-check"></i>
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
                            {{ $personas->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
