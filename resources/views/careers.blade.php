<x-layout>
    <div class="container-fluid p-0 position-relative mt-5">
        <img src="{{ asset('images/banner-bg.png') }}" alt="The Aulab Post Background" class="img-fluid w-100">
        <div class="position-absolute top-50 start-50 translate-middle" style="width: 75%;">
            <img src="{{ asset('images/banner-img.png') }}" alt="The Aulab Post" class="img-fluid">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white" style="z-index: 1;">
            <span class="display-4 my-font-title">Lavora con noi</span>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center align-items-center border rounded p-2 shadow">
            <div class="col-12 col-md-6">
                <h2 class="text-articles">Lavora come amministratore</h2>
                <p class="text-articles ">Cosa farai: Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem culpa facilis neque qui asperiores ipsam praesentium quod voluptatem. Illum praesentium at adipisci doloremque, quidem eum dolores voluptatum molestias vitae reiciendis.</p>
                <h2 class="text-articles">Lavora come revisore</h2>
                <p class="text-articles ">Cosa farai: Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem culpa facilis neque qui asperiores ipsam praesentium quod voluptatem. Illum praesentium at adipisci doloremque, quidem eum dolores voluptatum molestias vitae reiciendis.</p>
                <h2 class="text-articles">Lavora come redattore</h2>
                <p class="text-articles">Cosa farai: Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem culpa facilis neque qui asperiores ipsam praesentium quod voluptatem. Illum praesentium at adipisci doloremque, quidem eum dolores voluptatum molestias vitae reiciendis.</p>
            </div>
            <div class="col-12 col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="p-5" action="{{ route('careers.submit') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="role" class="form-label text-articles">Per quale ruolo ti stai candidando?</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Scegli qui</option>
                            <option value="admin">Amministratore</option>
                            <option value="revisor">Revisore</option>
                            <option value="writer">Redattore</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-articles ">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email') ?? Auth::user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label text-articles">Parlaci di te</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control">{{old('message')}}</textarea>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-info text-white text-articles ">Invia la candidatura</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>