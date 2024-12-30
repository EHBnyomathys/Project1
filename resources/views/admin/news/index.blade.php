@extends('layouts.app')

@section('content')
<h1>Nieuwsitems</h1>
<a href="{{ route('admin.news.create') }}" class="btn btn-primary">Nieuw nieuwsitem</a>
<ul>
    @foreach ($newsItems as $news)
        <li>{{ $news->title }} 
            <a href="{{ route('admin.news.edit', $news->id) }}">Bewerken</a>
            <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Verwijderen</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
