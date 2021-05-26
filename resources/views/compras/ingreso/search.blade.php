{!! Form::open(['route' => 'ingreso.index', 'autocomplete' => 'off', 'method' => 'GET', 'role' => 'search']) !!}
<div class="input-group">
    <input type="text" class="form-control" id="buscar" name="searchText" placeholder="Ingresar el Ingreso" value="{{$searchText}}">
    <div class="input-group-append">
        <button class="btn btn-default"><i class="fas fa-search"></i></button>
    </div>
</div>
{!! Form::close() !!}
