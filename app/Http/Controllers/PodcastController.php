<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PodcastController extends Controller
{
    public function view(){
        $categoria = DB::table('categorias')->get();
        return view('podcast/categorias', compact('categoria'));
    }
}
