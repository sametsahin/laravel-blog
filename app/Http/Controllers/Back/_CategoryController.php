<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class _CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('back.category.index', compact('categories'));
    }

    public function create(Request $request)
    {
        $isExistCategory = Category::where(['slug' => str_slug($request->category)])->first();
        if ($isExistCategory) {
            toastr()->error($request->category . ' Kategorisi mevcuttur.');
            return redirect()->back();
        }
        $category = new Category;
        $category->name = $request->category;
        $category->slug = str_slug($request->category);
        $category->color = 1;
        if ($request->hasFile('image')) {
            $imageName = str_slug($request->category) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/kategori/'), $imageName);
            $category->image = $imageName;
        }

        $category->save();
        toastr()->success('Kategori Basariyla Olusturuldu');
        return redirect()->back();

    }

    public function update(Request $request)
    {
        $isName = Category::where(['name' => $request->name])->whereNotIn(['category_id' => $request->id])->first();
        $isSlug = Category::where(['slug' => str_slug($request->slug)])->whereNotIn(['category_id' => $request->id])->first();
        if ($isName or $isSlug) {
            toastr()->error($request->name . ' Kategorisi mevcuttur.');
            return redirect()->back();
        }
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->color = 1;
        if ($request->hasFile('category_image')) {
            $imageName = str_slug($request->name) . '.' . $request->category_image->getClientOriginalExtension();
            $request->category_image->move(public_path('uploads/kategori/'), $imageName);
            $category->image = $imageName;
        }

        $category->save();
        toastr()->success('Kategori Basariyla Güncellendi.');
        return redirect()->back();

    }


    //JQUERY
    public function getId(Request $request)
    {
        $category = Category::findOrFail($request->id);
        return response()->json($category);
    }

    public function switch(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $request->statu == 'true' ? 1 : 0;
        $category->save();
    }

}
