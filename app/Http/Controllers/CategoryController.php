<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    public function show($name, Request $request)
    {
        $category = Category::where('name', $name)->firstOrFail();

        $topics = Topic::where('category_id', $category->id)
            ->with('user', 'category', 'reactions')
            ->withCount('comments')
            ->latest()
            ->paginate(20);

        if ($request->ajax()) {
            if ($request->has('category_id') && $request->category_id) {
                $topics->where('category_id', $request->category_id);
            }

            if ($topics->isEmpty()) {
                return [
                    'topics' => 'No more topics to load.',
                    'next_page' => null
                ];
            }

            return [
                'topics' => View::make('topics.partials.index', ['topics' => $topics])->render(),
                'next_page' => $topics->nextPageUrl()
            ];
        }

        return view('categories.show', ['category' => $category, 'topics' => $topics]);
    }
}
