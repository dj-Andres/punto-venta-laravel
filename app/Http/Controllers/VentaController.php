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

    public function __construct()
    {
        $this->middleware('auth');
    }

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
                ->paginate(7);


            return view('ventas.venta.index', ["ventas" => $ventas, "searchText" => $query]);
        }
    }

    public function create()
    {
        $personas = DB::table('persona')->where('tipo_persona', '=', 'cliente')->get();

        $articulos = DB::table('articulo')
            ->join('detalle_ingresos', 'articulo.id', '=', 'detalle_ingresos.articulo_id')
            ->select(Db::raw('CONCAT(articulo.codigo," ",articulo.nombre) as articulo'), 'articulo.id', 'articulo.stock', DB::raw('avg(detalle_ingresos.precio_venta) as precio_promedio'))
            ->where('articulo.estado', '=', 'activo')
            ->where('articulo.stock', '>', '0')
            ->groupBy('articulo', 'articulo.id', 'articulo.stock')
            ->get();

        return view('ventas.venta.create', ["personas" => $personas, "articulos" => $articulos]);
    }

    public function store(VentaFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $venta = new Venta;
            $venta->cliente_id = $request->get('cliente_id');
            $venta->tipo_comprobante = $request->get('tipo_comprobante');
            $venta->serie_comprobante = $request->get('serie_comprobante');
            $venta->num_comprobante = $request->get('num_comprobante');
            $venta->total_venta = $request->get('total_venta');

            $myTime = Carbon::now('America/Guayaquil');
            $venta->fecha_hora = $myTime->toDateTimeString();
            $venta->impuesto = "12";
            $venta->estado = "A";
            $venta->save();

            $idarticulo = $request->get('articulo_id');
            $cantidad = $request->get('cantidad');
            $descuento = $request->get('descuento');
            $precio_venta = $request->get('precio_venta');

            $count = 0;

            while ($count < count($idarticulo)) {
                $detalle = new Detalle_Venta;
                $detalle->venta_id = $venta->id;
                $detalle->cantidad = $cantidad[$count];
                $detalle->descuento = $descuento[$count];
                $detalle->precio_venta = $precio_venta[$count];
                $detalle->save();

                $count = $count + 1;
            }
            Db::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return Redirect::to('ventas/venta');
    }

    public function show($id)
    {
        $venta = DB::table('ventas')
            ->join('persona', 'ventas.cliente_id', '=', 'persona.idpersona')
            ->join('detalle__ventas', 'ventas.idventa', '=', 'detalle__ventas.venta_id')
            ->select('ventas.idventa','persona.nombre', 'ventas.fecha_hora', 'ventas.tipo_comprobante', 'ventas.serie_comprobante', 'ventas.num_comprobante', 'ventas.impuesto', 'ventas.estado', 'ventas.total_venta')
            ->where('ventas.idventa', '=', $id)
            ->first();

        $detalles = DB::table('detalle__ventas')
            ->join('articulo', 'detalle__ventas.articulo_id', '=', 'articulo.id')
            ->select('articulo.nombre as articulo', 'detalle__ventas.cantidad', 'detalle__ventas.descuento', 'detalle__ventas.precio_venta')
            ->where('detalle__ventas.venta_id', '=', $id)
            ->get();

        return view('ventas.venta.show', ["venta" => $venta, "detalles" => $detalles]);
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
        $venta = Venta::findOrFail($id);
        $venta->estado = "C";
        $venta->update();
        return Redirect::to('ventas/venta');
    }
}
