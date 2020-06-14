@if(\Session::has('alert-success'))
	<div class="row">
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {{Session::get('alert-success')}}
        </div>
    </div>
@endif
@if(\Session::has('alert'))
	<div class="row">
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {{Session::get('alert')}}
        </div>
    </div>
@endif