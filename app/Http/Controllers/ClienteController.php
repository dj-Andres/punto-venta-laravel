<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonaFormRequest;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;



class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $personas = DB::table('persona')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->where('tipo_persona', '=', 'cliente')
                ->orWhere('num_documento', 'LIKE', '%' . $query . '%')
                ->where('tipo_persona', '=', 'cliente')
                ->orderBy('idpersona', 'asc')
                ->paginate(7);

            return view('ventas.cliente.index', ["personas" => $personas, "searchText" => $query]);
        }
    }

    public function create()
    {
        return view('ventas.cliente.create');
    }

    public function store(PersonaFormRequest $request)
    {
        $persona = new Persona;

        $persona->tipo_persona = 'cliente';
        $persona->nombre = $request->get('nombre');
        $persona->tipo_documento = $request->get('tipo_documento');
        $persona->num_documento = $request->get('num_documento');
        $persona->direccion = $request->get('direccion');
        $persona->telefono = $request->get('telefono');
        $persona->email = $request->get('email');

        $persona->save();
        return Redirect::to('ventas/cliente');
    }

    public function show($id)
    {
        return view('ventas.cliente.show', ["persona" => Persona::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('ventas.cliente.edit', ["persona" => Persona::findOrFail($id)]);
    }

    public function update(PersonaFormRequest $request, $id)
    {
        $persona = Persona::findOrFail($id);

        $persona->nombre = $request->get('nombre');
        $persona->tipo_documento = $request->get('tipo_documento');
        $persona->num_documento = $request->get('num_documento');
        $persona->direccion = $request->get('direccion');
        $persona->telefono = $request->get('telefono');
        $persona->email = $request->get('email');

        $persona->update();
        return Redirect::to('ventas/cliente');
    }


    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->tipo_persona = 'inactivo';
        $persona->update();
        return Redirect::to('ventas/cliente');
    }
}
