<x-layout>

    <div class="container-fluid p-0 position-relative mt-5">
        <img src="{{ asset('images/banner-bg.png') }}" alt="The Aulab Post Background" class="img-fluid w-100">
        
        <div class="container-fluid p-5 text-center text-white position-absolute top-50 start-50 translate-middle">
            <div class="row justify-content-center">
                <div class="position-relative">
                    <img src="{{ asset('images/banner-img.png') }}" alt="The Aulab Post" class="img-fluid center-image">
                    <div class="display-4 display-md-2 display-lg-1 position-absolute top-50 start-50 translate-middle">
                        {{$article->title}}
                    </div>
                </div>
            </div>
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
                    @if (Auth::check())
                        @if (Auth::user()->is_revisor)
                            <a href="{{ route('revisor.dashboard') }}" class="btn btn-info text-white my-5"><i class="fa-solid fa-backward" data-bs-toggle="tooltip" data-bs-placement="top" title="Torna indietro"></i></a>
                        @elseif (Auth::user()->is_admin)
                            <a href="{{ route('homepage') }}" class="btn btn-info text-white my-5"><i class="fa-solid fa-backward" data-bs-toggle="tooltip" data-bs-placement="top" title="Torna indietro"></i></a>
                        @else
                            <a href="{{ route('writer.dashboard') }}" class="btn btn-info text-white my-5"><i class="fa-solid fa-backward" data-bs-toggle="tooltip" data-bs-placement="top" title="Torna indietro"></i></a>
                        @endif
                        @else
                        <a href="{{ route('homepage') }}" class="btn btn-info text-white my-5"><i class="fa-solid fa-backward" data-bs-toggle="tooltip" data-bs-placement="top" title="Torna indietro"></i></a>
                    @endif
                </div>
                <div class="d-flex justify-content-between ">
                    @if (Auth::user() && Auth::user()->is_revisor)
                        <form action="{{ route('revisor.acceptArticle', compact('article'))}}" method="POST">
                            @csrf
                            <button class="btn btn-success text-white"><i class="fa-solid fa-check" data-bs-toggle="tooltip" data-bs-placement="top" title="Accetta articolo"></i></button>
                        </form>
                        <form action="{{ route('revisor.rejectArticle', compact('article'))}}" method="POST">
                            @csrf
                            <button class="btn btn-danger text-white"><i class="fa-solid fa-xmark" data-bs-toggle="tooltip" data-bs-placement="top" title="Rifiuta articolo"></i></button>
                        </form>
                    @endif
                </div>
        </div>
    </div>
</x-layout>