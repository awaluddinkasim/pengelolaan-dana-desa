<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function publikasi(): View

    {
        return view('publikasi', [
            'daftarPublikasi' => Publikasi::orderBy('tanggal_publikasi', 'desc')->get()
        ]);
    }
}
