<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $events = Event::orderBy('created_at', 'desc')->get();


        return view('adminpanel/events/index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'venue' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle Cover Image Upload
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('events/cover_images', 'public');
        } else {
            $coverImagePath = null;
        }

        // Handle Multiple Event Images Upload
        $eventImages = [];
        if ($request->hasFile('event_images')) {
            foreach ($request->file('event_images') as $image) {
                $eventImages[] = $image->store('events/event_images', 'public');
            }
        }

        Event::create([
            'title' => $request->title,
            'date' => $request->date,
            'venue' => $request->venue,
            'description' => $request->description,
            'cover_image' => $coverImagePath,
            'event_images' => json_encode($eventImages),
        ]);


        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $event = Event::findOrFail($id);

    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'venue' => 'required|string|max:255',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'event_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle Cover Image Update
    if ($request->hasFile('cover_image')) {
        // Delete old cover image if exists
        if ($event->cover_image) {
            Storage::delete('public/' . $event->cover_image);
        }
        $coverImagePath = $request->file('cover_image')->store('events/cover_images', 'public');
    } else {
        $coverImagePath = $event->cover_image;
    }

    // Handle Multiple Event Images Update
    $eventImages = json_decode($event->event_images, true) ?? [];

    if ($request->hasFile('event_images')) {
        // Delete old event images before uploading new ones
        foreach ($eventImages as $oldImage) {
            Storage::delete('public/' . $oldImage);
        }
        $eventImages = []; // Reset images array

        foreach ($request->file('event_images') as $image) {
            $eventImages[] = $image->store('events/event_images', 'public');
        }
    }

    // Update event details
    $event->update([
        'title' => $request->title,
        'date' => $request->date,
        'venue' => $request->venue,
        'cover_image' => $coverImagePath,
        'event_images' => json_encode($eventImages),
    ]);

    return response()->json(['message' => 'Event updated successfully!', 'event' => $event]);
}

   
    public function destroy(event $event)
    {
        if ($event->cover_image) {
    $filePath = 'public/' . $event->cover_image; // Laravel stores in 'public/' prefix
    if (Storage::exists($filePath)) {
        Storage::delete($filePath);
    }
}
    
        // Delete the circular record
        $event->delete();
    
        // Redirect to the correct route name
        return redirect()->route('events.index')->with('success', 'events deleted successfully!');
    }
    
    
}
