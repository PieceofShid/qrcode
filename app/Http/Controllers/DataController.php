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

    public function store(Request $request)
    {
        return back();
    }

    public function generate($id)
    {
        return back();
    }
}
