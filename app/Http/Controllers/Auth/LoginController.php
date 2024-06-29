<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    // Método para mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }
    // Constructor del controlador
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); // Exceptúa el método 'logout' del middleware de autenticación
    }
    // Método para procesar el inicio de sesión
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            
            return redirect()->intended('/');
        }

        // Authentication failed
        return back()->withErrors(['Datos incorrectos.']);
    }
    // Método para redirigir después del inicio de sesión
    protected function redirectTo()
    {
        return '/'; 
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token de sesión
        return redirect('/login'); // Redirige a la página principal después del logout
    }
    
}
