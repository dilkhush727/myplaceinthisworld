<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryLike;

class GalleryLikeController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'gallery_id' => 'required|exists:galleries,id'
        ]);

        $galleryId = $request->gallery_id;
        $ip = $request->ip();
        $userId = auth()->check() ? auth()->id() : null;

        // Check if user or guest already liked
        $existing = GalleryLike::where('gallery_id', $galleryId)
            ->where(function ($q) use ($userId, $ip) {
                if ($userId) {
                    $q->where('user_id', $userId);
                } else {
                    $q->where('ip_address', $ip);
                }
            })
            ->first();

        // UNLIKE
        if ($existing) {
            $existing->delete();

            return response()->json([
                'liked' => false,
                'count' => GalleryLike::where('gallery_id', $galleryId)->count(),
            ]);
        }

        // LIKE (new like)
        GalleryLike::create([
            'gallery_id' => $galleryId,
            'user_id' => $userId,
            'ip_address' => $userId ? null : $ip,
        ]);

        return response()->json([
            'liked' => true,
            'count' => GalleryLike::where('gallery_id', $galleryId)->count(),
        ]);
    }
}
