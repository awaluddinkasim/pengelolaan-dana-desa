<?php

namespace App\Http\Controllers;

use App\Models\APBD;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class APBDController extends Controller
{
    public function index(): View
    {
        return view('pages.apbd.index', [
            'daftarAPBD' => APBD::orderBy('tanggal_perdes', 'desc')->get()
        ]);
    }

    public function create(): View
    {
        return view('pages.apbd.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'tahun' => 'required',
            'nomor_perdes' => 'required',
            'tanggal_perdes' => 'required|date',
            'total_pendapatan' => 'required|integer',
            'total_belanja' => 'required|integer',
            'total_pembiayaan' => 'required|integer',
        ]);

        APBD::create($data);

        return to_route('apbd.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(APBD $apbd): View
    {
        return view('pages.apbd.edit', compact('apbd'));
    }

    public function update(Request $request, APBD $apbd): RedirectResponse
    {
        $data = $request->validate([
            'tahun' => 'required',
            'nomor_perdes' => 'required',
            'tanggal_perdes' => 'required|date',
            'total_pendapatan' => 'required|integer',
            'total_belanja' => 'required|integer',
            'total_pembiayaan' => 'required|integer',
        ]);

        $apbd->update($data);

        return to_route('apbd.index')->with('success', 'Data berhasil disimpan');
    }

    public function destroy(APBD $apbd): RedirectResponse
    {
        $apbd->delete();

        return to_route('apbd.index')->with('success', 'Data berhasil dihapus');
    }
}
