<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Toca;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
            $query = 
            "select *
            from users usr 
            where usr.username = ? 
            and usr.password = ?
			and usr.activo = true;";

            [$userdata] = DB::select($query, [$user, $password]);

            $response = redirect('/');
            $response->cookie(Cookie::make('username', $userdata->username));
            $response->cookie(Cookie::make('id_user', $userdata->id));
            
            return $response;
        }

        // Authentication failed
        return redirect()->route('login')->with(['error' => 'Usuario o Contraseña Incorrectos']);
    }
    // Método para redirigir después del inicio de sesión
    protected function redirectTo()
    {
        return '/'; 
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        $response = redirect('/login');
        $response->withCookie(Cookie::forget('username'));
        return $response; // Redirige a la página principal después del logout
    }
    
}
