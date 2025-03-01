<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\APBD;
use App\Models\Publikasi;
use Illuminate\View\View;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\PenerimaanDana;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        $tahunAnggaran = Carbon::now()->year;

        $apbdTahunIni = APBD::where('tahun', $tahunAnggaran)->first();

        $totalPenerimaan = PenerimaanDana::where('tahun_anggaran', $tahunAnggaran)
            ->sum('jumlah');

        $totalPengeluaranQuery = DB::table('pengeluaran')
            ->join('pengeluaran_detail', 'pengeluaran.id', '=', 'pengeluaran_detail.pengeluaran_id')
            ->where('pengeluaran.tahun_anggaran', $tahunAnggaran)
            ->select(DB::raw('SUM(pengeluaran_detail.volume * pengeluaran_detail.harga_satuan) as total'));

        $totalPengeluaran = $totalPengeluaranQuery->value('total') ?? 0;

        $saldoAnggaran = $totalPenerimaan - $totalPengeluaran;

        $penerimaanBySumber = PenerimaanDana::where('tahun_anggaran', $tahunAnggaran)
            ->select('sumber_dana', DB::raw('SUM(jumlah) as total'))
            ->groupBy('sumber_dana')
            ->orderBy('total', 'desc')
            ->get();

        $pengeluaranTerbaru = Pengeluaran::with('details')
            ->where('tahun_anggaran', $tahunAnggaran)
            ->orderBy('tanggal_pengeluaran', 'desc')
            ->limit(5)
            ->get();

        $penerimaanTerbaru = PenerimaanDana::where('tahun_anggaran', $tahunAnggaran)
            ->orderBy('tanggal_penerimaan', 'desc')
            ->limit(5)
            ->get();

        $publikasiTerbaru = Publikasi::where('tahun_anggaran', $tahunAnggaran)
            ->orderBy('tanggal_publikasi', 'desc')
            ->limit(3)
            ->get();

        $publikasiByJenis = Publikasi::where('tahun_anggaran', $tahunAnggaran)
            ->select('jenis_publikasi', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('jenis_publikasi')
            ->get();

        $data = [
            'tahunAnggaran' => $tahunAnggaran,
            'totalPenerimaan' => $totalPenerimaan,
            'totalPengeluaran' => $totalPengeluaran,
            'saldoAnggaran' => $saldoAnggaran,
            'penerimaanBySumber' => $penerimaanBySumber,
            'pengeluaranTerbaru' => $pengeluaranTerbaru,
            'penerimaanTerbaru' => $penerimaanTerbaru,
            'publikasiTerbaru' => $publikasiTerbaru,
            'publikasiByJenis' => $publikasiByJenis,
            'apbdTahunIni' => $apbdTahunIni
        ];

        return view('pages.dashboard', $data);
    }
}
