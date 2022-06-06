<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\AboutUs;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function about(Request $request)
    {
        return self::response(200, AboutUs::get(), 'success');
    }

    public function article(Request $request)
    {
        $articles = Article::get();

        return self::response(200, ArticleResource::collection($articles), 'success');
    }

    public function session(Request $request)
    {
        $session = Str::random(40);

        return self::response(200, strtoupper($session), 'session');
    }
}
