<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        // Fetch only approved galleries
        $galleries = Gallery::where('status', 'approved')
            ->latest()
            ->with('images') // We will use this later when images are added
            ->get();

        return view('gallery.index', compact('galleries'));
    }
}
