<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * List galleries created by THIS teacher only
     */
    public function index()
    {
        $teacherId = auth()->id();

        $galleries = Gallery::where('user_id', $teacherId)
            ->latest()
            ->with(['images', 'user'])
            ->paginate(12);

        return view('teacher.gallery.index', compact('galleries'));
    }

    /**
     * Show create gallery form
     */
    public function create()
    {
        return view('teacher.gallery.create');
    }

    /**
     * Store new gallery with status = pending
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

        $tags = $request->tags
            ? array_map('trim', explode(',', $request->tags))
            : [];

        $gallery = Gallery::create([
            'name'      => $request->name,
            'category'  => $request->category,
            'content'   => $request->content,
            'tags'      => $tags,
            'status'    => 'pending', // TEACHER SUBMISSION
            'user_id'   => auth()->id(),
            'school_id' => auth()->user()->school_id,  // teacher's school
        ]);

        // Upload images
        foreach ($request->file('images') as $index => $image) {
            $path = $image->store('gallery', 'public');

            GalleryImage::create([
                'gallery_id' => $gallery->id,
                'image_path' => $path,
                'sort_order' => $index,
            ]);
        }

        return redirect()->route('teacher.gallery.index')
            ->with('success', 'Gallery submitted for review!');
    }


    /**
     * Edit gallery (teacher can only edit their own)
     */
    public function edit(Gallery $gallery)
    {
        if ($gallery->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $gallery->load('images');

        return view('teacher.gallery.edit', compact('gallery'));
    }

    /**
     * Update gallery (auto-reject after editing)
     */
    public function update(Request $request, Gallery $gallery)
    {
        if ($gallery->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

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
            'status'   => 'rejected', // auto reject after edit
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

        return redirect()->route('teacher.gallery.index')
            ->with('success', 'Gallery updated and sent for re-approval.');
    }

    /**
     * Delete gallery
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        // Delete all images
        foreach ($gallery->images as $img) {
            Storage::disk('public')->delete($img->image_path);
        }

        $gallery->delete();

        return back()->with('success', 'Gallery deleted successfully.');
    }
}
