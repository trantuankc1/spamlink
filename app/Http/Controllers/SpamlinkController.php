<?php

namespace App\Http\Controllers;

use App\Http\Requests\spamLinkRequest;
use App\Models\UserTraffic;
use Illuminate\Http\Request;

class SpamlinkController extends Controller
{
    public function index($perpage = 20)
    {
        $infors = UserTraffic::query()->orderByDesc('id')->paginate($perpage);

        return view('admin.index', compact('infors'));
    }

    public function click($id)
    {
        $link = UserTraffic::find($id);
        $link->click_count++;
        $link->save();

        return redirect($link->target_link);
    }


    public function create()
    {
        return view('admin.add');
    }

    public function store(spamLinkRequest $request)
    {
        $linkspam = new UserTraffic();
        $linkspam->spam_link = base64_encode(date('ymdHis') . $request->input('spam_link'));
        $linkspam->save();

        return redirect()->route('index');
    }

    public function delete($id)
    {
        UserTraffic::query()->where('id', $id)->delete();

        return back()->with('success', 'delete suscess');
    }

    public function edit($id)
    {
        $link = UserTraffic::query()->where('id', $id)->first();

        return view('admin.edit', compact('link'));
    }

    public function update(Request $request, $id)
    {
        $user = UserTraffic::find($id);
        $user->target_link = $request->input('target_link');
        $user->save();

        return redirect()->route('index');
    }
}
