<?php

namespace App\Http\Controllers;

use App\User;
use App\Clases\Empleados;
use App\TipoBaja;
use App\Plantel;
use App\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests;
use Hash;


class AdminController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('super');
	}

	public function index() {
		$datosEmp = Empleado::find(\Auth::user()->empleado_id);
		$plantel = Plantel::find($datosEmp->cct_plantel);
		return view('admin/index', compact('plantel'));
	}

	public function personal() {
		$datosEmp = Empleado::find(\Auth::user()->empleado_id);
		$empleados = new Empleados();
		$tipoBajas = TipoBaja::all();
		return view('admin/personal', ['empleados' => $empleados->getEmpleados($datosEmp->cct_plantel), 'tipos' => $tipoBajas]);
	}

	public function cambiarContraseña()
	{
		$datosEmp = Empleado::find(\Auth::user()->empleado_id);
		$plantel = Plantel::find($datosEmp->cct_plantel);
		$users = User::all();
		return view('admin.cambiarContraseña')
		->with('users', $users)
		->with('plantel', $plantel);
	}

	public function resetearContraseña($id)
	{
		$datosEmp = Empleado::find(\Auth::user()->empleado_id);
		$plantel = Plantel::find($datosEmp->cct_plantel);
		$user = User::find($id);
		$empleado = Empleado::find($user->empleado_id);
		return view('admin.resetear')
		->with('user', $user)
		->with('plantel', $plantel)
		->with('empleado', $empleado);
	}

	public function resetear(Request $request)
	{
		  $this->validate($request, ['password' => 'required|string|min:6|confirmed']);
			$user = User::find($request->input('user'));
			$user->password = Hash::make($request->input('password'));
			$user->save();

			return redirect()->back()->withSuccess('Contraseña actualizada exitosamente');
	}
}
