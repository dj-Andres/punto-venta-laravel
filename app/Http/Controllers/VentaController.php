<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests\VentaFormRequest;
use App\Models\Venta;
use App\Models\Detalle_Venta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class VentaController extends Controller
{

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $ventas = DB::table('ventas')
                ->join('persona', 'ventas.cliente_id', '=', 'persona.idpersona')
                ->join('detalle__ventas', 'ventas.idventa', '=', 'detalle__ventas.venta_id')
                ->select('ventas.idventa', 'ventas.fecha_hora', 'persona.nombre', 'ventas.tipo_comprobante', 'ventas.serie_comprobante', 'ventas.num_comprobante', 'ventas.impuesto', 'ventas.estado', 'ventas.total_venta')
                ->where('ventas.num_comprobante', 'LIKE', '%' . $query . '%')
                ->orderBy('ventas.idventa', 'desc')
                ->groupBy('ventas.idventa', 'ventas.fecha_hora', 'persona.nombre', 'ventas.serie_comprobante', 'ventas.num_comprobante', 'ventas.impuesto', 'ventas.estado')
                ->paginate(7);

            return view('ventas.venta.index', ["ventas" => $ventas,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $personas = DB::table('persona')->where('tipo_persona','=','cliente')->get();

        $articulos = DB::table('articulo')
                    ->join('detalle_ingresos','articulo.id','=','detalle_ingresos.articulo_id')
                    ->select(Db::raw('CONCAT(articulo.codigo," ",articulo.nombre) as articulo'),'articulo.id','articulo.stock',DB::raw('avg(detalle_ingresos.precio_venta) as precio_promedio'))
                    ->where('articulo.estado','=','activo')
                    ->where('articulo.stock','>','0')
                    ->groupBy('articulo','articulo.id','articulo.stock')
                    ->get();
        
        return view('ventas.venta.create',["personas"=>$personas,"articulos"=>$articulos]);

    }

    public function store(VentaFormRequest $request)
    {
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(VentaFormRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
