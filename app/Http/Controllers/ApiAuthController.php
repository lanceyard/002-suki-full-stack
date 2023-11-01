<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class ApiAuthController extends Controller
{
  //

  public function login(Request $request)
  {
    $formField = $request->validate([
      'username' => 'required',
      'password' => 'required'
    ]);

    if (auth()->attempt($formField)) {
      $user = User::where('username', $formField['username'])->first();
      $token = $user->createToken('suki')->plainTextToken;

      return response([
        'user' => $user,
        'token' => $token
      ], 201);
    } else {

      return response([
        'message' => 'Bad credentials'
      ], 401);
    }
  }

  public function register(Request $request)
  {
    $formField = $request->validate([
      'name' => ['required', 'min:3'],
      'username' => 'required|unique:users,username',
      'phone' => 'required|unique:users,phone|max:13',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|confirmed|min:6'
    ]);

    // bcrypt
    $formField['password'] = bcrypt($formField['password']);

    $user = User::create($formField);
    $token = $user->createToken('suki')->plainTextToken;

    $new = Transaction::create([
      'user_id' => $user->id,
    ]);
    Transaction::create([
      'user_id' => $user->id,
      'categories' => "Custom"
    ]);

    return response([
      'user' => $user,
      'token' => $token,
      'cart' => $new
    ], 201);
  }

  public function update(Request $request)
  {
    $user = auth()->user();

    $request->validate([
      'name' => 'min:3',
      'phone' => 'unique:users,phone|max:13',
      'email' => 'email|unique:users,email',
    ]);

    if ($request->name) {
      $user->name = $request->name;
    }
    if ($request->phone) {
      $user->phone = $request->phone;
    }
    if ($request->email) {
      $user->email = $request->email;
    }
    if ($request->alamat) {
      $user->address = $request->alamat;
    }
    $user->update();

    return response([
      'user' => $user,
      'token' => $request->bearerToken(),
    ]);
  }

  public function upload(Request $request)
  {
    $user = auth()->user();
    if ($request->image) {
      File::delete(storage_path('app/public/' . $user->image));
      $user->image = $request->image->store('avatar', 'public');
    }
    $user->update();

    return response([
      'user' => $user,
      'token' => $request->bearerToken(),
    ]);
  }

  public function logout(Request $request)
  {
    auth()->user()->tokens()->delete();

    return [
      'message' => 'Logged Out'
    ];
  }

  public function token()
  {
    return ['msg' => 'Token is valid'];
  }
}
