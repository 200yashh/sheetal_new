<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Str;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (auth()->check()) {
            // Get the currently authenticated user
            $user = auth()->user();

            if (!$user->hasRole(['agent', 'superadmin']) || $user->is_active !== 1) {
                auth()->guard()->logout();
                $request->session()->invalidate();
                return redirect()->route('login')->withErrors(['error' => 'Something went wrong!']);
            }

            $check = true;

            $skipModules = ['admin/login*', 'admin/logout*'];
            foreach ($skipModules as $skip) {
                if ($check) {
                    $check = !$request->is($skip);
                }
            }

            if ($check && $request->isMethod('get') && !$request->ajax()) {
                $path = ($request->path());

                $mainPath = explode('/', $path);
                if (isset($mainPath[1])) {
                    
                    $menu = \Str::slug(strtolower($mainPath[1]), '_');

                    // Get all permissions assigned to the current user's roles
                    $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();

                    if (!in_array('admin.' . $menu . '.view', $userPermissions) && !in_array('admin.' . $menu . '.edit', $userPermissions) && !in_array('admin.' . $menu . '.add', $userPermissions)) {
                        abort(403, 'Unauthorized');
                    }

                    // check view permissions
                    if (!isset($mainPath[2])) {
                        if (!in_array('admin.' . $menu . '.view', $userPermissions)) {
                            abort(403, 'Unauthorized');
                        }
                    }

                    // check create permissions
                    if (isset($mainPath[2]) && $mainPath[2] == "create") {
                        if (!in_array('admin.' . $menu . '.add', $userPermissions)) {
                            abort(403, 'Unauthorized');
                        }
                    }

                    // check edit permissions
                    if (isset($mainPath[3]) && $mainPath[3] == "edit") {
                        if (!in_array('admin.' . $menu . '.edit', $userPermissions)) {
                            abort(403, 'Unauthorized');
                        }
                    }

                    $request->session()->forget('is_view_allowed');
                    $request->session()->forget('is_edit_allowed');
                    $request->session()->forget('is_delete_allowed');
                    $request->session()->forget('is_add_allowed');
                    if (in_array('admin.' . $menu . '.view', $userPermissions)) {
                        $request->session()->put('is_view_allowed', true);
                    }
                    if (in_array('admin.' . $menu . '.edit', $userPermissions)) {
                        $request->session()->put('is_edit_allowed', true);
                    }
                    if (in_array('admin.' . $menu . '.delete', $userPermissions)) {
                        $request->session()->put('is_delete_allowed', true);
                    }
                    if (in_array('admin.' . $menu . '.add', $userPermissions)) {
                        $request->session()->put('is_add_allowed', true);
                    }
                }
            } else {
                $request->session()->put('is_view_allowed', true);
                $request->session()->put('is_edit_allowed', true);
                $request->session()->put('is_delete_allowed', true);
                $request->session()->put('is_add_allowed', true);
            }
        } else {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
