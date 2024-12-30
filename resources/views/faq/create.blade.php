@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nieuwe FAQ Toevoegen</h1>
        <form action="{{ route('faq.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_id">Categorie</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question">Vraag</label>
                <input type="text" name="question" id="question" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="answer">Antwoord</label>
                <textarea name="answer" id="answer" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
@endsection
