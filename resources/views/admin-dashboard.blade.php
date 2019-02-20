@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <label for="user">Total User: </label>
                        <div class="col-md-6">
                            <h3>{{$totalUser}}</h3>
                        </div>
                    </div>

                    <div class="row">
                        <label for="user">Total Block User: </label>
                        <div class="col-md-6">
                            <h3>{{$blockUser}}</h3>
                        </div>
                    </div>

                    <div class="row">
                        <label for="user">Total UnBlock User: </label>
                        <div class="col-md-6">
                            <h3>{{$unblockUser}}</h3>
                        </div>
                    </div>

                    <div class="row">
                        <label for="user">Total Mail: </label>
                        <div class="col-md-6">
                            <h3>{{$totalMail}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
