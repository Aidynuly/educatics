<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use App\Models\Translate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ReviewController
 * @package App\Http\Controllers
 */
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::get();

        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $review = new Review();
        return view('admin.review.create', compact('review'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = Translate::create([
            'ru'    =>  $request['title_ru'],
            'kz'    =>  $request['title_kz'],
            'en'    =>  $request['title_en'],
        ]);
        $description = Translate::create([
            'ru'    =>  $request['description_ru'],
            'kz'    =>  $request['description_kz'],
            'en'    =>  $request['description_en'],
        ]);

        if (isset($request->image)) {
            $path = $this->uploadImage($request->file('image'));
        }

        $review = Review::create([
            'type'  =>  $request['type'],
            'name'  =>  $request['name'],
            'title' =>  $title->id,
            'description'   =>  $description->id,
            'school_name'   =>  $request['school_name'],
            'image' =>  $path ?? null,
        ]);

        return redirect()->route('reviews.index')
            ->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);

        return view('admin.review.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);

        return view('admin.review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        Translate::find($review->title)->update([
            'ru'    =>  $request['title_ru'],
            'kz'    =>  $request['title_kz'],
            'en'    =>  $request['title_en'],
        ]);
        Translate::find($review->description)->update([
            'ru'    =>  $request['description_ru'],
            'kz'    =>  $request['description_kz'],
            'en'    =>  $request['description_en'],
        ]);

        if (isset($request->image)) {
            $path = $this->uploadImage($request->file('image'));
        }

        $review->update([
            'type'  =>  $request['type'] ?? $review->type,
            'name'  =>  $request['name'] ?? $review->name,
            'school_name'   =>  $request['school_name'] ?? $review->school_name,
            'image'     =>  $path ?? $review['image'],
        ]);

        return redirect()->route('reviews.index')
            ->with('success', 'Review updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $review = Review::find($id)->delete();

        return redirect()->route('reviews.index')
            ->with('success', 'Review deleted successfully');
    }
}
