<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $newsId)
    {
        $request->validate([
            'content' => 'required|string|max:500'
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'news_id' => $newsId,
            'content' => $request->content
        ]);

        return redirect()->back()->with('success', 'Je commentaar is toegevoegd!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (auth()->user()->id === $comment->user_id || auth()->user()->is_admin) {
            $comment->delete();
            return redirect()->back()->with('success', 'Commentaar verwijderd.');
        }

        return redirect()->back()->with('error', 'Je hebt geen toestemming om dit commentaar te verwijderen.');
    }
}
