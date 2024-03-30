<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col" class="text-articles">#</th>
            <th scope="col" class="text-articles text-center">Nome</th>
            <th scope="col" class="text-articles text-center">Email</th>
            <th scope="col" class="text-articles text-center">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roleRequests as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td class="text-center">{{$user->name}}</td>
                <td class="text-center">{{$user->email}}</td>
                <td>
                    @switch($role)
                        @case('amministratore')
                        <div class="text-center">
                            <form action="{{ route('admin.setAdmin', compact('user')) }}" method="POST" class="text-articles d-inline-block">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-info text-white text-articles">Conferma</button>
                            </form>
                            <form action="{{ route('admin.reject.request', compact('user')) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-danger text-articles">Rifiuta</button>
                            </form>
                        </div>
                            @break

                        @case('revisore')
                        <div class="text-center">
                            <form action="{{ route('admin.setRevisor', compact('user')) }}" method="POST" class="text-articles d-inline-block">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-info text-white text-articles">Conferma</button>
                            </form>
                            <form action="{{ route('admin.reject.request', compact('user')) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-danger text-articles">Rifiuta</button>
                            </form>
                        </div>
                        
                            @break
                        @case('redattore')
                        <div class="text-center">
                            <form action="{{ route('admin.setWriter', compact('user')) }}" method="POST" class="text-articles d-inline-block">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-info text-white text-articles">Conferma</button>
                            </form>
                            <form action="{{ route('admin.reject.request', compact('user')) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-danger text-articles">Rifiuta</button>
                            </form>
                        </div>
                            @break
                            
                    @endswitch
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>