<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Lang lo estabezco con uno de estos valores:
        //Si tengo en variable de sesion llamada lang
        // Si no le dejo el valor que tenga en el fichero de configuración
        info (session()->all());
        $lang = session()->get('lang')?? config('app.locale');
        info ("Seleccionado el idioma: $lang");
        //Modifico la variable de mi app global LOCALLE
        app()->setLocale($lang);

        return $next($request);
    }
}
