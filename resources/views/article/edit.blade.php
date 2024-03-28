<x-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
            <h1 class="text-articles mb-4 mt-5">Modifica articolo</h1>

        <x-success />
        <form action="" method="" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="title" class="text-articles">Titolo</label>
                    <input type="text" name="title" id="title" value=" {{$article->title}} " class="form-control @error('title') is-invalid @enderror">
                    @error('title') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="title" class="text-articles">Sottotitolo</label>
                    <input type="text" name="subtitle" id="subtitle" value=" {{$article->subtitle}} " class="form-control @error('subtitle') is-invalid @enderror">
                    @error('subtitle') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="categories" class="text-articles">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($article->category && $category->id == $article->category->id) selected @endif>{{ucfirst($category->name)}}</option>
                            @endforeach
                            @error('category') <span class="text-danger small text-articles"> {{ $message }}</span>@enderror
                        </select>
                </div>
                <div class="col-12">
                    <label for="image" class="text-articles">Immagine</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image') <span class="text-danger small text-articles"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="tags" class="text-articles">Tags</label>
                    <input name="tags" id="tags" class="form-control" value="{{$article->tags->implode('name', ', ')}}">
                    <span class="small text-articles">Dividi ogni tag con una virgola</span>
                    @error('tags') <span class="text-danger small"> {{ $message }}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="body" class="text-articles">Corpo</label>
                    <textarea name="body" id="body" rows="10" cols="30" class="form-control">{{$article->body}}</textarea>
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