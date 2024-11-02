<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\JsonResponse;

/**
 *  * @OA\Info(
 *     title="Your API Title",
 *     version="1.0.0",
 *     description="Description of your API",
 *     @OA\Contact(
 *         email="support@example.com"
 *     )
 * )
 * @OA\Schema(
 *     schema="Article",
 *     type="object",
 *     @OA\Property(property="id", type="integer", format="int64", description="Unique identifier"),
 *     @OA\Property(property="title", type="string", description="Title of the article"),
 *     @OA\Property(property="author", type="string", description="Author of the article"),
 *     @OA\Property(property="date", type="string", format="date", description="Publication date"),
 *     @OA\Property(property="readingTime", type="string", description="Estimated reading time"),
 *     @OA\Property(property="tag", type="string", description="Article tags"),
 *     @OA\Property(property="image", type="object",
 *         @OA\Property(property="link", type="string", description="Link to the article image"),
 *         @OA\Property(property="alt", type="string", description="Alternative text for the image")
 *     ),
 *     @OA\Property(property="content", type="string", description="Content of the article")
 * )
 */

class ArticleController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/articles",
     *     operationId="getArticles",
     *     tags={"Articles"},
     *     summary="Get all articles",
     *     description="Returns a list of articles",
     *     @OA\Response(
     *         response=200,
     *         description="A list of articles",
     *         @OA\JsonContent(type="array",
     *             @OA\Items(ref="#/components/schemas/Article")
     *         ),
     *     ),
     *     @OA\Response(response=500, description="Internal Server Error"),
     * )
     */
    public function index(): JsonResponse
    {
        $articles = Article::all()->map(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'author' => $article->author,
                'date' => $article->created_at->format('d-m-Y'),
                'readingTime' => $article->reading_time,
                'tag' => $article->tag,
                'image' => [
                    'link' => $article->image_link,
                    'alt' => $article->image_alt
                ],
                'content' => $article->content
            ];
        });

        return response()->json($articles);
    }
}
