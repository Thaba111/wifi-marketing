<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    // Show all banners
    public function index()
    {
        $banners = Banner::all();
        return view('banners.index', compact('banners'));
    }

    // Show form to create a new banner
    public function create()
    {
        return view('banners.create');
    }

    // Store a new banner in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'required|string',
            'target_url' => 'required|string',
            'page_location' => 'required|string',
        ]);

        Banner::create($request->all());
        return redirect()->route('banners.index')->with('success', 'Banner created successfully!');
    }

    // Show a specific banner
    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }

    // Show form to edit a banner
    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    // Update an existing banner in the database
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'required|string',
            'target_url' => 'required|string',
            'page_location' => 'required|string',
        ]);

        $banner->update($request->all());
        return redirect()->route('banners.index')->with('success', 'Banner updated successfully!');
    }

    // Delete a banner
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully!');
    }
}

