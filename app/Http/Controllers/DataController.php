<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::all();
        return view('welcome', compact('data'));
    }

    public function store(Request $request)
    {
        Data::create($request->only(['name', 'email', 'phone']));

        return back();
    }

    public function generate($id)
    {
        $data = Data::findOrFail($id);
        $qrcode = QrCode::size(300)->generate($data);
        return view('qrcode', compact('qrcode'));
    }
}
