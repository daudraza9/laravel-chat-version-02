<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function select2List(Request $request)
    {
        $users = User::select('id', 'name');
        $keyword = $request->name;
        $users = $users->where(function ($users) use ($keyword) {
            $users->where(DB::raw('CONCAT_WS(" ",name)'), 'like', '%' . $keyword . '%');
        });

        return response()->json($users->orderBy('users.id')->paginate(50, ['*'], 'page', $request->page));
    }
}
