<?php

namespace App\Http\Controllers;

use App\Models\PrestamoEquipo;
use App\Models\Equipo;
use App\Models\User;
use Illuminate\Http\Request;

class PrestamoEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipoPrestamo = Equipo::all();
        $usuarioPrestamo = User::all();   
        return view('admin.prestamos.index',  compact('usuarioPrestamo', 'equipoPrestamo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPrestamos()
    {
        return PrestamoEquipo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrestamoEquipo  $prestamoEquipo
     * @return \Illuminate\Http\Response
     */
    public function show(PrestamoEquipo $prestamoEquipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrestamoEquipo  $prestamoEquipo
     * @return \Illuminate\Http\Response
     */
    public function edit(PrestamoEquipo $prestamoEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrestamoEquipo  $prestamoEquipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrestamoEquipo $prestamoEquipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrestamoEquipo  $prestamoEquipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrestamoEquipo $prestamoEquipo)
    {
        //
    }
}
