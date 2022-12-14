<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use Session;
use App\ArticleList;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleListRequest;
use App\Http\Requests\UpdateArticleListRequest;

class ArticleListController extends Controller
{

    public function index()
    {
        $articles = ArticleList::all();
        return view('admin.articleLists.index')->with([
            'articles' => $articles
        ]);
    }

    public function create()
    {
        return view('admin.articleLists.create');
    }


    public function store(StoreArticleListRequest $request)
    {
        $article = new ArticleList;
        $article->article_code = $request->code;
        $article->short_name = $request->short_name;
        $article->long_name = $request->long_name;
        $article->description = $request->description;
        $article->size = $request->size;
        $article->unit = $request->unit;
        $article->type = $request->type;
        $article->save();

        if (!empty($request->Save)) {
            Session::flash('message', ' Nieuw artikel toegevoegd!');
            return redirect('admin/article-list/edit/'.$article->id);
            //return redirect('admin/weekcard');
        }
        if (!empty($request->Save_Close)) {
            Session::flash('message', ' Nieuw artikel toegevoegd!');
            return redirect('admin/article-list');
        }

        if (!empty($request->Save_New)) {
            Session::flash('message', ' Nieuw artikel toegevoegd!');
            return redirect('admin/article-list/create');
        }

    }


    public function show($id)
    {
        $article = ArticleList::find($id);
        return view('admin.articleLists.show')->with([
            'article' => $article
        ]);
    }


    public function edit($id)
    {
        $article = ArticleList::find($id);
        return view('admin.articleLists.edit')->with([
            'article' => $article
        ]);
    }


    public function update(UpdateArticleListRequest $request, $id)
    {
        $article = ArticleList::find($id);
        $article->article_code = $request->code;
        $article->short_name = $request->short_name;
        $article->long_name = $request->long_name;
        $article->description = $request->description;
        $article->size = $request->size;
        $article->unit = $request->unit;
        $article->type = $request->type;
        $article->save();

        if (!empty($request->Save)) {
            Session::flash('message', ' Artikelgegevens bijgewerkt!');
            return redirect('admin/article-list/edit/'.$article->id);
            //return redirect('admin/weekcard');
        }
        if (!empty($request->Save_Close)) {
            Session::flash('message', ' Artikelgegevens bijgewerkt!');
            return redirect('admin/article-list');
        }

        if (!empty($request->Save_New)) {
            Session::flash('message', ' Artikelgegevens bijgewerkt!');
            return redirect('admin/article-list/create');
        }

    }


    public function destroy($id)
    {
        $article = ArticleList::find($id);
        $article->delete();
        Session::flash('message', ' Artikel is met succes verwijderd!');
        return redirect('admin/article-list');
    }
}
