<?php

namespace App\Http\Controllers;

use App\Models\TinTucModel;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function index()
    {
        $tin_tuc = TinTucModel::select('id', 'tieu_de', 'tom_tat', 'hinh', 'created_at')
            ->orderBy('created_at', 'desc')->get();
        return view('tin_tuc.index', [
            'tin_tuc' => $tin_tuc,
        ]);
    }
}
