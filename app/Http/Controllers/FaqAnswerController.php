<?php

namespace App\Http\Controllers;

use App\Models\FaqAnswer;
use Illuminate\Http\Request;

class FaqAnswerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'faq_id' => 'required|exists:faq,id',
            'answer' => 'required',
        ]);

        FaqAnswer::create($request->all());

        return back();
    }
}
