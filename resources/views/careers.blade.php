<x-layout>
    <div class="container-fluid p-0 position-relative">
        <img src="{{ asset('images/banner-bg.png') }}" alt="The Aulab Post Background" class="img-fluid w-100">
        
        <div class="container-fluid p-5 text-center text-white position-absolute top-50 start-50 translate-middle">
            <div class="row justify-content-center">
                <div class="position-relative">
                    <img src="{{ asset('images/banner-img.png') }}" alt="The Aulab Post" class="img-fluid center-image">
                    <div class="display-4 display-md-2 display-lg-1 position-absolute top-50 start-50 translate-middle">
                        Lavora con noi
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center align-items-center border rounded p-2 shadow">
            <div class="col-12 col-md-6">
                <h2>Lavora come amministratore</h2>
                <p>Cosa farai: Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem culpa facilis neque qui asperiores ipsam praesentium quod voluptatem. Illum praesentium at adipisci doloremque, quidem eum dolores voluptatum molestias vitae reiciendis.</p>
                <h2>Lavora come revisore</h2>
                <p>Cosa farai: Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem culpa facilis neque qui asperiores ipsam praesentium quod voluptatem. Illum praesentium at adipisci doloremque, quidem eum dolores voluptatum molestias vitae reiciendis.</p>
                <h2>Lavora come redattore</h2>
                <p>Cosa farai: Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem culpa facilis neque qui asperiores ipsam praesentium quod voluptatem. Illum praesentium at adipisci doloremque, quidem eum dolores voluptatum molestias vitae reiciendis.</p>
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
                        <label for="role" class="form-label">Per quale ruolo ti stai candidando?</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Scegli qui</option>
                            <option value="admin">Amministratore</option>
                            <option value="revisor">Revisore</option>
                            <option value="writer">Redattore</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email') ?? Auth::user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Parlaci di te</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control">{{old('message')}}</textarea>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-info text-white">Invia la candidatura</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>