<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

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

        $user = $credentials['username'];
        $password = $credentials['password'];
        $query = "select case when count(*) > 0 then true else false end as credencialesCorrectas
                from users usr 
                where usr.username = ? 
                and usr.password = ?";

        $result = DB::select($query, [$user, $password]);
        
        if ($result[0]->credencialescorrectas) {
            
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
