<x-layout>
    <div class="container mt-5">
        <div class="row">
            <h2 class="text-black mt-5">Benvenuto <strong>{{ auth()->user()->name }}</strong></h2>
                <x-success />
                <x-danger />
        </div>
    </div>


</x-layout>