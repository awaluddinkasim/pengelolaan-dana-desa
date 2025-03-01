<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\PengeluaranDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengeluaranDetailController extends Controller
{
    public function index(Pengeluaran $pengeluaran): View
    {
        return view('pages.pengeluaran.show', [
            'pengeluaran' => $pengeluaran,
            'daftarPengeluaranItem' => $pengeluaran->details
        ]);
    }

    public function store(Request $request, Pengeluaran $pengeluaran): RedirectResponse
    {
        $data = $request->validate([
            'uraian' => 'required',
            'volume' => 'required|integer',
            'satuan' => 'required',
            'harga_satuan' => 'required|integer',
        ]);

        $data['pengeluaran_id'] = $pengeluaran->id;

        PengeluaranDetail::create($data);

        return redirect()->route('pengeluaran-detail.index', $pengeluaran);
    }

    public function destroy(Pengeluaran $pengeluaran, PengeluaranDetail $pengeluaranDetail): RedirectResponse
    {
        $pengeluaranDetail->delete();

        return redirect()->route('pengeluaran-detail.index', $pengeluaran);
    }
}
