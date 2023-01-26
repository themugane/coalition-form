<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function index() {
        return view('form');
    }
    public function submitForm(Request $request) {
        // return $request->all();

        Storage::disk('public')->append('data.json', json_encode($request->all()));
    }
}
