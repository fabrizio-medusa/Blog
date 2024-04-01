<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tags</th>
            <th scope="col">Creato il</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td> {{ $article->title }} </td>
                <td> {{ $article->subtitle }} </td>
                <td> {{ $article->category->name ?? 'Non categorizzato' }} </td>
                <td>
                    @foreach($article->tags as $tag)
                        {{$tag->name}},
                    @endforeach
                </td>
                <td>{{$article->created_at->format('d/m/Y')}}</td>
                <td>
                    <a href="{{ route('article.show', compact('article')) }}" class="btn btn-info text-white mt-1"><i class="fa-solid fa-book-open-reader" data-bs-toggle="tooltip" data-bs-placement="top" title="Leggi articolo"></i></a>
                    <a href="{{route('article.edit', compact('article'))}}" class="btn btn-warning text-white mt-1"><i class="fa-solid fa-pen-to-square" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifica articolo"></i></a>
                    <form action="{{route('article.destroy', compact('article'))}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mt-1" type="submit"><i class="fa-solid fa-trash-can-arrow-up" data-bs-toggle="tooltip" data-bs-placement="top" title="Elimina articolo"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach    
    </tbody>
</table>