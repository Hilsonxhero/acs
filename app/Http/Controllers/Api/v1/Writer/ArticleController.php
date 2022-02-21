<?php

namespace App\Http\Controllers\Api\v1\Writer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Services\ApiService;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Article::class);
        $articles = Article::query()->with('user')->get();
        ApiService::_success($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->authorize('view', Article::class);

        ApiService::Validator($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required'],
            'description' => ['required'],
            'banner' => ['required'],
        ]);

        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'banner' => $request->banner,
        ]);

        ApiService::_success($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $article = Article::where('id', $id)->firstOrFail();
        } catch (\Exception $e) {
            ApiService::_throw("Selected id is invalid", 404);
        }

        ApiService::_success($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('view', Article::class);

        ApiService::Validator($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'banner' => ['required'],
        ]);



        $article = Article::where('id', $id)->firstOrFail();

        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'banner' => $request->banner,
        ]);

        ApiService::_success($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorize('view', Article::class);

        try {
            $article = Article::where('id', $id)->firstOrFail();
        } catch (\Exception $e) {
            ApiService::_throw("Selected id is invalid", 404);
        }

        $article->delete();

        ApiService::_success($article);
    }
}
