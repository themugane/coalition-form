<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index() {
        return view('form');
    }
    public function submitForm(Request $request) {
        return $request->all();
    }
}
