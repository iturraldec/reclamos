<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


//
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$reclamos = User::paginate(15);
		return view('auth.list', compact("reclamos"));
    }

	 // carga los reclamos
	 public function load_data()
    {
		$users = User::where('rol', '=', 'Admin')->get();
		return datatables()->of($users)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$datos = $request->all();
		$user = User::firstOrCreate([
			'dip_tp' => $datos['dip_tp'],
			'dip' => $datos['dip'],
			'name' => $datos['name'],
			'email' => $datos['email'],
			'password' => Hash::make($datos['pwd']),
	  ]);
	  return response()->json($user, 200);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\User $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
      $usuario->delete();
		$usuario['success'] = true;
		$usuario['msg'] = 'Usuario elminado.';
		return response()->json($usuario, 200);
    }
}
