<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('back.category.index', compact('categories'));
    }

    public function create()
    {
        return view('back.category.create');
    }

    public function store(Request $request)
    {
        $isExistCategory = Category::where(['slug' => str_slug($request->name)])->first();
        if ($isExistCategory) {
            toastr()->error($request->name . ' Kategorisi mevcuttur.');
            return redirect()->back();
        }

        $request->validate([
            'name' => 'min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->color = $request->color;
        $category->slug = str_slug($request->name);

        if ($request->hasFile('image')) {
            $imageName = str_slug($request->name) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/kategori/'), $imageName);
            $category->image = $imageName;
        }
        $category->save();
        toastr()->success('Basarili', 'Kategori Basariyla Olusturuldu.');
        return redirect()->route('admin.kategori.index');
    }

    public function show($id)
    {
        return $id;
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('back.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $isName = Category::where(['name' => $request->name])->whereNotIn('id', [$id])->first();
        $isSlug = Category::where(['slug' => str_slug($request->slug)])->whereNotIn('id', [$id])->first();
        if ($isName) {
            toastr()->error($request->name . ' Kategorisi mevcuttur.');
            return redirect()->back();
        }
        if ($isSlug) {
            toastr()->error($request->slug . ' slug alanı mevcuttur.');
            return redirect()->back();
        }

        $request->validate([
            'name' => 'min:3',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->color = $request->color;
        $category->slug = str_slug($request->name);

        if ($request->hasFile('image')) {
            $imageName = str_slug($request->name) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/kategori/'), $imageName);
            $category->image = $imageName;
        }
        $category->save();
        toastr()->success('Kategori basariyla guncellendi.');
        return redirect()->route('admin.kategori.index');
    }

    public function switch(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $request->statu == 'true' ? 1 : 0;
        $category->save();
    }

    public function delete($id)
    {
        $category = Category::find($id);;
        if ($id == 1) {
            toastr()->info('Bu kategori sabittir.', $category->name . ' Kategorisi Silinemez.');
            return redirect()->route('admin.kategori.index');
        }
        $category->delete();
        toastr()->success('Kayit Silinenlere basariyla tasindi.');
        return redirect()->route('admin.kategori.index');
    }

    public function trashed()
    {
        $categories = Category::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return view('back.category.trashed', compact('categories'));
    }

    public function recycle($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->restore();
        toastr()->success($category->name . ' kategorisi basariyla kurtarildi.');
        return redirect()->back();
    }

    public function hardDelete($id)
    {
        $category_base = Category::where('id', 1)->get()->first();
        $category = Category::onlyTrashed()->find($id);

        $article_count = $category->articleCount();

        if ($article_count > 0) {
            Article::where(['category_id' => $category->id])->update(['category_id' => 1]);
            toastr()->success('Kategoriye ait ' . $article_count . ' makale ' . $category_base->name . ' kategorisine aktarılmıştır.', 'Kategori basariyla silindi.');
        } else {
            toastr()->success('Kategori basariyla silindi.');
        }

        if (File::exists('uploads/kategori/' . $category->image)) {
            File::delete(public_path('uploads/kategori/' . $category->image));
        }
        $category->forceDelete();
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
