<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        $user = \App\User::where('email', $request->email)->first();
        if ($user != null) {
            $value = [
                'id' => $user->id,
                'name' => $user->name
            ];
            if ($user->role == 'admin') {
                $request->session()->put('user', $value);
                return redirect('admin');
            } elseif ($user->role == 'user') {
                $request->session()->put('user', $value);
                return redirect('user');
            }
        }
        return $next($request);
    }
}
