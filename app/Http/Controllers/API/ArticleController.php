<?php

namespace App\Http\Controllers\API;

use App\DTO\Articles\CreateArticleDTO;
use App\DTO\Articles\UpdateArticleDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Services\Contracts\ArticleServiceInterface;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController extends Controller
{
    use ApiResponser;

    protected const REQUIRED_DATE_RULE = 'required|date';
    protected const REQUIRED_STRING_RULE = 'required|string';
    protected const REQUIRED_URL_RULE = 'required|url';

    public function __construct(
        public ArticleServiceInterface $service,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = $this->service->paginate();
        return  new ArticleCollection($articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'spaceflight_id' => 'required|unique:articles,spaceflight_id',
            'title' => self::REQUIRED_STRING_RULE,
            'url' => self::REQUIRED_URL_RULE,
            'image_url' => self::REQUIRED_URL_RULE,
            'news_site' => self::REQUIRED_STRING_RULE,
            'summary' => self::REQUIRED_STRING_RULE,
            'published_at' => self::REQUIRED_DATE_RULE,
            'last_updated_at' => self::REQUIRED_DATE_RULE,
            'featured' => 'required|boolean'
        ];

        $this->validate($request, $rules);
        $dto = CreateArticleDTO::makeFromRequest($request);
        $article = $this->service->new($dto);
        return new ArticleResource($article);
    }

    /**
     * TO DO: Tratar 404.
     * Resolver o padrão do atributo para ser Inteiro.
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $article = $this->service->findOne($id);
        if (!$article) {
            return $this->errorResponse('Article not found', Response::HTTP_NOT_FOUND);
        }
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $rules = [
            'spaceflight_id' => [
                'required',
                Rule::unique('articles')->ignore($id),
            ],
            'title' => self::REQUIRED_STRING_RULE,
            'url' => self::REQUIRED_URL_RULE,
            'image_url' => self::REQUIRED_URL_RULE,
            'news_site' => self::REQUIRED_STRING_RULE,
            'summary' => self::REQUIRED_STRING_RULE,
            'published_at' => self::REQUIRED_DATE_RULE,
            'last_updated_at' => self::REQUIRED_DATE_RULE,
            'featured' => 'required|boolean'
        ];
        $this->validate($request, $rules);
        $dto = UpdateArticleDTO::makeFromRequest($request, $id);
        $article = $this->service->update($dto, $id);
        if (!$article) {
            return $this->errorResponse(Response::$statusTexts[Response::HTTP_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        return new ArticleResource($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $this->service->delete($id);
        } catch (NotFoundHttpException $th) {
            return $this->errorResponse(Response::$statusTexts[Response::HTTP_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['data' => ["message" => "Article successfully deleted."]], Response::HTTP_OK);
    }
}
