<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function index()
    {
        $links = ShortLink::latest()->paginate(50);

        return view('links.thong-ke', compact('links'));
    }
}
