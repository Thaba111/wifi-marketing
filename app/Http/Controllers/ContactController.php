<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Segment;
use Illuminate\Http\Request;



class ContactController extends Controller
{
    
    public function index()
    {
        $contacts = Contact::with('segment')->get();
        return view('contacts.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        $segment = $contact->segment; 

        return view('contacts.show', compact('contact', 'segment'));
    }


    public function create()
    {
        $segments = Segment::all();
        return view('contacts.create', compact('segments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone_number' => 'required|string|max:15',
            'location' => 'nullable|string|max:255',
            'segment_id' => 'required|exists:segments,id',
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function edit($id)
    {
        $contact = Contact::with('segments')->findOrFail($id);
        // $segments = Segment::all(); // Get all segments for the dropdown

        return view('contacts.edit', compact('contact'));
    }


    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone_number' => 'required|string|max:15',
            'location' => 'nullable|string|max:255',
            'segment_id' => 'required|exists:segments,id',
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
