<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\MainPageResource;
use App\Models\AboutUs;
use App\Models\Article;
use App\Models\Event;
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
        $request->validate([
            'lang'  =>  'required',
        ]);
        $data['first_block'] = AboutUs::join('translates as title', 'title.id', 'about_us.title')
            ->join('translates as description', 'description.id', 'about_us.description')
            ->where('about_us.block', 'first')
            ->select('about_us.id','title.'.$request->lang.' as title','description.'.$request->lang.' as description', 'about_us.image')
            ->first();
        $data['second_block'] = AboutUs::join('translates as title', 'title.id', 'about_us.title')
            ->where('about_us.block', 'second')
            ->select('about_us.id','title.'.$request->lang.' as title','about_us.image')
            ->first();

        $data['third_block'] = AboutUs::join('translates as title', 'title.id', 'about_us.title')
            ->where('about_us.block', 'third')
            ->select('about_us.id','title.'.$request->lang.' as title','about_us.image')
            ->first();

        return self::response(200, $data, 'success');
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
        $request->validate([
            'lang'  =>  'required',
        ]);
        $data['first_block'] = new MainPageResource(Mainpage::where('block', 1)->first());
        $data['second_block'] = new MainPageResource(Mainpage::where('block', 2)->first());
        $data['third_block'] = new MainPageResource(Mainpage::where('block', 3)->first());

        return self::response(200, $data, 'success');
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
        $data['parent'] = Review::join('translates as title', 'title.id', 'reviews.title')->join('translates as desc', 'desc.id', 'reviews.description')
            ->where('reviews.type', 'parent')
            ->select('reviews.id', 'reviews.name', 'reviews.school_name', 'reviews.image', 'title.'.$lang. ' as title', 'desc.'.$lang. ' as description', 'reviews.created_at')
            ->get();
        $data['children'] = Review::join('translates as title', 'title.id', 'reviews.title')->join('translates as desc', 'desc.id', 'reviews.description')
            ->where('reviews.type', 'children')
            ->select('reviews.id', 'reviews.name', 'reviews.school_name', 'reviews.image', 'title.'.$lang. ' as title', 'desc.'.$lang. ' as description', 'reviews.created_at')
            ->get();

        return self::response(200, $data, 'success');
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

    public function events(Request $request)
    {
        $request->validate([
            'lang'  =>  'required',
        ]);
        $lang = $request->lang;
        $events = Event::join('translates as title', 'title.id', 'events.title')->join('translates as desc', 'desc.id', 'events.description')
            ->select('events.id','title.'.$lang. ' as title', 'desc.'.$lang. ' as description','events.date', 'events.image')
            ->get();

        return self::response(200, $events, 'success');
    }
}
