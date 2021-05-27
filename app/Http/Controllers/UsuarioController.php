<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));

            $usuarios = DB::table('users')->where('name','LIKE','%'.$query.'%')
                        ->orderBy('id','desc')
                        ->paginate(7);

            return view('seguridad.usuario.index',["searchText" => $query, "usuarios" =>$usuarios]);

        }
    }

    public function create()
    {
        return view('seguridad.usuario.create');
    }

    public function store(UserFormRequest $request)
    {
        $usuario = new User;
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));

        $usuario->save();

        return Redirect::to('seguridad/usuario');
    }

    public function edit($id)
    {
        return view('seguridad.usuario.edit',["usuario" => User::findOrFail($id)]);
    }

    public function update(UserFormRequest $request,$id)
    {
        $usuario = User::findOrFail($id);
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));

        $usuario->update();

        return Redirect::to('seguridad/usuario');
    }

    public function destroy($id)
    {
        $usuario = DB::table('users')->where('id' ,'=', $id)->delete();
        return Redirect::to('seguridad/usuario');
    }

}
