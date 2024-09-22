<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,ListItem $listItem)
    {
        //dd($listItem);
        $request->validate([
            'content' => 'required|string|max:255',
        ]);
        $comment = new Comment($request->only(['content']));
        $comment->user_id = Auth::user()->id;
        $comment->list_item_id = $listItem->id;
        $comment->save();

        
        return redirect()->route('list-items.index')->with('success', 'リストアイテムが登録されました。');
//        $comment = Comment::create([
//            'content' => $request->input('content'),
//            'list_item_id' => $listItemId,
//            'user_id' => auth()->id(),
//        ]);

        //return back()->with('success', 'コメントが追加されました。');
    }
}
