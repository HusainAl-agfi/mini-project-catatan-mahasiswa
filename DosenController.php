<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return "Ini halaman utama data dosen.";
    }

    public function profil()
    {
        return "Ini halaman profil lengkap dosen.";
    }
}