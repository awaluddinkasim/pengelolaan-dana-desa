<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use App\Traits\HandleFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublikasiController extends Controller
{
    use HandleFile;

    public function index(): View
    {
        return view('pages.publikasi.index', [
            'daftarPublikasi' => Publikasi::orderBy('tanggal_publikasi', 'desc')->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'judul' => 'required',
            'jenis_publikasi' => 'required',
            'tahun_anggaran' => 'required|numeric',
            'deskripsi' => 'required',
            'tanggal_publikasi' => 'required|date',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $data['file'] = $this->uploadFile($request->file('file'), 'files/');

        Publikasi::create($data);

        return redirect()->route('publikasi.index')->with('success', 'Publikasi berhasil ditambahkan');
    }

    public function destroy(Publikasi $publikasi): RedirectResponse
    {
        $this->deleteFile('files/' . $publikasi->file);

        $publikasi->delete();

        return redirect()->route('publikasi.index')->with('success', 'Publikasi berhasil dihapus');
    }
}
