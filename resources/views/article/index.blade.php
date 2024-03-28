<x-layout>
    <div class="container-fluid p-0 position-relative mt-5">
        <img src="{{ asset('images/banner-bg.png') }}" alt="The Aulab Post Background" class="img-fluid w-100">
        <div class="position-absolute top-50 start-50 translate-middle" style="width: 75%;">
            <img src="{{ asset('images/banner-img.png') }}" alt="The Aulab Post" class="img-fluid">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white" style="z-index: 1;">
            <span class="display-4 my-font-title">The Aulab Post</span>
        </div>
    </div>
        
    <div class="display-1 text-center text-dark text-articles mt-2">Tutti gli articoli</div>
            <div class="container mt-3">
                @foreach($articles as $article)
                    <div class="row mb-4">
                    <div class="col-lg-8 col-sm-12">
                        <img src="{{Storage::url($article->image)}}" class="img-fluid w-100 my-height mb-2" alt="Article Image">
                            <p class="text-muted mt-2 text-articles">Scritto il {{$article->created_at->format('d/m/Y')}}</p>
                            <h2 class="fs-4">{{$article->title}}</h2>
                            <h3 class="fs-5">{{ucfirst($article->subtitle)}}</h3>
                            @if($article->category)
                                <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}" class="text-muted fst-italic text-capitalize text-decoration-none">{{$article->category->name}}</a>
                            @else
                                <p class="small text-muted fst-italic text-capitalize ">
                                    Non categorizzato
                                </p>
                            @endif 
                            <p><span class="fs-5 text-muted small fst-italic text-articles">Tempo di lettura: {{$article->readDuration()}} min</span></p>
                                <p class="small fst-italic text-capitalize">
                                    @foreach($article->tags as $tag)
                                        #{{$tag->name}}
                                    @endforeach
                                </p>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary text-white ms-auto">Leggi</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="width-100"><img src="{{ asset('images/img-profilo.jpg') }}" class="img-fluid max-height-100" alt="Image 5" style="max-height: 250px"></div>
                        <h1 class="text-primary"><a href="{{ route('article.byUser', ['user' => $article->user->id]) }}" class="text-muted fst-italic text-capitalize fs-5 text-decoration-none text-articles">Redattore:
                            {{$article->user->name}}
                        </a></h1>
                        <p class="text-muted text-articles">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                        <div class="d-flex justify-content-between mt-4">
                            <ul class="list-unstyled d-flex">
                                <li class="me-2"><a href="#"><i class="fa-brands fa-facebook fa-lg"></i></a></li>
                                <li class="me-2"><a href="#"><i class="fa-brands fa-linkedin fa-lg"></i></a></li>
                                <li class="me-2"><a href="#"><i class="fa-brands fa-instagram fa-lg" style="color: #be232b;"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                 @endforeach   
            </div>  

</x-layout>
