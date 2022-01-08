<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\Datatables\Datatables;
class UserController extends Controller
{

            //Constructor Auth
        /*Este constructor se encarga de que las rutas sean seguras.
         no se puedan acceder por el link si el usuario no esta registrados*/ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
                 //Funcion Index
         /*Esta funcion nos permite traer las vistas y mostrar los datos en pantalla.
         Tambien se pueden manejar consultas query como por ejemplo los Joins para relacionar tablas
         Por ejemplo "PrestamoEquipo::Join()", Tambien para generar variables que muestran los datos de una tabla
         */ 

            return view('admin.usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getUser()
    {
        return User::all();
        
    }

    public function store(Request $request)
    {
                          //Funcion Store
         /*Esta funcion nos permite hacer las form requests para almacenar datos o bien validarlos
         Se emplea la funcion validate paraque estos sean validados sin inconvenientes
         */ 
        $request->validate([    
            'nombre' => 'required|max:24',
            'apellido' => 'required|max:24',
            'cedula' => 'required|max:24',
            'email' => 'required|max:35',
            'usuario' => 'required|max:24',
            'estatus' => 'required|accepted',
            'password' => 'required|max:24'
                ]);
    
            $users = new User;
            $users->nombre = $request->nombre;
            $users->apellido = $request->apellido;
            $users->cedula = $request->cedula;
            $users->usuario = $request->usuario;
            $users->email = $request->email;
            $users->estatus = $request->estatus;
            $users->password = bcrypt($request->password);
            $users->save();
            /*if ($users->save()) {
             //$users->assignRole($request->rol);
            return redirect('/admin/users');
            }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $users=User::findOrFail($id);
            $users->nombre = $request->nombre;
            $users->apellido = $request->apellido;
            $users->cedula = $request->cedula;
            $users->usuario = $request->usuario;
            $users->email = $request->email;
            $users->estatus = $request->estatus;
            $users->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
