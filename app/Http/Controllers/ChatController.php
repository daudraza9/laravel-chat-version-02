<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use ChatType;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function index(Request $request)
    {
        $users = User::select('id', 'name')->get();
        return view('dashboard', compact('users'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->chat_type == ChatType::PERSONAL_CHAT) {
            $user = User::findOrFail($request->user);
            $chat = Chat::create([
                'name' => $user->id,
                'type' => $request->chat_type
            ]);
            $chat->users()->attach($chat);
            return response()->json(['status' => true, 'message' => 'Chat Created successfully']);
        } elseif ($request->chat_type == ChatType::GROUP_CHAT) {

        } else {

        }
    }
}
