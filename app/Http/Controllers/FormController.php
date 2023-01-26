<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function index() {
        // DEFINITELY NOT THE MOST CONVENTIONAL WAY
        $raw_data = preg_split("/\r\n|\n|\r/", file_get_contents(storage_path() . "/app/public/data.json"));
        $data = [];
        foreach($raw_data as $json_string) {
            array_push($data, json_decode($json_string));
            // return ;
        }
        // return $data;
        return view('form', ["data" => $data]);
    }
    public function submitForm(Request $request) {
        $submit_data = [
            'product_name' => $request->product_name,
            'quantity_in_stock' => $request->quantity_in_stock,
            'price' => $request->price,
            'total_value' => $request->quantity_in_stock * $request->price ?? '',
            'date_submited' => now()
        ];
        Storage::disk('public')->append('data.json', json_encode($submit_data));
        return back()->with('message', "Item Added Succesfully.");
    }
}
