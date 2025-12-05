<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Show all galleries created by this school.
     */
    public function index()
    {
        $school = auth()->user()->school_id;

        $galleries = Gallery::where('school_id', $school)
            ->orderBy('created_at', 'desc')
            ->with('images')
            ->paginate(12);

        return view('school.gallery.index', compact('galleries'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('school.gallery.create');
    }

    /**
     * Store new gallery (status = pending)
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

        $schoolId = auth()->user()->school_id;

        $tags = $request->tags
            ? array_map('trim', explode(',', $request->tags))
            : [];

        $gallery = Gallery::create([
            'name'      => $request->name,
            'category'  => $request->category,
            'content'   => $request->content,
            'tags'      => $tags,
            'status'    => 'pending', // ⭐ School submits → Pending
            'user_id'   => auth()->id(),
            'school_id' => $schoolId,
        ]);

        foreach ($request->file('images') as $index => $image) {
            $path = $image->store('gallery', 'public');

            GalleryImage::create([
                'gallery_id' => $gallery->id,
                'image_path' => $path,
                'sort_order' => $index,
            ]);
        }

        return redirect()->route('school.gallery.index')
            ->with('success', 'Gallery submitted for approval!');
    }

    /**
     * Edit a gallery (only their own)
     */
    public function edit(Gallery $gallery)
    {
        $this->authorizeOwnership($gallery);

        $gallery->load('images');

        return view('school.gallery.edit', compact('gallery'));
    }

    /**
     * Update gallery (auto-rejected)
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->authorizeOwnership($gallery);

        $request->validate([
            'name'      => 'required|string|max:255',
            'category'  => 'nullable|string|max:255',
            'content'   => 'nullable|string',
            'tags'      => 'nullable|string',
            'images.*'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $tags = $request->tags
            ? array_map('trim', explode(',', $request->tags))
            : [];

        // ⭐ Any school edit → rejected
        $gallery->update([
            'name'     => $request->name,
            'category' => $request->category,
            'content'  => $request->content,
            'tags'     => $tags,
            'status'   => 'rejected',
        ]);

        // Add new images if uploaded
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

        return redirect()->route('school.gallery.index')
            ->with('success', 'Gallery updated and is pending admin approval.');
    }

    /**
     * Delete gallery
     */
    public function destroy(Gallery $gallery)
    {
        $this->authorizeOwnership($gallery);

        // Remove images
        foreach ($gallery->images as $img) {
            Storage::disk('public')->delete($img->image_path);
        }

        $gallery->delete();

        return redirect()->route('school.gallery.index')
            ->with('success', 'Gallery deleted.');
    }

    /**
     * Ensure gallery belongs to this school
     */
    private function authorizeOwnership(Gallery $gallery)
    {
        if ($gallery->school_id !== auth()->user()->school_id) {
            abort(403, 'You do not own this gallery.');
        }
    }
}
