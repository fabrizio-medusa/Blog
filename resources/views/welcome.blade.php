<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-contetn-center">
            <h1 class="display-1">
                The Aulab Post
            </h1>
        </div>
    </div>
    <x-success />
        <div class="container my-5">
            <div class="row justify-content-around">
                @foreach($articles as $article)
                    <div class="card mt-2">
                        <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{$article->subtitle}}</p>
                            <p class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</p>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            Scritto il {{$article->created_at->format('d/n/Y')}} da {{$article->user->name}}
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    
</x-layout>