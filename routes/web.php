<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\H2PDashboardController;
use App\Http\Controllers\H2PController;
use App\Http\Controllers\ArsipController;
use App\Models\Arsip;
use App\Http\Controllers\LoketDashboardController;
use App\Http\Controllers\Kepala\KinerjaController;
use App\Http\Controllers\Kepala\kepalaHistoryController;



/*
|--------------------------------------------------------------------------
| LOGIN (GUEST)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', function (Request $request) {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            $request->session()->regenerate();

            $role = Auth::user()->role;

            if ($role == 'kepala') {
                return redirect()->route('kepala.monitoring');
            }

            if ($role == 'loket') {
                return redirect()->route('loket.dashboard');
            }

            if ($role == 'h2p') {
                return redirect()->route('h2p.dashboard');
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'message' => 'Email atau password salah!'
        ]);
    })->name('login.process');
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/kepala/monitoring', function () {
        return view('kepala.monitoring');
    })->name('kepala.monitoring');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('permohonan', PermohonanController::class);

    Route::post(
        '/permohonan/{id}/kirim-h2p',
        [PermohonanController::class, 'kirimH2P']
    )->name('permohonan.kirimH2P');

    Route::get('/history', [HistoryController::class, 'index'])
        ->name('history.index');

    // =====================
    // KEPALA - KINERJA
    // =====================
    Route::get('/kepala/kinerja/loket', function () {
        return view('kepala.kinerja.loket');
    })->name('kepala.kinerja.loket');

    Route::get('/kepala/kinerja/h2p', function () {
        return view('kepala.kinerja.h2p');
    })->name('kepala.kinerja.h2p');


    /*
    |----------------------------------------------------------------------
    | LOKET
    |----------------------------------------------------------------------
    */
    Route::get('/loket/dashboard', [LoketDashboardController::class, 'index'])
        ->name('loket.dashboard');

    Route::get('/loket/selesai', [LoketDashboardController::class, 'selesai'])
        ->name('loket.selesai');

    /*
    |----------------------------------------------------------------------
    | H2P
    |----------------------------------------------------------------------
    */
    Route::get('/h2p/dashboard', [H2PDashboardController::class, 'index'])
        ->name('h2p.dashboard');

    // Tombol header "Ambil Data Arsip"
    Route::get('/h2p/ambil-arsip', [H2PController::class, 'ambilArsip'])
        ->name('h2p.ambil-arsip');

    /*
    |----------------------------------------------------------------------
    | ARSIP DASHBOARD
    |----------------------------------------------------------------------
    */
    Route::get('/arsip/dashboard', [ArsipController::class, 'dashboard'])
        ->name('arsip.dashboard');

    /*
    |----------------------------------------------------------------------
    | H2P → AJUKAN PERMINTAAN ARSIP
    |----------------------------------------------------------------------
    */
    Route::post('/arsip/request/{id}', function ($id) {

        $permohonan = \App\Models\Permohonan::findOrFail($id);

        $permohonan->update([
            'status' => 'Menunggu Arsip'
        ]);

        \App\Models\History::create([
            'permohonan_id' => $permohonan->id,
            'status_lama'   => 'H2P',
            'status_baru'   => 'Menunggu Arsip',
            'keterangan'    => 'H2P mengajukan permintaan arsip'
        ]);

        return back()->with('success', 'Permintaan arsip berhasil dikirim ke bagian arsip');
    })->name('arsip.request');

    /*
|--------------------------------------------------------------------------
| H2P - PROSES BERKAS
|--------------------------------------------------------------------------
*/

    // halaman proses H2P
    Route::get('/h2p/proses/{id}', function ($id) {
        $permohonan = \App\Models\Permohonan::findOrFail($id);
        return view('h2p.proses', compact('permohonan'));
    })->name('h2p.proses');

    // kirim ke loket
    Route::post('/h2p/kirim-loket/{id}', function (Request $request, $id) {

        $request->validate([
            'jenis_proses' => 'required'
        ]);

        $permohonan = \App\Models\Permohonan::findOrFail($id);

        $permohonan->update([
            'status'        => 'Selesai',
            'jenis_proses'  => $request->jenis_proses
        ]);

        \App\Models\History::create([
            'permohonan_id' => $permohonan->id,
            'status_lama'   => 'H2P',
            'status_baru'   => 'Selesai',
            'keterangan'    => 'Berkas diproses H2P dan diselesaikan oleh Loket (' . $request->jenis_proses . ')'
        ]);

        return redirect()->route('loket.dashboard')
            ->with('success', 'Berkas berhasil dikirim ke Loket');
    })->name('h2p.kirim-loket');


    /*
    |----------------------------------------------------------------------
    | ARSIP → IZINKAN / TOLAK
    |----------------------------------------------------------------------
    */
    Route::post('/arsip/izinkan/{id}', function ($id) {

        $permohonan = \App\Models\Permohonan::findOrFail($id);

        $permohonan->update([
            'status' => 'Disetujui Arsip'
        ]);

        \App\Models\History::create([
            'permohonan_id' => $permohonan->id,
            'status_lama'   => 'Menunggu Arsip',
            'status_baru'   => 'Disetujui Arsip',
            'keterangan'    => 'Arsip mengizinkan berkas'
        ]);

        return back()->with('success', 'Permintaan arsip disetujui');
    })->name('arsip.izinkan');

    Route::post('/arsip/tolak/{id}', function ($id) {

        $permohonan = \App\Models\Permohonan::findOrFail($id);

        $permohonan->update([
            'status' => 'Ditolak Arsip'
        ]);

        \App\Models\History::create([
            'permohonan_id' => $permohonan->id,
            'status_lama'   => 'Menunggu Arsip',
            'status_baru'   => 'Ditolak Arsip',
            'keterangan'    => 'Arsip menolak permintaan'
        ]);

        return back()->with('success', 'Permintaan arsip ditolak');
    })->name('arsip.tolak');

    Route::post('/arsip/simpan', function (Request $request) {

        Arsip::create([
            'jenis_arsip'  => $request->jenis_arsip,
            'no_arsip'     => $request->no_arsip,
            'nama_pemohon' => $request->nama_pemohon,
            'keterangan'   => $request->keterangan,
            'status'       => $request->status,
        ]);

        return back()->with('success', 'Arsip berhasil disimpan');
    })->name('arsip.simpan')->middleware('auth');
});

/*
|--------------------------------------------------------------------------
| DEFAULT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/kepala/kinerja', function () {
    return view('kepala.kinerja.index');
})->name('kepala.kinerja');

Route::middleware(['auth'])->prefix('kepala')->group(function () {

    Route::get('/kinerja', [KinerjaController::class, 'index'])
        ->name('kepala.kinerja');

    Route::get('/kinerja/loket', [KinerjaController::class, 'loket'])
        ->name('kepala.kinerja.loket');

    Route::get('/kinerja/h2p', [KinerjaController::class, 'h2p'])
        ->name('kepala.kinerja.h2p');
    Route::get('/history', [HistoryController::class, 'index'])
    ->name('kepala.history');
    
});
Route::get('/kepala/print-laporan', function () {

    $totalMasuk   = \App\Models\Permohonan::count();
    $selesai      = \App\Models\Permohonan::where('status', 'Selesai')->count();
    $proses       = \App\Models\Permohonan::where('status', '!=', 'Selesai')->count();

    return view('kepala.print', compact(
        'totalMasuk',
        'selesai',
        'proses'
    ));

})->name('kepala.print');

