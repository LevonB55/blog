@extends('main')

@section('title', '| Forgot my Password')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card form-spacing-top">
                <div class="card-header">Reset Password</div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    {!! Form::open(['url' => 'password/email', 'method' => 'POST']) !!}

                    {{Form::label('email', 'Email Address:')}}
                    {{Form::email('email', null, ['class' => 'form-control'])}}

                    {{Form::submit('Reset Password', ['class' => 'btn btn-primary btn-h1-spacing'])}}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection