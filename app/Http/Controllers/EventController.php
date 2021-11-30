<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['event'] = Event::orderBy('id','desc')->paginate(5);
        // dd($data);
        return view('event.index', $data);
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
            ]);

            // dd($request);
            $event = new Event;
            $event->event_title = $request->event_title;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->recurrence = $request->recurrence;
            $event->repeat_time = $request->repeat_time;
            $event->repeat_on_time = $request->repeat_on_time;
            $event->cycle = $request->cycle;
            $event->week_of_day = $request->week_of_day;
            $event->months = $request->months;
            $event->save();
            return redirect()->route('event.index')
            ->with('success','event has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        // return redirect()->route('event.show',compact('event'));
        return view('event.show',compact('event'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        // return redirect()->route('event.edit',compact('event'));
        return view('event.edit',compact('event'));

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
        $request->validate([
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            ]);
            $event = Event::find($id);

            $event->event_title = $request->event_title;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->recurrence = $request->recurrence;
            $event->repeat_time = $request->repeat_time;
            $event->repeat_on_time = $request->repeat_on_time;
            $event->cycle = $request->cycle;
            $event->week_of_day = $request->week_of_day;
            $event->months = $request->months;

            $event->save();
            return redirect()->route('event.index')
            ->with('success','Event Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
            return redirect()->route('event.index')
            ->with('success','Event has been deleted successfully');
    }
}
