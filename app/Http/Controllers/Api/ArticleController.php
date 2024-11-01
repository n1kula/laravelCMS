<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    public function index(): JsonResponse
    {
        $articles = Article::all()->map(function ($article) {
            return [
                'title' => $article->title,
                'author' => [
                    'name' => $article->author,
                    'profileLink' => '/about'
                ],
                'date' => $article->date->format('d-m-Y'),
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
