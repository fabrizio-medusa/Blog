<x-layout>
    <div class="container-fluid p-0 position-relative">
        <img src="{{ asset('images/banner-bg.png') }}" alt="The Aulab Post Background" class="img-fluid w-100">
        
        <div class="container-fluid p-5 text-center text-white position-absolute top-50 start-50 translate-middle">
            <div class="row justify-content-center">
                <div class="position-relative">
                    <div class="image-with-text">
                        The Aulab Post
                    </div>
                    <img src="{{ asset('images/banner-img.png') }}" alt="The Aulab Post" class="img-fluid center-image">
                </div>
            </div>
        </div>
    </div>
        
    <div class="fs-1 text-center text-dark mt-2">{{ucfirst($category->name)}}</div>
            <div class="container mt-3">
                @foreach($articles as $article)
                    <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <img src="{{Storage::url($article->image)}}" class="img-fluid w-100 my-height mb-2" alt="Article Image">
                            <p class="text-muted mt-2">Scritto il {{$article->created_at->format('d/m/Y')}}</p>
                            <h2 class="fs-4">{{$article->title}}</h2>
                            <h3 class="fs-5">{{$article->subtitle}}</h3>
                            <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}" class="text-muted fst-italic text-capitalize text-decoration-none">{{$article->category->name}}</a>
                        <div class="d-flex justify-content-between mt-4">
                            <ul class="list-unstyled d-flex">
                                <li class="me-2"><a href="#"><i class="fa-brands fa-facebook fa-lg"></i></a></li>
                                <li class="me-2"><a href="#"><i class="fa-brands fa-twitter fa-lg"></i></a></li>
                                <li class="me-2"><a href="#"><i class="fa-brands fa-linkedin fa-lg"></i></a></li>
                                <li class="me-2"><a href="#"><i class="fa-brands fa-instagram fa-lg"></i></a></li>
                            </ul>
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary text-white ms-auto">Leggi</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="width-100"><img src="{{ asset('images/img-profilo.jpg') }}" class="img-fluid max-height-100" alt="Image 5" style="max-height: 250px"></div>
                        <h1 class="text-primary"><a href="{{ route('article.byUser', ['user' => $article->user->id]) }}" class="text-muted fst-italic text-capitalize fs-5 text-decoration-none">Redattore:
                            {{$article->user->name}}
                        </a></h1>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                    </div>
                    </div>
                 @endforeach   
            </div>  

</x-layout>
