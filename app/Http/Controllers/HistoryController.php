<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    // Tampilkan semua history
    public function index()
    {
        $histories = History::all();
        return view('history.index', compact('histories'));
    }

    // Simpan history baru
    public function store(Request $request)
    {
        History::add($request->activity, $request->permohonan_id);
        return redirect()->back()->with('success', 'History berhasil ditambahkan!');
    }
}
