<x-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
            <h1 class="mb-4 mt-5">Crea un nuovo articolo</h1>

        <x-success />
        <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" id="title" value=" {{ old('title') }} " class="form-control @error('title') is-invalid @enderror">
                    @error('title') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="title">Sottotitolo</label>
                    <input type="text" name="subtitle" id="subtitle" value=" {{ old('subtitle') }} " class="form-control @error('subtitle') is-invalid @enderror">
                    @error('subtitle') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="categories">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                            @endforeach
                            @error('category') <span class="text-danger small"> {{ $message }}</span>@enderror
                        </select>
                </div>
                <div class="col-12">
                    <label for="image">Immagine</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="tags">Tags</label>
                    <input name="tags" id="tags" class="form-control" value="{{ old('tags') }}">
                    <span class="small fst-italic">Dividi ogni tag con una virgola</span>
                    @error('image') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="body">Corpo</label>
                    <textarea name="body" id="body" rows="10" class="form-control">{{ old('body')}}</textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary ">Salva</button>
                    <p class="mt-2"><a href="{{route('homepage')}}" class="btn btn-outline-info">Torna alla Home</a></p>
                </div>
            </div>
        </form>
            </div>
        </div>
    </div>

</x-layout>