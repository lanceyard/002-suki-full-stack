<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB; 
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\File; 
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;

class UserController extends Controller
{
  public function index(Request $request){
    $keyword = $request->keyword;

    $user = User::with('roles')
              ->where(function ($query) use($keyword){
                $query
                  ->where('name', 'LIKE', '%'.$keyword.'%')
                  ->orWhere('phone', 'LIKE', '%'.$keyword.'%')
                  ->orWhere('username', 'LIKE', '%'.$keyword.'%')
                  ->orWhere('address', 'LIKE', '%'.$keyword.'%')
                  ->orWhere('email', 'LIKE', '%'.$keyword.'%');
              })
              ->whereHas('roles', function($query) use($keyword){
                $query->where('name', 'User');
              })
              ->sortable()
              ->paginate(15);
    return view('dashboard.user', ['userList' => $user]);
  }

  public function profile(UserUpdateRequest $request, $id){
    $user = User::findOrFail($id);

    if($request->image){
      File::delete(storage_path('app/public/' . User::find($id)->image));
      $user->image = $request->image->store('user_image', 'public');
    }

    $user->name = $request->name;
    $user->phone = $request->phone;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->address = $request->address;
    $user->update();
    if($user){
      Session::flash('status','success');
      Session::flash('message', 'update data profile sukses!');
    }
    return back();
  }

  public function pdf()
  {
    $user = User::with('roles')
              ->whereHas('roles', function($query){
                $query->where('name', 'User');
              })
              ->sortable()
              ->paginate(15);

    view()->share(['userList' => $user]);
    $pdf = PDF::loadview('dashboard.pdfuser')->setPaper('a4', 'landscape');
    return $pdf->download('users report ' . date('Y-m-d') . '.pdf');

    return redirect('/user');
  }

  public function excel(){
    return Excel::download(new UserExport(), 
    'users report ' . date('Y-m-d') . '.xlsx');

    return redirect('/user');
  }
  // public function create() {
  //   return view('users.register');
  // }

  // public function store(Request $request) {
  //   $formField = $request->validate([
  //     'name' => ['required', 'min:3'],
  //     'email' => ['required', 'email', Rule::unique('users', 'email')],
  //     'password' => 'required|confirmed|min:6'
  //   ]);

  //   // bcrypt
  //   $formField['password'] = bcrypt($formField['password']);

  //   $user = User::create($formField);
  //   auth()->login($user);

  //   return redirect('/listings')->with('message', 'User created and logged in');
  // }

  // public function logout(Request $request) {
  //   auth()->logout();

  //   $request->session()->invalidate();
  //   $request->session()->regenerateToken();

  //   return redirect('/login')->with('message', 'You have been logged out');
  // }

  // public function show() {
  //   return view('users.login');
  // }

  // public function authenticate() {
  //   $formField = request()->validate([
  //     'email' => ['required', 'email'],
  //     'password' => 'required'
  //   ]);

  //   if (auth()->attempt($formField)) {
  //     request()->session()->regenerate();

  //     return redirect('/dashboard')->with('message', 'You are now logged in');
  //   }

  //   return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
  // }
}
