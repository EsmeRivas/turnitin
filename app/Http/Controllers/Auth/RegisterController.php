<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\User;
use App\Models\Rol;
use App\Models\CtgArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Procesar el registro de un nuevo usuario
    public function register(Request $request)
    {
        // Validar los datos del formulario con reglas de validación
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rol_id' => ['required', 'integer'],
            'ctg_area_id' => ['required', 'integer'],
            'nombre' => ['required', 'string', 'max:255'], // Validación para el nombre de la persona
            'apellido1' => ['required', 'string', 'max:255'], // Validación para el primer apellido de la persona
            'apellido2' => ['required', 'string', 'max:255'], // Validación para el segundo apellido de la persona
            'es_fisica' => ['required', 'boolean'], // Validación para el campo es_fisica
        ]);

        // Crear una nueva instancia de persona con los datos proporcionados
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido1 = $request->apellido1;
        $persona->apellido2 = $request->apellido2;
        $persona->es_fisica = $request->es_fisica;
        $persona->save();

        // Crear una nueva instancia de usuario con los datos proporcionados
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->rol_id = $request->rol_id;
        $user->ctg_area_id = $request->ctg_area_id;
        $user->persona_id = $persona->id; // Asignar el id de la persona creada al usuario
        $user->save();

        // Redirigir al usuario a alguna página después del registro
        return redirect('/')->with('success', '¡Registro exitoso!');
    }

    // Método para mostrar el formulario de registro
    public function showRegistrationForm()
    {
        // Obtener todos los roles de la base de datos
        $roles = Rol::all();
        $areas = CtgArea::all();
        
        // Pasar los roles a la vista del formulario de registro
        return view('auth.register', ['roles' => $roles, 'areas' => $areas]);
    }
}
