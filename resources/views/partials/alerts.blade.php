<div class="container mt-1">
    @if (session('success'))
        <div class="alert alert-success alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{session('success')}}</strong>
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{session('danger')}}</strong>
        </div>
    @endif

</div>

