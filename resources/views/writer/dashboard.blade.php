<x-layout>

    <div class="container-fluid p-0 position-relative">
        <img src="{{ asset('images/banner-bg.png') }}" alt="The Aulab Post Background" class="img-fluid w-100">
        <div class="position-absolute top-50 start-50 translate-middle" style="width: 75%;">
            <img src="{{ asset('images/banner-img.png') }}" alt="The Aulab Post" class="img-fluid">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white" style="z-index: 1;">
            <span class="display-4 my-font-title">Dashboard Redattore</span>
        </div>
    </div>

    <div class="container my-5">
        <x-success />
        <x-warning />
        <x-danger />
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli in fase di revisione</h2>
                <x-writer-articles-table :articles="$unrevisionedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli pubblicati</h2>
                <x-writer-articles-table :articles="$acceptedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli respinti</h2>
                <x-writer-articles-table :articles="$rejectedArticles"/>
            </div>
        </div>
    </div>

</x-layout>