<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax() ){
            $collection = Borrow::paginate(10);
            return view('pages.borrow.list',compact('collection'));
        }
        return view('pages.borrow.main');
    }
}
