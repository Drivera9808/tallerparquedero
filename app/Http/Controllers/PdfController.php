<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PdfController extends Controller
{
    //Vehiculos
    public function imprimirVehiculos(Request $request)
    {
        $vehiculos = DB::table('vehiculos as ve')
            ->join('tipo_vehiculos as tv', 'tv.id', '=', 've.tipo')
            ->select('tv.nombre', 've.tipo', 've.id', 've.placa')
            ->get();
        $pdf = \PDF::loadView('Pdf.vehiculosPDF', ['vehiculos' => $vehiculos]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado de Vehiculos.pdf');
    }

    public function imprimirVehiculoUnico(Request $request, $id)
    {
        $vehiculounico = DB::table('vehiculos as ve')
            ->join('tipo_vehiculos as tv', 'tv.id', '=', 've.tipo')
            ->select('tv.nombre', 've.id', 've.color', 've.placa', 've.tipo', 've.modelo')
            ->where('ve.id', '=', $id)->get();

        foreach ($vehiculounico as $ve) {
            $id = $ve->id;
            $color = $ve->color;
            $placa = $ve->placa;
            $tipovehiculo = $ve->nombre;
            $modelo = $ve->modelo;
        }
        $pdf = \PDF::loadView('Pdf.vehiculoUnicoPDF', [
            'id' => $id,
            'color' => $color,
            'placa' => $placa,
            'tipovehiculo' => $tipovehiculo,
            'modelo' => $modelo,
        ]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Vehiculo Unico.pdf');
    }

    //Tipos De Vehiculos
    public function imprimirTipoVehiculos(Request $request)
    {
        $tipovehiculos = DB::table('tipo_vehiculos as tv')
            ->select('tv.id', 'tv.nombre', 'tv.descripcion')
            ->get();
        $pdf = \PDF::loadView('Pdf.tipoVehiculosPDF', ['tipovehiculos' => $tipovehiculos]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Lista Tipo Vehiculos.pdf');
    }

    public function imprimirTipoVehiculoUnico(Request $request, $id)
    {
        $tipovehiculounico = DB::table('tipo_vehiculos as tv')
            ->select('tv.id', 'tv.nombre', 'tv.descripcion')
            ->where('tv.id', '=', $id)->get();

        foreach ($tipovehiculounico as $tv) {
            $id = $tv->id;
            $nombre = $tv->nombre;
            $descripcion = $tv->descripcion;
        }

        $pdf = \PDF::loadView('Pdf.tipoVehiculoUnicoPDF', [
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
        ]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Tipo Vehiculo Unico.pdf');
    }

    //Tarifas
    public function imprimirTarifas(Request $request)
    {
        $tarifas = DB::table('tarifas as tar')
            ->join('tipo_vehiculos as tv', 'tv.id', '=', 'tar.tipo_vehiculo_id')
            ->select('tar.id', 'tar.tipo_vehiculo_id', 'tar.valor', 'tar.estado', 'tv.nombre')
            ->get();
        $pdf = \PDF::loadView('Pdf.tarifasPDF', ['tarifas' => $tarifas]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Lista Tarifas.pdf');
    }

    //Ingreasos
    public function imprimirIngresos(Request $request)
    {
        $ingreso = DB::table('ingreso_vehiculos as i')
            ->join('vehiculos as ve', 've.id', '=', 'i.vehiculos_id')
            ->join('tipo_vehiculos as tv', 'tv.id', '=', 've.tipo')
            ->select('ve.id', 've.placa', 'i.fecha_ingreso', 'i.estado', 'tv.nombre')->get();
        $pdf = \PDF::loadView('Pdf.ingresosPDF', ['ingreso' => $ingreso]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado Ingresos.pdf');
    }



    //Salidas
    public function imprimirSalidas(Request $request)
    {
        $salida = DB::table('vehiculos as v')
            ->join('ingreso_vehiculos as i', 'i.vehiculos_id', '=', 'v.id')
            ->join('tickets as tic', 'tic.ingreso_id', '=', 'i.id')
            ->join('tipo_vehiculos as tv', 'tv.id', '=', 'v.tipo')
            ->join('tarifas as t', 'tv.id', '=', 't.tipo_vehiculo_id')
            ->SELECT('tic.id', 'v.placa', 'tv.nombre', 'i.fecha_ingreso', 'tic.fecha_salida', 'tic.total')->get();

        $pdf = \PDF::loadView('Pdf.SalidasPDF', ['salida' => $salida]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado Salidas.pdf');
    }


    
}
