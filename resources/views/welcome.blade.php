@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex">
                        <div class="mr-auto p-2">
                            Documents
                        </div> 
                        <div class="p-2">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($documents as $doc)
                        <div class="col-sm-2 col-md-3">
                            <div class="card-body border m-2">
                                <h6 class="card-title">{{ $doc->title }}</h6>
                                <p class="card-text">{{ $doc->description }} </p>
                                <!-- <a href="{{ asset('public/imports').'/'. $doc->path }}" class="btn btn-primary">Download</a> -->
                                <a href="#exampleModal" class="btn btn-primary" data-toggle="modal" id="#buttonModal">Download</a>
                            </div>
                        </div>

                        <!-- Modal start-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">User Info</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>
                                            <div class="col-md-6">
                                                <input id="mobile_no" type="text" class="form-control{{ $errors->has('mobile_no') ? ' is-invalid' : '' }}" name="mobile_no">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>
                                                <div class="col-md-6">
                                                    <select class="form-control form-control-sm" id="division_id">
                                                        <option>Small select</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>
                                                <div class="col-md-6">
                                                    <select class="form-control form-control-sm" id="district_id">
                                                        <option>Small select</option>
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal End -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
(function($) {
    $.noConflict();
    $(document).ready(function() {
        $('#example').DataTable();
    } );
})(jQuery);
   
</script>
@endsection