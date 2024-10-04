<?php

namespace App\Http\Middleware;

use App\Models\blog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $blogId = $request->route('id');
        $blog = blog::find($blogId);
        // dd($blog);
        if (!$blog) {
            abort(404);
        }
        if (Auth::check() && Auth::user()->email === $blog->email) {
            return $next($request);
        } else {
            return redirect()->back()->with('error', 'You are not authorized user to perform this action');
        }
    }
}
