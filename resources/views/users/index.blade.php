@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex">
                        <div class="mr-auto p-2">
                            All Users
                        </div> 
                        <!-- <div class="p-2">
                            <a class="btn btn-primary" href="{{url('/document/create')}}" role="button" >
                            New Doc
                            </a>
                        </div> -->
                    </div>
                </div>

                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $doc)
                            <tr>
                                <td>{{ $doc->name}}</td>
                                <td>{{ $doc->email }}</td>
                                <td>
                                    <a href="{{url('users/active/'.$doc->id)}}">
                                        <button type="button" class="btn btn-primary">
                                            <?php
                                                if($doc->active == 1){
                                                    echo "active";
                                                }else{
                                                    echo "Inactive";
                                                }
                                            ?>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                        @if($doc->active == 1)
                                            <a href="{{url('users/active/'.$doc->id)}}" >
                                                <button type="button" class="btn btn-primary btn-sm">
                                                    active
                                                </button>
                                            </a>
                                        @else
                                            <a href="{{url('users/active/'.$doc->id)}}" >
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    Inactive
                                                </button>
                                            </a>
                                        @endif
                                    
                                    <a href="{{ url('users/delete/'.$doc->id) }}">
                                        <button type="button" class="btn btn-danger btn-sm"><i class="material-icons">
                                                delete
                                        </i></button>
                                    </a>
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
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
