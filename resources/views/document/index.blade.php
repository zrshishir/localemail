@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex">
                        <div class="mr-auto p-2">
                            Documents Admin Table
                        </div> 
                        <div class="p-2">
                            <a class="btn btn-primary" href="{{url('/document/create')}}" role="button" >
                            New Doc
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Document</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($documents as $doc)
                            <tr>
                                <td>{{ $doc->title}}</td>
                                <td>{{ $doc->description }}</td>
                                <td><a href="{{asset('public/imports').'/'.$doc->path}}">download</a></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"><i class="material-icons">
                                            border_color
                                            </i></button>
                                    <button type="button" class="btn btn-secondary btn-sm"><i class="material-icons">
                                            delete
                                            </i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Document</th>
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
})(jQuery);
   
</script>
@endsection
