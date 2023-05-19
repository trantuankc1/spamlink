<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $links = ShortLink::latest()->paginate(20);

        return view('links.index', compact('links'));
    }

    public function create()
    {
        return view('links.create');
    }

    public function edit($id)
    {
        $link = ShortLink::query()->where('id', $id)->first();

        return view('links.edit', compact('link'));
    }

    public function update(Request $request, $id)
    {
        $user = ShortLink::find($id);
        $user->original_url = $request->input('original_url');
        $user->save();

        return redirect()->route('links.index');
    }

    public function delete($id)
    {
        ShortLink::query()->where('id', $id)->delete();

        return back();
    }
}
