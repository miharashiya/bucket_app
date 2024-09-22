<?php

namespace App\Http\Controllers;

use App\Models\User; // ここを追加
use App\Models\ListItem; // ListItemモデルもインポートする
use Illuminate\Http\Request;


class ListItemController extends Controller
{
    // 一覧表示
    public function index()
    {
    $items = ListItem::all();


        //$userId = auth()->id(); // 現在のユーザーのIDを取得
//$items = ListItem::where('user_id', $userId)->get(); // ユーザーIDでフィルタリング
        //dd($items);
        return view('list-items.index', compact('items'));
    }

    // 登録画面表示
    public function create()
    {
        // 登録画面用のビューを返す
        return view('list-items.create');
    }

    // 登録処理
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $item = ListItem::create($request->only(['text', 'user_id']));
        return redirect()->route('list-items.index')->with('success', 'リストアイテムが登録されました。');
    }

    // 編集画面表示
    public function edit($id)
    {
        $item = ListItem::findOrFail($id);
        // 編集画面用のビューを返す
        return view('list-items.edit', compact('item'));
    }

    // 編集処理
    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $item = ListItem::findOrFail($id);
        $item->update($request->only(['text', 'user_id']));
        return response()->json($item);
    }

    // 他のユーザーのTodoリスト表示
    public function showUserListItems(User $user)
    {
        // 他のユーザーのリストアイテムを取得
        $items = $user->listItems; // Userモデルで定義したリレーションを使用
        
        //dd($user);
        return view('list-items.user', compact('user', 'items'));
    }

    public function show($id){
        $listitem = ListItem::find($id);
        return view('list-items.show', compact('listitem'));
    }

    // 削除
    public function destroy($id)
    {
        $item = ListItem::findOrFail($id);
        $item->delete();
        return response()->json(null, 204);
    }

    // ゴミ箱表示
    public function trash()
    {
        $trashedItems = ListItem::onlyTrashed()->where('user_id', auth()->id())->get(); // 現在のユーザーのトラッシュアイテムを取得
        return view('list-items.trash', compact('trashedItems'));
    }

    // アイテムの復元
    public function restore($id)
    {
        $item = ListItem::onlyTrashed()->findOrFail($id);
        $item->restore(); // ソフトデリートされたアイテムを復元
        return redirect()->route('trash.index')->with('success', 'リストアイテムが復元されました。');
    }
}
