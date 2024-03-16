<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                {{$article->title}}
            </h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
                <div class="col-12 col-md-8 my-2">
                        <img src="{{Storage::url($article->image)}}" class="img-fluid my-3" alt="...">
                        <div class="text-center">
                            <h2>{{$article->subtitle}}</h2>
                            <p>Scritto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}</p>
                        </div>
                </div>
                <hr>
                <p>{{$article->body}}</p>
                <div class="text-center">
                    <a href="{{route('article.index')}}" class="btn btn-info text-white my-5">Torna indietro</a>
                </div>
                <div class="d-flex justify-content-between ">
                    @if (Auth::user() && Auth::user()->is_revisor)
                        <form action="{{ route('revisor.acceptArticle', compact('article'))}}" method="POST">
                            @csrf
                            <button class="btn btn-success text-white">Accetta Articolo</button>
                        </form>
                        <form action="{{ route('revisor.rejectArticle', compact('article'))}}" method="POST">
                            @csrf
                            <button class="btn btn-danger text-white">Rifiuta Articolo</button>
                        </form>
                    @endif
                </div>
        </div>
    </div>
</x-layout>