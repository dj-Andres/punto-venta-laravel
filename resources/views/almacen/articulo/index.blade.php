@extends('layout.admin')

@section('contenido')
    <div class="row mb-2">
        <div class="col sm-6">
            <h1>Articulo 
                <a href="{{route('articulo.create')}}">
                    <button class="btn btn-primary">Nuevo</button>
                </a>
            </h1>
        </div>
        <div class="col sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('categoria.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Lista de Articulo</li>
            </ol>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar Categoria</h3>
                    @include('almacen.articulo.search')
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-consend table-hover">
                                    <thead>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        <th>Categoria</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                        <th>Descripción</th>
                                        <th colspan="2">Opciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($articulos as $articulo)
                                            <tr>
                                                <td>{{ $articulo->id }}</td>
                                                <td>{{ $articulo->nombre }}</td>
                                                <td>{{ $articulo->codigo }}</td>
                                                <td>{{ $articulo->categoria }}</td>
                                                <td>{{ $articulo->stock }}</td>
                                                <td>
                                                    <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" alt="{{$articulo->nombre}}" width="100px" height="100px" class="img-thumbnail">
                                                </td>
                                                <td>{{$articulo->estado}}</td>
                                                <td>{{ $articulo->descripcion }}</td>
                                                <td width="10px">
                                                    <a href="{{route('articulo.edit',$articulo->id)}}">
                                                        <button class="btn btn-info">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td width="10px">
                                                    <form action="{{route('articulo.destroy',$articulo->id)}}" method="POST">
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
                            {{ $articulos->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
