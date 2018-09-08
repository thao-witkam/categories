<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::with('category')
            ->orderBy('categoryId')
            ->get()
        ;

        return view('article.index', ['articles' => $articles]);
    }

    public function create(Request $request)
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'categoryId' => 'required|int',
            'title' => 'required|max:255|string',
            'content' => 'required|string'
        ]);

        if ((new Article($data))->save())
        {
            return redirect('article');
        }
    }

    public function destroy(Request $request, $id)
    {
        if(Article::where('id', $id)->get())
        {
            Article::destroy($id);
        }

        return redirect('article');
    }
}
