<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display all galleries for admin
     */
    public function index()
    {
        $galleries = Gallery::latest()->with('user')->paginate(12);

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show create gallery form
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store new gallery with images
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'content'  => 'nullable|string',
            'tags'     => 'nullable|string',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // Convert tags to array
        $tags = $request->tags
            ? array_map('trim', explode(',', $request->tags))
            : [];

        $gallery = Gallery::create([
            'name'       => $request->name,
            'category'   => $request->category,
            'content'    => $request->content,
            'tags'       => $tags,
            'status'     => 'approved', // admin-created items are auto-approved
            'user_id'    => auth()->id(),
            'school_id'  => null,
        ]);

        // Store images
        foreach ($request->file('images') as $index => $image) {
            $path = $image->store('gallery', 'public');

            GalleryImage::create([
                'gallery_id' => $gallery->id,
                'image_path' => $path,
                'sort_order' => $index,
            ]);
        }

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery created successfully!');
    }

    /**
     * Edit gallery
     */
    public function edit(Gallery $gallery)
    {
        $gallery->load('images');

        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update gallery
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'content'  => 'nullable|string',
            'tags'     => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $tags = $request->tags
            ? array_map('trim', explode(',', $request->tags))
            : [];

        $gallery->update([
            'name'     => $request->name,
            'category' => $request->category,
            'content'  => $request->content,
            'tags'     => $tags,
        ]);

        // Add new images if any
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('gallery', 'public');

                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image_path' => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery updated successfully!');
    }

    /**
     * Delete gallery and its images
     */
    public function destroy(Gallery $gallery)
    {
        // Delete files
        foreach ($gallery->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery deleted successfully!');
    }

    /**
     * Approve gallery
     */
    public function approve(Gallery $gallery)
    {
        $gallery->update(['status' => 'approved']);

        return back()->with('success', 'Gallery approved!');
    }

    /**
     * Reject gallery
     */
    public function reject(Gallery $gallery)
    {
        $gallery->update(['status' => 'rejected']);

        return back()->with('success', 'Gallery rejected.');
    }
}
