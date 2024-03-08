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
        <div class="row justify-content-center animate-on-load">
            @foreach($articles as $article)
            <div class="col-12 col-md-3 mb-4">
                <div class="card shadow zoom-on-hover">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        <div>
                            Scritto il {{$article->created_at->format('d/m/Y')}} <br>da
                            <a href="{{ route('article.byUser', ['user' => $article->user->id]) }}" class="small text-muted fst-italic text-capitalize">
                                {{$article->user->name}}
                            </a>
                        </div>
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white ml-auto">Leggi</a>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
    
    
    

    
</x-layout>