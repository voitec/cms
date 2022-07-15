@if (session('error'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <i class="fa  fa-times-circle" aria-hidden="true"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
@if (session('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible" role="alert">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
@if (session('status'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-primary alert-dismissible" role="alert">
                <i class="fa fa-comments" aria-hidden="true"></i>
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
