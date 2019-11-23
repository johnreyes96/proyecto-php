<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PermissionRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach ($request->session()->get('RoutesRole') as $key) {
            // Obtener la ruta actual y comparar sí el rol del usuario tiene autorización
            if (\Route::current()->getName() == $key->routeName) {
                return $next($request);
            }
        }
        // En caso contrario retonar la ruta de acceso denegado.
        return redirect()->route('danied.index');

    }
}
