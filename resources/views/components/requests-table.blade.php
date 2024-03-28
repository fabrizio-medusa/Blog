<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col" class="text-articles">#</th>
            <th scope="col" class="text-articles">Nome</th>
            <th scope="col" class="text-articles">Email</th>
            <th scope="col" class="text-articles">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roleRequests as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @switch($role)
                        @case('amministratore')
                            <form action="{{ route('admin.setAdmin', compact('user')) }}" method="POST" class="text-articles">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-info text-white text-articles">Attiva {{$role}}</button>
                            </form>
                            @break

                        @case('revisore')
                            <form action="{{ route('admin.setRevisor', compact('user')) }}" method="POST" class="text-articles">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-info text-white text-articles">Attiva {{$role}}</button>
                            </form>
                            @break
                        @case('redattore')
                            <form action="{{ route('admin.setWriter', compact('user')) }}" method="POST" class="text-articles">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-info text-white text-articles ">Attiva {{$role}}</button>
                            </form>
                            @break
                            
                    @endswitch
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>