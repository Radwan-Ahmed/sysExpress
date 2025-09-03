<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // Show all gallery items
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('gallery.index', compact('galleries'));
    }

    // Show form
    public function create()
    {
        return view('gallery.create');
    }

    // Save gallery item
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video',
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:102400', // 100MB
        ]);

        // Store file inside storage/app/public/gallery
        $path = $request->file('file')->store('gallery', 'public');

        // Save to database
        Gallery::create([
            'title' => $request->title,
            'type' => $request->file->getClientOriginalExtension() === 'mp4' ? 'video' : 'image',
            'file' => $path,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gallery item added successfully!');
    }

    // Show create multiple form
    public function createMultiple()
    {
        return view('gallery.create-multiple');
    }

    // Store multiple items
    public function storeMultiple(Request $request)
    {
        $request->validate([
            'items.*.title' => 'required|string|max:255',
            'items.*.type' => 'required|in:image,video',
            'items.*.file' => 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:102400',
        ]);

        foreach ($request->items as $item) {
            if (isset($item['file'])) {
                $path = $item['file']->store('gallery', 'public');

                Gallery::create([
                    'title' => $item['title'],
                    'type' => $item['file']->getClientOriginalExtension() === 'mp4' ? 'video' : 'image',
                    'file' => $path,
                ]);
            }
        }

        return redirect()->route('gallery.index')->with('success', 'Multiple gallery items uploaded!');
    }


    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('gallery.index')->with('error', 'No items selected for deletion.');
        }

        // Delete all selected items
        Gallery::whereIn('id', $ids)->delete();

        return redirect()->route('gallery.index')->with('success', 'Selected items deleted successfully.');
    }


    public function destroy(Gallery $gallery)
    {
        // Delete file from storage
        if ($gallery->file && \Storage::disk('public')->exists($gallery->file)) {
            \Storage::disk('public')->delete($gallery->file);
        }

        // Delete from database
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gallery item deleted successfully!');
    }


    public function userGallery()
    {
        $galleryItems = \App\Models\Gallery::latest()->get();
        return view('customers_gallery.user_gallery', compact('galleryItems'));
    }

    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    public function show(Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:102400',
        ]);

        if ($request->hasFile('file')) {
            // Delete old file
            if ($gallery->file && \Storage::disk('public')->exists($gallery->file)) {
                \Storage::disk('public')->delete($gallery->file);
            }

            // Save new file
            $path = $request->file('file')->store('gallery', 'public');
            $gallery->file = $path;
            $gallery->type = $request->file('file')->getClientOriginalExtension() === 'mp4' ? 'video' : 'image';
        }

        $gallery->title = $request->title;
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Gallery item updated successfully!');
    }







}
