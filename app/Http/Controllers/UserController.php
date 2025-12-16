<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home.index');
    }

    public function sampah($kategori)
    {
        if ($kategori === 'organik') {
            return view('user.home.organik');

        } elseif ($kategori === 'anorganik') {
            return view('user.home.anorganik');
            
        } elseif ($kategori === 'b3') {
            return view('user.home.b3');
        } else {
            return abort(404);
        }
    }
}
