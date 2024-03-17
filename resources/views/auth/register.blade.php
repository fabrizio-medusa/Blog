<x-layout title="Registrati">

    <div class="container-fluid p-0 position-relative mb-5">
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
                    <div class="card">
                        <div class="card-header">
                            Registrati
                        </div>
                        <div class="card-body">
                            <form action="/register" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="name">Nome</label>
                                        <input type="text" name="name" id="name" value="{{old ('name')}}" class="form-control">
                                        @error('name') <span class="text-danger small"> {{ $message }} </span>@enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control">
                                        @error('email') <span class="text-danger small"> {{ $message }} </span>@enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                        @error('password') <span class="text-danger small"> {{ $message }} </span>@enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="password_confirmation">Conferma Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                        @error('password') <span class="text-danger small"> {{ $message }} </span>@enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Registrati</button>
                                        <p class="small mt-2">Se sei già registrato <a href="{{route('login')}}"> Clicca qui!</a> </p>
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
