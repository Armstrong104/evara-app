@if (Session::get('msg'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('msg') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
