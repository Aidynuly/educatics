<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Models\Translate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function redirect;
use function request;
use function view;

/**
 * Class EventController
 * @package App\Http\Controllers
 */
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate();

        return view('admin.event.index', compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * $events->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = new Event();

        return view('admin.event.create', compact('event'));
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
            'en'    =>  $request['title_en'],
            'kz'    =>  $request['title_kz'],
        ]);
        $description = Translate::create([
            'ru'    =>  $request['description_ru'],
            'kz'    =>  $request['description_kz'],
            'en'    =>  $request['description_en'],
        ]);
        if ($request->hasFile('image')) {
            $path = $this->uploadImage($request->file('image'));
        }
        $date = Carbon::parse($request->input('date'));
        $event = Event::create([
            'title' =>  $title->id,
            'description'   =>  $description->id,
            'image' =>  $path,
            'date'      =>  $date,
        ]);

        return redirect()->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('admin.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        Translate::find($event->title)->update([
            'ru'    =>  $request['title_ru'],
            'en'    =>  $request['title_en'],
            'kz'    =>  $request['title_kz'],
        ]);
        Translate::find($event->description)->update([
            'ru'    =>  $request['description_ru'],
            'kz'    =>  $request['description_kz'],
            'en'    =>  $request['description_en'],
        ]);
        if ($request->hasFile('image')) {
            $path = $this->uploadImage($request->file('image'));
        }
        if (isset($request['date'])) {
            $date = Carbon::parse($request->input('date'));
        }

        $event->update([
            'image' =>  $path ?? $event->image,
            'date'  =>  $date ?? $event->date,
        ]);

        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $event = Event::find($id)->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully');
    }
}
