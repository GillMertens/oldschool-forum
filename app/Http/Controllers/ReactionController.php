<?php

namespace App\Http\Controllers;

use App\Models\Reaction;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'emoji_id' => 'required|exists:reaction_emoji,id',
            'reactable_type' => 'required',
            'reactable_id' => 'required',
        ]);

        //Doing it this way because UpdateOrCreate doesn't work with morphTo relationships apparently

        $reaction = Reaction::where('user_id', auth()->id())
            ->where('reactable_type', $request->reactable_type)
            ->where('reactable_id', $request->reactable_id)
            ->first();

        if ($reaction) {
            $reaction->reaction_emoji_id = $request->emoji_id;
            $reaction->save();
        } else {
            // Create new reaction
            $reaction = Reaction::create([
                'reaction_emoji_id' => $request->emoji_id,
                'user_id' => auth()->id(),
                'reactable_type' => $request->reactable_type,
                'reactable_id' => $request->reactable_id,
            ]);
        }

        return back();
    }
}
