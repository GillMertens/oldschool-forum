<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Topic;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Session::has('topic_data')) {
            // If there is, create a new topic with this data
            $topicData = Session::get('topic_data');
            $topic = new Topic;
            $topic->title = $topicData['title'];
            $topic->body = $topicData['body'];
            $topic->category_id = $topicData['category_id'];
            $topic->user_id = Auth::id();
            $topic->save();

            // Remove the topic data from the session
            Session::forget('topic_data');

            // Redirect to the new topic's page
            return redirect()->route('topics.show', $topic);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
