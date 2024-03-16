@if(session()->has('danger'))
    <div class="alert alert-danger mt-5">
        {{ session('danger')}}
    </div>
@endif