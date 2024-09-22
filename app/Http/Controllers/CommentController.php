<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ListItem;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $listItemId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = Comment::create([
            'content' => $request->input('content'),
            'list_item_id' => $listItemId,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'コメントが追加されました。');
    }
}
