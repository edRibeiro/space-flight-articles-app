<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Repository\ArticleRepository;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = ArticleRepository::paginate(2);
        return  new ArticleCollection($articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'spaceflight_id' => 'required|unique:articles,spaceflight_id',
            'title' => 'required|string',
            'url' => 'required|url',
            'image_url' => 'required|url',
            'news_site' => 'required|string',
            'summary' => 'required|string',
            'published_at' => 'required|date',
            'last_updated_at' => 'required|date',
            'featured' => 'required|boolean'
        ];

        $this->validate($request, $rules);

        $article = ArticleRepository::create($request->input());
        return new ArticleResource($article);
    }

    /**
     * TO DO: Tratar 404.
     * Resolver o padrão do atributo para ser Inteiro.
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $article = ArticleRepository::find($id);
        if (!$article) {
            return $this->errorResponse(Response::$statusTexts[Response::HTTP_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

        $article = ArticleRepository::find($id);
        if (!$article) {
            return $this->errorResponse(Response::$statusTexts[Response::HTTP_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }

        $rules = [
            'spaceflight_id' => [
                'required',
                Rule::unique('articles')->ignore($article->id),
            ],
            'title' => 'required|string',
            'url' => 'required|url',
            'image_url' => 'required|url',
            'news_site' => 'required|string',
            'summary' => 'required|string',
            'published_at' => 'required|date',
            'last_updated_at' => 'required|date',
            'featured' => 'required|boolean'
        ];

        $this->validate($request, $rules);

        $article->fill($request->only([
            'spaceflight_id',
            'title',
            'url',
            'image_url',
            'news_site',
            'summary',
            'published_at',
            'last_updated_at',
            'featured'
        ]));
        if ($article->wasChanged()) {
            return $this->errorResponse(
                'You need to specify any different value to update',
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $article = ArticleRepository::update($article->id, $article->toArray());
        return new ArticleResource($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $article = ArticleRepository::find($id);
        if (!$article) {
            return $this->errorResponse(Response::$statusTexts[Response::HTTP_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        ArticleRepository::delete($article->id);

        return response()->json(['data' => ["message" => "Article successfully deleted."]], Response::HTTP_OK);
    }
}
