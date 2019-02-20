@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sending Message') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('mails/store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="to" class="col-md-4 col-form-label text-md-right">{{ __('Receiver E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="to" type="text" class="form-control{{ $errors->has('to') ? ' is-invalid' : '' }}" name="to" value="{{ old('to') }}" required>

                                @if ($errors->has('to'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mail_body" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <textarea id="mail_body" type="text" class="form-control{{ $errors->has('mail_body') ? ' is-invalid' : '' }}" name="mail_body" value="{{ old('mail_body') }}" required autofocus></textarea>

                                @if ($errors->has('mail_body'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mail_body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
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
