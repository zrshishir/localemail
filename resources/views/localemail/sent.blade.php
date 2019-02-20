@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex">
                        <div class="mr-auto p-2">
                            Sent Emails
                        </div> 
                        
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>From</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($documents as $doc)
                            
                                <tr>
                                    <td>{{ $doc->toUser->email}}</td>
                                    <td>{{ $doc->mail_body }}</td>
                                    <td>
                                    
                                  
                                    
                                </tr>
                           
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>From</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
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
    
});
   
</script>
@endsection
