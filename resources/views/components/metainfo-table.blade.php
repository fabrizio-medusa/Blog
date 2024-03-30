<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col" class="text-articles">#</th>
            <th scope="col" class="text-articles text-center">Nome Tag</th>
            <th scope="col" class="text-articles text-center">Articoli collegati</th>
            <th scope="col" class="text-articles text-center">Aggiorna</th>
            <th scope="col" class="text-articles text-center">Cancella</th>
        </tr>
    </thead>

    <tbody>
        @foreach($metaInfos as $metaInfo)
            <tr>
                <th scope="row">{{ $metaInfo->id }}</th>
                <td class="text-center"> {{ $metaInfo->name }} </td>
                <td class="text-center"> {{ count($metaInfo->articles) }} </td>
                @if ($metaType == 'tags')
                    <td class="text-center">
                        <form action="{{route('admin.editTag', ['tag' => $metaInfo])}}" method="POST">
                            @csrf
                            @method('put')
                            <input type="text" name="name" placeholder="Nuovo Tag" class="form-control w-50 d-inline">
                            <button type="submit" class="btn btn-info text-white text-articles">Aggiorna</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{route('admin.deleteTag', ['tag' => $metaInfo])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger text-white text-articles">Elimina</button>
                        </form>
                    </td>
                    @else
                    <td class="text-center">
                        <form action="{{route('admin.editCategory', ['category' => $metaInfo])}}" method="POST">
                            @csrf
                            @method('put')
                            <input type="text" name="name" placeholder="Nuova Categoria" class="form-control w-50 d-inline my-1">
                            <button type="submit" class="btn btn-info text-white text-articles">Aggiorna</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{route('admin.deleteCategory', ['category' => $metaInfo])}}" method="POST">
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