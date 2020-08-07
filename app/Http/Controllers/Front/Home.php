<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class Home extends Controller
{
    public function __construct()
    {
        if (Config::find(1)->active == 0) {
            return redirect()->to('site-bakim-asamasinda')->send();
        }
        $whereData = [['status', 1], ['id', '!=', '1']];
        view()->share('pages', Page::where('status', 1)->orderBy('position', 'ASC')->get());
        view()->share('top_categories', Category::where($whereData)->limit(3)->get());
        view()->share('categories', Category::where($whereData)->limit(5)->get());
        view()->share('most_rated', Article::orderBy('hit', 'DESC')->limit(4)->get());
    }

    public function index()
    {
        $data['top_articles'] = Article::where(['is_top' => 1])->limit(3)->orderBy('updated_at', 'DESC')->get();
        $data['articles'] = Article::with('getCategory')
            ->where(['status' => 1])
            ->whereHas('getCategory', function ($query) {
                $query->where('status', 1);
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        return view('front.home', $data);
    }

    public function detail($category, $slug)
    {
        $category = Category::where(['slug' => $category])->first() ?? abort(403, 'Böyle bir kategori bulunamadı');
        $article = Article::where(['slug' => $slug, 'category_id' => $category->id])->first() ?? abort(403, 'Böyle bir yazı bulunamadı');
        $article->increment('hit');
        $data['article'] = $article;

        return view('front.detail', $data);
    }

    public function category($slug)
    {
        $category = Category::where(['slug' => $slug])->first() ?? abort(403, 'Böyle bir kategori bulunamadı');
        $data['category'] = $category;
        $data['articles'] = Article::where(['category_id' => $category->id, 'status' => 1])->orderBy('created_at', 'DESC')->paginate(4);
        return view('front.category', $data);
    }

    public function page($slug)
    {
        $data['page'] = Page::where('slug', $slug)->first() ?? abort(403, 'Böyle bir sayfa bulunamadı.');
        return view('front.page', $data);
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contact_post(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'topic' => 'required',
            'message' => 'required|min:8'
        ];

        $validate = Validator::make($request->post(), $rules);

        if ($validate->fails()) {
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }


        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->topic = $request->topic;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->route('contact')->with('success', 'Mesajınız iletildi. Tesekkurler');
    }


}
