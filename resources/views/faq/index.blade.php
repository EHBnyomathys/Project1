@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Veelgestelde Vragen (FAQ)</h1>
    
    @forelse ($categories as $category)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-black">
                <h3 class="mb-0">{{ $category->name }}</h3>
            </div>
            <div class="card-body">
                @forelse ($category->faqs as $faq)
                    <div class="mb-3">
                        <h5 class="fw-bold">{{ $faq->question }}</h5>
                        <p>{{ $faq->answer }}</p>
                    </div>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @empty
                    <p class="text-muted">Geen vragen beschikbaar in deze categorie.</p>
                @endforelse
            </div>
        </div>
    @empty
        <div class="alert alert-warning text-center">
            Er zijn momenteel geen FAQ-categorieën beschikbaar.
        </div>
    @endforelse
</div>
@endsection
