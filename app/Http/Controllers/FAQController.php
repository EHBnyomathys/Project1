<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use App\Models\FAQCategory;

class FAQController extends Controller
{
    public function index()
    {
        $categories = FAQCategory::with('faqs')->get();
        return view('faq.index', compact('categories'));
    }

    public function create()
    {
        $categories = FAQCategory::all();
        return view('faq.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required',
            'answer' => 'required',
        ]);

        FAQ::create($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ toegevoegd');
    }

    public function edit(FAQ $faq)
    {
        $categories = FAQCategory::all();
        return view('faq.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->update($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ bijgewerkt');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ verwijderd');
    }
}
