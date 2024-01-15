<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->check()) {
            if (auth()->user()->roles->contains('name', 'admin')) {
                $users = User::all();
                return view('dashboard.admin', ['users' => $users]);
            }
        }

        $topics = Topic::paginate(20);

        if ($request->ajax()) {
            return [
                'topics' => View::make('topics.partials.index', ['topics' => $topics])->render(),
                'next_page' => $topics->nextPageUrl()
            ];
        }

        return view('dashboard.user', ['topics' => $topics]);
    }

    public function toggleAdmin($userId)
    {
        $user = User::findOrFail($userId);
        $adminRole = Role::where('name', 'admin')->first();

        if ($user->roles->contains($adminRole)) {
            // User is already an admin, so remove the admin role
            $user->roles()->detach($adminRole);
        } else {
            // User is not an admin, so add the admin role
            $user->roles()->attach($adminRole);
        }

        return back();
    }
}
