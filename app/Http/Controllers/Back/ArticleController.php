<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'DESC')->get();
        return view('back.article.index', compact('articles'));
    }

    public function create()
    {
        $data['categories'] = Category::all();
        return view('back.article.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $article = new Article;
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->description = $request->description;
        $article->is_top = $request->is_top == 'on' ? 1 : 0;

        $article->slug = str_slug(str_limit($request->title, 20));

        if ($request->hasFile('image')) {
            $imageName = str_slug($request->title) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/makale/'), $imageName);
            $article->image = $imageName;
        }
        $article->save();
        toastr()->success('Basarili', 'Makale basariyla olusturuldu.');
        return redirect()->route('admin.makale.index');
    }

    public function show($id)
    {
        return $id;
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('back.article.edit', compact('categories', 'article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'min:3',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->description = $request->description;
        $article->is_top = $request->is_top == 'on' ? 1 : 0;
        $article->slug = str_slug(str_limit($request->title, 20));

        if ($request->hasFile('image')) {
            $imageName = str_slug($request->title) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/makale/'), $imageName);
            $article->image = $imageName;
        }
        $article->save();
        toastr()->success('Basarili', 'Makale basariyla guncellendi.');
        return redirect()->route('admin.makale.index');
    }

    public function switch(Request $request)
    {
        $article = Article::findOrFail($request->id);
        $article->status = $request->statu == 'true' ? 1 : 0;
        $article->save();
    }

    public function delete($id)
    {
        Article::find($id)->delete();
        toastr()->success('Kayit Silinenlere basariyla tasindi.');
        return redirect()->route('admin.makale.index');
    }

    public function trashed()
    {
        $articles = Article::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return view('back.article.trashed', compact('articles'));
    }

    public function recycle($id)
    {
        Article::onlyTrashed()->find($id)->restore();
        toastr()->success('Makale basariyla kurtarildi.');
        return redirect()->back();
    }

    public function hardDelete($id)
    {
        $article = Article::onlyTrashed()->find($id);

        if (File::exists('uploads/' . $article->image)) {
            File::delete(public_path('uploads/' . $article->image));
        }

        $article->forceDelete();
        toastr()->success('Makale basariyla silindi.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
