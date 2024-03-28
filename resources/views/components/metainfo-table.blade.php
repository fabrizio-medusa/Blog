<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col" class="text-articles">#</th>
            <th scope="col" class="text-articles">Nome Tag</th>
            <th scope="col" class="text-articles">Articoli collegati</th>
            <th scope="col" class="text-articles">Aggiorna</th>
            <th scope="col" class="text-articles">Cancella</th>
        </tr>
    </thead>

    <tbody>
        @foreach($metaInfos as $metaInfo)
            <tr>
                <th scope="row">{{ $metaInfo->id }}</th>
                <td> {{ $metaInfo->name }} </td>
                <td> {{ count($metaInfo->articles) }} </td>
                @if ($metaType == 'tags')
                    <td>
                        <form action="{{route('admin.editTag', ['tag' => $metaInfo])}}" method="POST" class="text-articles">
                            @csrf
                            @method('put')
                            <input type="text" name="name" placeholder="Nuovo Tag" class="form-control w-50 d-inline ">
                            <button type="submit" class="btn btn-info text-white text-articles">Aggiorna</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('admin.deleteTag', ['tag' => $metaInfo])}}" method="POST" class="text-articles">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger text-white text-articles">Elimina</button>
                        </form>
                    </td>
                    @else
                    <td>
                        <form action="{{route('admin.editCategory', ['category' => $metaInfo])}}" method="POST" class="text-articles">
                            @csrf
                            @method('put')
                            <input type="text" name="name" placeholder="Nuova Categoria" class="form-control w-50 d-inline my-1">
                            <button type="submit" class="btn btn-info text-white text-articles">Aggiorna</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('admin.deleteCategory', ['category' => $metaInfo])}}" method="POST" class="text-articles">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger text-white text-articles ">Elimina</button>
                        </form>
                    </td>
                @endif    
            </tr>
        @endforeach    
    </tbody>
</table>