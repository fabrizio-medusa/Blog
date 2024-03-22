<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct () {
        $this->middleware('auth')->except('index', 'show', 'byCategory', 'byUser', 'articleSearch');
     }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderByDesc('created_at')->get();
        return view('article.index', compact('articles'));
    }

        public function articleSearch(Request $request) {
            $query = $request->input('query');
            $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

            return view('article.search-index', compact('articles', 'query'));
        }



    public function create()
    {
        return view ('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|unique:articles|min:5',
            'body' => 'required|min:10',
            'image' => 'image|required',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'image' => $request->file('image')->store('public/images'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
        ]);

        $tags = explode(',' , $request->tags);

        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(
                ['name' => $tag],
                ['name' => strtolower($tag)],
            );
            $article->tags()->attach($newTag);
        }

        return redirect(route('article.create'))->with('success', 'Articolo creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
{
    $request->validate([
        'title' => 'required|unique:articles,title,' .$article->id,
        'subtitle' => 'required|unique:articles,subtitle,' .$article->id,
        'body' => 'required|min:10',
        'image' => 'image',
        'category' => 'required',
        'tags' => 'required',
    ]);

    $article->update([
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'body' => $request->body,
        'category_id' => $request->category,
    ]);

    if($request->image){
        Storage::delete($article->image);
        $article->update([
            'image' => $request->file('image')->store('public/images'),
        ]);
    }

    $tags = explode(',' , $request->tags);
    $newTags = [];

    foreach ($tags as $tag) {
        $newTag = Tag::updateOrCreate([
            'name' => $tag,
        ]);
        $newTags[] = $newTag->id;
    }

    $article->tags()->sync($newTags);

    return redirect(route('writer.dashboard'))->with('success', 'Articolo aggiornato correttamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    public function byCategory(Category $category) {

        $articles = $category->articles()->where('is_accepted', true)->sortByDesc('created_at');
        return view('article.by-category', compact('category', 'articles'));
    }

    public function byUser(User $user) {

        $articles = $user->articles()->where('is_accepted', true)->sortByDesc('created_at');
        return view('article.by-user', compact('user', 'articles'));
    }


}
