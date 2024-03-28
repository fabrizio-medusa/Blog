<x-layout>

    <div class="container-fluid p-0 position-relative">
        <img src="{{ asset('images/banner-bg.png') }}" alt="The Aulab Post Background" class="img-fluid w-100">
        <div class="position-absolute top-50 start-50 translate-middle" style="width: 75%;">
            <img src="{{ asset('images/banner-img.png') }}" alt="The Aulab Post" class="img-fluid">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white" style="z-index: 1;">
            <span class="display-4 my-font-title">Dashboard Amministratore</span>
        </div>
    </div>
    
    
    <div class="container my-5">
        <x-success />
        <x-warning />
        <x-danger />
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo amministratore</h2>
                <x-requests-table :roleRequests="$adminRequests" role="amministratore" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo revisore</h2>
                <x-requests-table :roleRequests="$revisorRequests" role="revisore" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo redattore</h2>
                <x-requests-table :roleRequests="$writerRequests" role="redattore" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>I tags della piattaforma</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tags" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Le categorie della piattaforma</h2>
                <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
                <form action="{{route('admin.storeCategory')}}" class="d-flex" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
                    <button class="btn btn-success text-white" type="submit">Aggiungi</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>