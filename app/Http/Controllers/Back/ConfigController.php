<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends Controller
{
    public function index()
    {
        $config = Config::find(1);
        return view('back.config.index', compact('config'));
    }

    public function update(Request $request)
    {
        $config = Config::find(1);
        $config->title = $request->title;
        $config->active = $request->active;
        $config->facebook = $request->facebook;
        $config->twitter = $request->twitter;
        $config->instagram = $request->instagram;
        $config->youtube = $request->youtube;

        if ($request->hasFile('logo')) {
            $logo = str_slug($request->title) . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads/config'), $logo);
            $config->logo = $logo;
        }

        if ($request->hasFile('favicon')) {
            $favicon = str_slug($request->title) . '_fav' . '.' . $request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('uploads/config'), $favicon);
            $config->favicon = $favicon;
        }
        $config->save();
        toastr()->success('Ayarla başarıyla güncellendi.');
        return redirect()->back();

    }
}
