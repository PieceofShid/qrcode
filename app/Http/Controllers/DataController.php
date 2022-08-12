<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DataController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function generate(Request $request)
    {
        return view('qrcode')->with([
            'result' => $request->result,
            'slice' => $request->slice
        ]);
    }
}
