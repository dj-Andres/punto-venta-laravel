<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngresoFormRequest;
use App\Models\Detalle_ingreso;
use App\Models\Ingreso;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;
use Response;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $ingresos = DB::table('ingresos')
                ->join('persona', 'ingresos.proveedor_id', '=', 'persona.idpersona')
                ->join('detalle_ingresos', 'ingresos.idingreso', '=', 'detalle_ingresos.ingreso_id')
                ->select('ingresos.idingreso', 'ingresos.hora_fecha', 'persona.nombre', 'ingresos.tipo_comprobante', 'ingresos.serie_comprobante', 'ingresos.num_comprobante', 'ingresos.impuesto', 'ingresos.estado', DB::raw('sum(detalle_ingresos.cantidad*detalle_ingresos.precio_compra) as total'))
                ->where('ingresos.num_comprobante', 'LIKE', '%' . $query . '%')
                ->orderBy('ingresos.idingreso', 'desc')
                ->groupBy('ingresos.idingreso', 'ingresos.hora_fecha', 'persona.nombre', 'ingresos.tipo_comprobante', 'ingresos.serie_comprobante', 'ingresos.impuesto', 'ingresos.num_comprobante', 'ingresos.estado')
                ->paginate(7);


            return view('compras.ingreso.index', ["ingresos" => $ingresos, "searchText" => $query]);
        }
    }


    public function create()
    {
        $personas = DB::table('persona')->where('tipo_persona', '=', 'proveedor')->get();


        $articulos = DB::table('articulo as art')
            ->select(DB::raw('CONCAT(art.codigo," ",art.nombre)AS articulo'), 'art.id')
            ->where('art.estado', '=', 'activo')
            ->get();

        return view('compras.ingreso.create', ["personas" => $personas, "articulos" => $articulos]);
    }

    public function store(IngresoFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $ingreso = new Ingreso;
            $ingreso->proveedor_id = $request->get('proveedor_id');
            $ingreso->tipo_comprobante = $request->get('tipo_comprobante');
            $ingreso->serie_comprobante = $request->get('serie_comprobante');
            $ingreso->num_comprobante = $request->get('num_comprobante');
            $myTime = Carbon::now('America/Guayaquil');
            $ingreso->hora_fecha = $myTime->toDateTimeString();
            $ingreso->impuesto = '12';
            $ingreso->estado = 'A';
            $ingreso->save();

            $id_articulo = $request->get('articulo_id');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');
            $precio_venta = $request->get('precio_venta');

            $cont = 0;


            while ($cont < count($id_articulo)) {

                $detalle = new Detalle_ingreso();
                $detalle->ingreso_id = $ingreso->idingreso;
                $detalle->articulo_id = $id_articulo[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio_compra = $precio_compra[$cont];
                $detalle->precio_venta = $precio_venta[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return Redirect::to('compras/ingreso');
    }


    public function show($id)
    {
        $ingreso = DB::table('ingresos')
            ->join('persona', 'ingresos.proveedor_id', '=', 'persona.idpersona')
            ->join('detalle_ingresos', 'ingresos.idingreso', '=', 'detalle_ingresos.ingreso_id')
            ->select('ingresos.idingreso','persona.nombre','ingresos.tipo_comprobante','ingresos.serie_comprobante','ingresos.num_comprobante','detalle_ingresos.cantidad','detalle_ingresos.precio_compra')
            ->where('ingresos.idingreso','=',$id)
            ->first();

        $detalles = DB::table('detalle_ingresos')
            ->join('articulo', 'detalle_ingresos.articulo_id', '=', 'articulo.id')
            ->select('articulo.nombre as articulo', 'detalle_ingresos.cantidad', 'detalle_ingresos.precio_compra', 'detalle_ingresos.precio_venta')
            ->where('detalle_ingresos.ingreso_id', '=', $id)->get();

        return view('compras.ingreso.show', ["ingreso" => $ingreso,"detalles" => $detalles]);
    }

    public function edit($id)
    {
        //
    }

    public function update(IngresoFormRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->estado = 'C';
        $ingreso->update();

        return Redirect::to('compras/ingreso');
    }
}
