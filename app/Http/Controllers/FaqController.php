<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('faqAnswers')->get();

        if (auth()->user() && auth()->user()->hasRole('admin')) {
            return view('faq.admin', ['faqs' => $faqs]);
        }
        return view('faq.index', ['faqs' => $faqs]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'question' => 'required',
        ]);

        $faq = Faq::create($request->all());

        return redirect()->route('faq.index');
    }
}
