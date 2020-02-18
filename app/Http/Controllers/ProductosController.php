<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Rules\Custom_email;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'numeric'],
            'id_proveedor' => ['required', 'numeric', 'exists:proveedor,id'],
            'existencia' => ['required', 'numeric'],
            'cantidad_minima' => ['required', 'numeric', 'digits:10'],
            'cantidad_maxima' => ['required', 'numeric', 'digits:10'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Productos
     */
    protected function create(array $data)
    {
        return Productos::create([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'id_proveedor' => $data['id_proveedor'],
            'existencia' => $data['existencia'],
            'cantidad_minima' => $data['telefono'],
            'cantidad_maxima' => $data['cantidad_maxima']
        ]);
    }

    public function addProducto(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'numeric'],
            'id_proveedor' => ['required', 'numeric', 'exists:proveedor,id'],
            'existencia' => ['required', 'numeric'],
            'cantidad_minima' => ['required', 'numeric', 'digits:10'],
            'cantidad_maxima' => ['required', 'numeric', 'digits:10'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->to('/create_productos')
                ->withErrors($validator->errors())
                ->withInput($request->all());
        }

        $input = request()->all();
        $user=new User($input);
        $user->password=bcrypt(request()->password);
        $user->save();
        return back()->with('success', 'User created successfully.');
    }
}
