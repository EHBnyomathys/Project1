@extends('layouts.app')

@section('content')
    <style>
        /* Algemene stijlen */
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #F5F5F5;
            --text-color: #333;
            --border-radius: 8px;
        }

        .faq-form-container {
            max-width: 600px;
            margin: 2em auto;
            padding: 2em;
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .faq-form-container h1 {
            text-align: center;
            margin-bottom: 1em;
            color: var(--primary-color);
        }

        .form-group {
            margin-bottom: 1.5em;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5em;
            color: var(--text-color);
        }

        .form-control {
            width: 100%;
            padding: 0.75em;
            border: 1px solid #ccc;
            border-radius: var(--border-radius);
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            padding: 0.75em 1.5em;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #357ABD;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
    </style>

    <div class="faq-form-container">
        <h1>➕ Nieuwe FAQ Toevoegen</h1>
        <form action="{{ route('faq.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_id">📚 Categorie</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question">❓ Vraag</label>
                <input type="text" name="question" id="question" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="answer">📝 Antwoord</label>
                <textarea name="answer" id="answer" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn-primary">✅ Toevoegen</button>
        </form>
    </div>
@endsection
