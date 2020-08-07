<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('back.page.index', compact('pages'));
    }

    public function orders(Request $request)
    {
        foreach ($request->get('page') as $order => $id) {
            Page::where('id', $id)->update(['order' => $order]);
        }
    }

    public function create()
    {
        return view('back.page.create');
    }

    public function store(Request $request)
    {
        $isExistpage = Page::where(['slug' => str_slug($request->title)])->first();
        if ($isExistpage) {
            toastr()->error($request->title . ' Sayfası mevcuttur.');
            return redirect()->back();
        }

        $request->validate([
            'title' => 'min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $page = new Page;
        $page->title = $request->title;
        $page->description = $request->description;
        $page->order = $request->order;
        $page->slug = str_slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = str_slug($request->title) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/sayfa/'), $imageName);
            $page->image = $imageName;
        }
        $page->save();
        toastr()->success('Basarili', 'Sayfa Basariyla Olusturuldu.');
        return redirect()->route('admin.sayfa.index');
    }

    public function show($id)
    {
        return $id;
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('back.page.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $isTitle = Page::where(['title' => $request->title])->whereNotIn('id', [$id])->first();
        $isSlug = Page::where(['slug' => str_slug($request->slug)])->whereNotIn('id', [$id])->first();
        if ($isTitle) {
            toastr()->error($request->title . ' Sayfası mevcuttur.');
            return redirect()->back();
        }
        if ($isSlug) {
            toastr()->error($request->slug . ' slug alanı mevcuttur.');
            return redirect()->back();
        }

        $request->validate([
            'title' => 'min:3',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $page = Page::findOrFail($id);
        $page->title = $request->title;
        $page->order = $request->order;
        $page->description = $request->description;
        $page->slug = str_slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = str_slug($request->title) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/sayfa/'), $imageName);
            $page->image = $imageName;
        }
        $page->save();
        toastr()->success('Sayfa basariyla guncellendi.');
        return redirect()->route('admin.sayfa.index');
    }

    public function switch(Request $request)
    {
        $page = Page::findOrFail($request->id);
        $page->status = $request->statu == 'true' ? 1 : 0;
        $page->save();
    }

    public function delete($id)
    {
        $page = Page::find($id);;
        $page->delete();
        toastr()->success('Kayit Silinenlere basariyla tasindi.');
        return redirect()->route('admin.sayfa.index');
    }

    public function trashed()
    {
        $pages = Page::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return view('back.page.trashed', compact('pages'));
    }

    public function recycle($id)
    {
        $page = Page::onlyTrashed()->find($id);
        $page->restore();
        toastr()->success($page->title . ' sayfası basariyla kurtarildi.');
        return redirect()->back();
    }

    public function hardDelete($id)
    {
        $page = Page::onlyTrashed()->find($id);
        if (File::exists('uploads/sayfa/' . $page->image)) {
            File::delete(public_path('uploads/sayfa/' . $page->image));
        }
        $page->forceDelete();
        toastr()->success('Sayfası basariyla silindi.');
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
