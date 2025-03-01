<?php

namespace App\Http\Controllers;

use App\Models\APBD;
use App\Models\PenerimaanDana;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PenerimaanDanaController extends Controller
{
    public function index(): View
    {
        return view('pages.penerimaan-dana.index', [
            'daftarPenerimaanDana' => PenerimaanDana::orderBy('tanggal_penerimaan', 'desc')->get()
        ]);
    }

    public function create(): View
    {
        return view('pages.penerimaan-dana.create', [
            'daftarAPBD' => APBD::orderBy('tanggal_perdes', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tahun_anggaran' => 'required|numeric',
            'sumber_dana' => 'required',
            'apbd_id' => 'nullable',
            'tanggal_penerimaan' => 'required|date',
            'jumlah' => 'required|integer',
        ]);

        PenerimaanDana::create($data);

        return redirect()->route('penerimaan-dana.index')->with('success', 'Penerimaan Dana berhasil ditambahkan');
    }

    public function edit(PenerimaanDana $penerimaanDana): View
    {
        return view('pages.penerimaan-dana.edit', [
            'penerimaanDana' => $penerimaanDana,
            'daftarAPBD' => APBD::orderBy('tanggal_perdes', 'desc')->get()
        ]);
    }

    public function update(Request $request, PenerimaanDana $penerimaanDana)
    {
        $data = $request->validate([
            'tahun_anggaran' => 'required|numeric',
            'sumber_dana' => 'required',
            'apbd_id' => 'nullable',
            'tanggal_penerimaan' => 'required|date',
            'jumlah' => 'required|integer',
        ]);

        $penerimaanDana->update($data);

        return redirect()->route('penerimaan-dana.index')->with('success', 'Penerimaan Dana berhasil diperbarui');
    }

    public function destroy(PenerimaanDana $penerimaanDana)
    {
        $penerimaanDana->delete();

        return redirect()->route('penerimaan-dana.index')->with('success', 'Penerimaan Dana berhasil dihapus');
    }
}
