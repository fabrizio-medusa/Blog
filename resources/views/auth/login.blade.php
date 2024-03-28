<x-layout title="Accedi">

    <div class="container-fluid first-container">
        <div class="row mt-5">
          <div class="col-sm-12">
            <div class="row justify-content-center second-container align-items-center"> 
              <div class="col-md-5">
                <h1 class="display-4 my-font-title text-white">The Aulab Post</h1>
              </div>
              <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-header text-articles">
                        Accedi
                    </div>
                    <div class="card-body">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 text-start">
                                    <label for="email" class="text-articles">
                                        <i class="fa-regular fa-envelope fa-xs"></i>
                                        Email
                                    </label>
                                    <input type="email" name="email" id="email" value="{{old ('email')}}" class="form-control">
                                    @error('email') <span class="text-danger small"> {{ $message }} </span>@enderror
                                </div>
                                <div class="col-12 text-start">
                                    <label for="password" class="text-articles">
                                        <i class="fa-solid fa-key fa-xs"></i>
                                        Password
                                    </label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password') <span class="text-danger small"> {{ $message }} </span>@enderror
                                </div>
                                <div class="col-12 text-start">
                                    <button type="submit" class="btn btn-primary text-articles">Accedi</button>
                                    <p class="small mt-2 text-articles">Non sei registrato <a href="{{route('register')}}">Clicca qui!</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>    
</x-layout>


