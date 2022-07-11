<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\MainPageResource;
use App\Models\AboutUs;
use App\Models\Article;
use App\Models\Faq;
use App\Models\Social;
use App\Models\Review;
use App\Models\Mainpage;
use App\Models\Contact;
use App\Models\SocialNetwork;
use App\Models\Doc;
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

    public function socials(Request $request)
    {
        return self::response(200, Social::get(), 'success');
    }

    public function main(Request $request)
    {
        return self::response(200, MainPageResource::collection(Mainpage::get()), 'success');
    }

    public function footer(Request $request)
    {
        $data['contacts']['mail'] = Contact::where('type','mail')->value('phone');
        $data['contacts']['phone'] = Contact::where('type','phone')->value('phone');
        $data['social_networks']['vk'] = Social::where('type', 'vk')->value('url');
        $data['social_networks']['insta'] = Social::where('type', 'insta')->value('url');
        $data['social_networks']['whatsapp'] = Social::where('type', 'whatsapp')->value('url');
        $data['docs']['use'] = Doc::where('type', 'use')->value('url');
        $data['docs']['oferta'] = Doc::where('type', 'oferta')->value('url');
        $data['docs']['privacy'] = Doc::where('type', 'privacy')->value('url');

        return self::response(200, $data, 'success');
    }

    public function reviews(Request $request)
    {
        $request->validate([
            'lang'  =>  'required',
        ]);
        $lang = $request->lang;
        $reviews = Review::join('translates as title', 'title.id', 'reviews.title')->join('translates as desc', 'desc.id', 'reviews.description')
            ->select('reviews.id', 'reviews.name', 'reviews.school_name', 'reviews.image', 'title.'.$lang. ' as title', 'desc.'.$lang. ' as description', 'reviews.created_at')
            ->get();

        return self::response(200, $reviews, 'success');
    }

    public function faq(Request $request)
    {
        $request->validate([
            'lang'  =>  'required',
        ]);
        $lang = $request->lang;
        $faqs = Faq::join('translates as title', 'title.id', 'faqs.title')->join('translates as desc', 'desc.id', 'faqs.description')
            ->select('faqs.id', 'title.'.$lang. ' as title', 'desc.'.$lang. ' as description', 'faqs.created_at')
            ->get();

        return self::response(200, $faqs, 'success');
    }
}
