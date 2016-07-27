@foreach ($errors->all() as $error)
    <ul class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <li>{{ $error }}</li>
    </ul>
@endforeach