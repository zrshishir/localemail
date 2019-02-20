@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sending Message') }}</div>
               
                <div class="card-body">
                    

                        <div class="form-group row">
                            <div class="col-md-6">
                               <h5>Email From: {{$changeStatus->from->email}}</h5>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <p>{{  $changeStatus->mail_body }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <a href="{{ url('mails') }}">
                                    <button type="button" class="btn btn-primary btn-sm"><i class="material-icons">
                                            back
                                    </i></button>
                                </a>
                            </div>
                            
                        </div>
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
