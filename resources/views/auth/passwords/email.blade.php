@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row a">
        <div class="col-8 pull-2">
                <div class="panel-heading">Reset Password</div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="reset-pass mt-3 col-12">
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="input-field">
                                    <input id="email" type="email" class="validate input-effects" name="email" value="{{ old('email') }}" required>
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <div class="mt-5 col-8 pull-2">
                                    <button type="submit" class="btn btn-blue">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style media="screen">

    .a{
        margin-top: 50px;
    }
    .panel-heading{
        font-size: 2em;
        text-align: center;
    }
    .reset-pass{
        background: #fff;
        box-shadow: 2px 2px 4px rgba(0,0,0,0.4);
        padding-bottom: 20px;
    }
</style>
@endsection
