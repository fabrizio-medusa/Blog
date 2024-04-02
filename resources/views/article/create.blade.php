<x-layout>
    <div class="container-fluid first-container">
        <div class="row mt-5">
          <div class="col-sm-12">
            <div class="row justify-content-center second-container align-items-center"> 
              <div class="col-md-5">
                <h1 class="display-4 my-font-title text-white text-center">Crea un nuovo articolo</h1>
              </div>

        
        <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-success />
            <div class="row g-3">
                <div class="col-12">
                    <label for="title" class="text-white text-articles">Titolo</label>
                    <input type="text" name="title" id="title" value=" {{ old('title') }} " class="form-control @error('title') is-invalid @enderror">
                    @error('title') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="title" class="text-white text-articles">Sottotitolo</label>
                    <input type="text" name="subtitle" id="subtitle" value=" {{ old('subtitle') }} " class="form-control @error('subtitle') is-invalid @enderror">
                    @error('subtitle') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="categories" class="text-white text-articles">Categoria</label>
                        <select name="category" id="category" class="form-control text-articles">
                            <option value="text">Scegli una categoria</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                            @endforeach
                            @error('category') <span class="text-danger small"> {{ $message }}</span>@enderror
                        </select>
                </div>
                <div class="col-12">
                    <label for="image" class="text-white text-articles">Immagine</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="tags" class="text-white text-articles">Tags</label>
                    <input name="tags" id="tags" class="form-control" value="{{ old('tags') }}">
                    <span class="small fst-italic text-white text-articles">Dividi ogni tag con una virgola</span>
                    @error('tags') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="body" class="text-white text-articles">Scrivi qui il tuo articolo</label>
                    <textarea name="body" id="body" rows="10" class="form-control">{{ old('body')}}</textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary text-articles">Salva</button>
                    <p class="mt-2"><a href="{{route('homepage')}}" class="btn btn-outline-info text-articles">Torna alla Home</a></p>
                </div>
            </div>
        </form>
            </div>
        </div>
    </div>

</x-layout>