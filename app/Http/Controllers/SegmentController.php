<?php

namespace App\Http\Controllers;
use App\Models\Segment;
use App\Models\Contact;

use Illuminate\Http\Request;

class SegmentController extends Controller
{
    // Method to display contacts filtered by segment
    public function filterContacts($id)
{
    $segment = Segment::find($id);
    
    if (!$segment) {
        return redirect()->route('segments.index')->with('error', 'Segment not found.');
    }

    $contacts = Contact::where('segment_id', $id)->get(); // Adjust criteria as needed

    return view('segments.filter', compact('contacts', 'segment'));
}

public function show($id)
{
    $segment = Segment::find($id);
    $contacts = $segment->contacts; 

    return view('segments.show', compact('segment', 'contacts'));
}

}
