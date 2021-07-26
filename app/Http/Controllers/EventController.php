<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
       $events = Event::with('user')->get();
       return view('event.index', compact('events'));

       //compact('events') == ['events' => $events]
      
        
    }



    public function store(Request $request)
    {
      
        $request->validate([
            'title' => 'required|min:5|max:150',
            'description' => 'required',
            'photo' => 'required|mimes:jpg,png'
            
        ]);

        $path1 = $request->file('photo')->store('event', ['disk' => 'public']);
    
        Event::create([
            'title' => $request->title,

            'description' => $request->description,

            'user_id' => auth()->id(),

            'event_image' => $path1,
            
        ]);

        return redirect()->route('event.index')->with(['message' => 'Blog Created']);
    }

    public function edit(Event $event)
    {   
        //Route model binding
        //$event = Event::where('id','=', $event_id)->first();
        return view('event.edit', compact('event'));
    }

    public function show(Event $event)
    {   
        //Route model binding
        //$event = Event::where('id','=', $event_id)->first();
        return view('event.show', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
                  
        $request->validate([
            'title' => 'required|min:5|max:150',
            'description' => 'required',
            //'date' => 'required|date'
            ]);

        //dd($request->all (), $event);
        if ($event->user_id == auth()->id())
        {
  
                 $event->update([
            
                    'title' => $request->title,

                    'description' => $request->description,

                ]);

            return redirect()->route('event.index')->with(['message' => 'Blog Updated']);
        }  else{
            abort(403);

        }
     }

     public function delete(Event $event)
     {
        if ($event->user_id == auth()->id())
        {
         $event->delete();
         return redirect()->route('event.index')->with(['message' => 'Blog Updated']);
        }
        else{
            abort(403);

        }
     }

   

}    