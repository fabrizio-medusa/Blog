<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Redattore</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td> {{ $article->title }} </td>
                <td> {{ $article->subtitle }} </td>
                <td> {{ $article->user->name }} </td>
                <td>
                    @if (is_null($article->is_accepted))
                        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-info text-white"><i class="fa-solid fa-book-open-reader" data-bs-toggle="tooltip" data-bs-placement="top" title="Leggi articolo"></i></a>
                    @else
                        <form action="{{ route('revisor.undoArticle', compact('article'))}}" method="POST">
                            @csrf
                            <button class="btn btn-warning text-white"><i class="fa-solid fa-repeat" data-bs-toggle="tooltip" data-bs-placement="top" title="Riporta in revisione"></i></button>
                        </form>
                           
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
            
</table>