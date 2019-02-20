@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex">
                        <div class="mr-auto p-2">
                            Emails
                        </div> 
                        <div class="p-2">
                            <a class="btn btn-primary" href="{{url('/mails/create')}}" role="button" >
                            Send Message
                            </a>
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
                            @if($doc->status == 0)
                                <tr>
                                    <td><h2>{{ $doc->toUser->email}}</h2></td>
                                    <td><h2>{{ $doc->mail_body }}</h2></td>
                                    <td><h2>
                                        
                                        <a href="{{ url('mails/view/'.$doc->id) }}">
                                            <button type="button" class="btn btn-primary btn-sm"><i class="material-icons">
                                                    view
                                            </i></button>
                                        </a>
                                        <a href="{{ url('mails/delete/'.$doc->id) }}">
                                            <button type="button" class="btn btn-danger btn-sm"><i class="material-icons">
                                                    delete
                                            </i></button>
                                        </a>
                                        </h2>
                                    </td>
                                    
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $doc->toUser->email}}</td>
                                    <td>{{ $doc->mail_body }}</td>
                                    <td>
                                    
                                    <a href="{{ url('mails/view/'.$doc->id) }}">
                                            <button type="button" class="btn btn-primary btn-sm"><i class="material-icons">
                                                    view
                                            </i></button>
                                        </a>
                                    
                                    <a href="{{ url('mails/delete/'.$doc->id) }}">
                                            <button type="button" class="btn btn-danger btn-sm"><i class="material-icons">
                                                    delete
                                            </i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                            
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
