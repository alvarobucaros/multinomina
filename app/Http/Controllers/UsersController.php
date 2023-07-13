<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Users;

class UsersController extends Controller
{
    public function index()
    {
        $datos = Users::where('empresa', auth()->user()->empresa)
        ->orderBy('username')
        ->paginate(8);
        return view('user/index', compact('datos'));
    }
      /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new Users();
        $user->tt_idEmpresa = auth()->user()->empresa;
        $user->tt_estado = 'A';
      
        return view('user/agregar', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Users();
        $user->empresa = auth()->user()->empresa;
        $user->name = $request->post('name');
        $user->username = $request->post('username');
        $user->direccion = $request->post('direccion');
        $user->barrio = $request->post('barrio');
        $user->ciudad = $request->post('ciudad');
        $user->email = $request->post('email');
        $user->codigo = $request->post('codigo');
        $user->tipodoc = $request->post('tipodoc');
        $user->nrodoc = $request->post('nrodoc');
        $user->password  =  bcrypt('Admin123'); // hash::make('Admin123'); $request->post('em_us_clave');
        $user->en_nombre = 'Admin123';
        $user->telefono = $request->post('telefono');
        $user->profile = $request->post('profile');
        $user->estado = $request->post('estado');
        $user->save();
        return redirect()->route("user")->with("success","Agregado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Users::find($id);
        return view('user/eliminar', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Users::find($id);
        return view('user/actualizar', compact('user'));
    }
    public function changepwd(string $id)
    {
        $user = Users::find($id);
        return view('user/changepwd', compact('user'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Users::find($id); 
        $user->empresa = auth()->user()->empresa;
        $user->name = $request->post('name');
        $user->username = $request->post('username');
        $user->direccion = $request->post('direccion');
        $user->barrio = $request->post('barrio');
        $user->ciudad = $request->post('ciudad');
        $user->email = $request->post('email');
        $user->codigo = $request->post('codigo');
        $user->tipodoc = $request->post('tipodoc');
        $user->nrodoc = $request->post('nrodoc');        
        $user->en_nombre = '';
        $user->telefono = $request->post('telefono');
        $user->profile = $request->post('profile');
        $user->estado = $request->post('estado');
        $user->save();
        return redirect()->route("user")->with("success","Actualizado correctamente");
     }

     public function updatepwd(Request $request, string $id)
     {
        $user = Users::find($id); 
        $user->password  =  bcrypt($request->post('passNuevo'));
        $user->save();
        return redirect()->route("user")->with("success","Actualizado correctamente");
      }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Users::find($id); 
        $user->delete();
        return redirect()->route("user")->with("success","Eliminado correctamente");
 
    }
    public function export (){

    }
}

