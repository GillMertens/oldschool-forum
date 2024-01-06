<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $topics = Topic::paginate(20);

        if ($request->ajax()) {
            return [
                'topics' => View::make('topics.partials.index', ['topics' => $topics])->render(),
                'next_page' => $topics->nextPageUrl()
            ];
        }

        return view('dashboard', ['topics' => $topics]);
    }
}
