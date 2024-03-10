<x-layout title="Accedi">

    <div class="container-fluid p-0 position-relative">
        <img src="{{ asset('images/banner-bg.png') }}" alt="The Aulab Post Background" class="img-fluid w-100">
        
        <div class="container position-absolute top-50 start-50 translate-middle">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 text-center position-relative">
                    <img src="{{ asset('images/banner-img.png') }}" alt="The Aulab Post" class="img-fluid">
                    <div class="position-absolute top-50 start-50 translate-middle text-center" style="z-index: 2; color: white;">
                        <h1 class="display-4">The Aulab Post</h1>
                    </div>
                </div>
                <div class="col-12 col-lg-4 my-auto pe-lg-5">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            Accedi
                        </div>
                        <div class="card-body">
                            <form action="/login" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12 text-start">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="{{old ('email')}}" class="form-control">
                                        @error('email') <span class="text-danger small"> {{ $message }} </span>@enderror
                                    </div>
                                    <div class="col-12 text-start">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                        @error('password') <span class="text-danger small"> {{ $message }} </span>@enderror
                                    </div>
                                    <div class="col-12 text-start">
                                        <button type="submit" class="btn btn-primary">Accedi</button>
                                        <p class="small mt-2">Non sei registrato <a href="{{route('register')}}">Clicca qui!</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
</x-layout>


