<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class kategoriController extends Controller
{
 public function index(){
    return view('kategori/datakategori',["judul" => "Halaman Kategori","kategori"=>Kategori::all()]);
 }
}
