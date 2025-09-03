
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

        return redirect()->route('gallery.create-multiple')->with('success', 'Multiple gallery items uploaded!');
    }
