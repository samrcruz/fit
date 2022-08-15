<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->age = $request->input('age');
            $user->email = $request->input('email');
            $user->save();
            return view('user')->with(["status" => "ok", "user successfully added"]);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        $user = User::find($request->input('id'))->first();
        if ($user) {
            try {
                $user = new User();
                $user->name = $request->input('name');
                $user->age = $request->input('age');
                $user->email = $request->input('email');
                $user->save();
                return view('user')->with(["status" => "ok", "user successfully updated"]);
            } catch (\Exception $e) {
                Log::debug($e->getMessage());
            }
        } else {
            return view('invalid-user');
        }
    }

    public function delete(Request $request)
    {
        $user = User::find($request->input('id'))->first();
        if ($user) {
            try {
                $user->delete();
                return view('user')->with(["status" => "ok", "user successfully deleted"]);
            } catch (\Exception $e) {
                Log::debug($e->getMessage());
            }
        } else {
            return view('invalid-user');
        }
    }
}
