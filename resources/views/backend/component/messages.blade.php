@if(session('success'))
    <div class="alert alert-success">
        <span> <b>Success ! </b> {{ session('success') }} </span>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error">
        <span> <b>Error ! </b> {{ session('error') }} </span>
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">
        <span> <b>Warning ! </b> {{ session('warning') }} </span>
    </div>
@endif