<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Show all news items to admin
    public function adminIndex()
    {
        $newsItems = News::all();
        return view('admin.news.index', compact('newsItems'));
    }

    // Add news item form
    public function create()
    {
        return view('admin.news.create');
    }

    // Save news item
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        $imagePath = $request->file('image')?->store('news_images', 'public');

        News::create([
            'title' => $validated['title'],
            'image' => $imagePath,
            'content' => $validated['content'],
            'published_at' => $validated['published_at'],
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem toegevoegd!');
    }

    // Edit news item form
    public function edit($id)
    {
        $newsItem = News::findOrFail($id);
        return view('admin.news.edit', compact('newsItem'));
    }

    // Update news item
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        $newsItem = News::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($newsItem->image);
            $imagePath = $request->file('image')->store('news_images', 'public');
            $newsItem->image = $imagePath;
        }

        $newsItem->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem bijgewerkt!');
    }

    // Delete news item
    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);
        Storage::disk('public')->delete($newsItem->image);
        $newsItem->delete();

        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem verwijderd!');
    }
}
