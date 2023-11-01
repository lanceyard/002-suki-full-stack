<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Custom;

class CustomController extends Controller
{
    public function index(Request $request){
        $keyword = $request->keyword;

        $custom = Custom::with('transactions')
                    ->where('status', $keyword)
                    ->orWhere('name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('jenis_custom', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('bahan', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('dp', 'LIKE', '%'.$keyword.'%')
                    ->sortable()
                    ->paginate(15);
        return view('dashboard.custom', ['customList' => $custom]);
    }
}
