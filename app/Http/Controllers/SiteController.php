<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;

class SiteController extends Controller
{
    public function showSite()
    {
        // Mengambil data dari tabel `sites`
        $site = Site::first();

        // Mengirim data ke view
        return view('home', compact('site'));
    }

    public function showPendaftaran()
    {
        $site = Site::first(); // Mengambil data dari model Site
        return view('pendaftaran', compact('site')); // Mengirim data ke tampilan pendaftaran
    }
    public function showData()
    {
        $site = Site::first(); // Mengambil data dari model Site
        return view('data', compact('site')); // Mengirim data ke tampilan pendaftaran
    }
}
