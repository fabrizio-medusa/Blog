<x-layout>
    <div class="container-fluid first-container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="row justify-content-center second-container align-items-center"> 
                    <div class="col-md-5">
                        <h1 class="display-4 my-font-title text-white text-center">Profilo {{ Auth::user()->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="container">
            <x-success />
            <div class="row g-3 mt-2">
                <div class="col-md-6 mb-3">
                    <label for="profile_image" class="form-label mt-2 text-articles">Immagine del profilo</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                    @if(Auth::user()->profile_image)
                        <img src="{{ asset('storage/profile_images/' . Auth::user()->profile_image) }}" class="mt-2" style="max-width: 200px;" alt="Immagine del profilo">
                    @else
                         <p class="mt-2 text-articles">Foto profilo non presente</p>
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label text-articles">Raccontaci un pò di te</label>
                    <textarea class="form-control text-articles" id="description" name="description" rows="5">{{ Auth::user()->description ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary text-articles">Salva modifiche</button>
                </div>
            </div>
        </div>
        
    </form>
</x-layout>
