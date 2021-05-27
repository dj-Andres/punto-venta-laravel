@extends('layout.admin')

@section('contenido')
    <div class="container">
        <div class="row mb-2">
        <div class="col sm-6">
            <h1>Usuarios
                <a href="{{route('usuario.create')}}">
                    <button class="btn btn-primary">Nuevo</button>
                </a>
            </h1>
        </div>
        <div class="col sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('categoria.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Lista de Usuarios</li>
            </ol>
        </div>
    </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar Usuarios</h3>
                    @include('seguridad.usuario.search')
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-consend table-hover">
                                    <thead>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th colspan="2">Opciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td>{{ $usuario->id }}</td>
                                                <td>{{ $usuario->name }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td width="10px">
                                                    <a href="{{route('usuario.edit',$usuario->id)}}">
                                                        <button class="btn btn-info">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td width="10px">
                                                    <form action="{{route('usuario.destroy',$usuario->id)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger">
                                                            <i class="fas fa-transgender-alt"></i>
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
                            {{ $usuarios->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
