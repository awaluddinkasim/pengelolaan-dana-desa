<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengeluaranController extends Controller
{
    public function index(): View
    {
        return view('pages.pengeluaran.index', [
            'daftarPengeluaran' => Pengeluaran::orderBy('tanggal_pengeluaran', 'desc')->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'tahun_anggaran' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date',
            'penerima' => 'required',
            'keterangan' => 'required',
        ]);

        Pengeluaran::create($data);

        return to_route('pengeluaran.index')->with('success', 'Pengeluaran berhasil ditambahkan');
    }

    public function destroy(Pengeluaran $pengeluaran): RedirectResponse
    {
        $pengeluaran->delete();

        return to_route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus');
    }
}
