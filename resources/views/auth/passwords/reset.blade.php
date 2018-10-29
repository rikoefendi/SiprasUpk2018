@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row a">
        <div class="col-8 pull-2">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body reset-pass col-12">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="text" class="validate- input-effects" name="email" value="{{ $email or old('email') }}" required autofocus>
                                <label>E-Mail Address</label>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="validate input-effects" name="password" required>
                                <label for="password" class="col-md-4 control-label">Password</label>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="input-field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>
                                <input type="password" class="validate input-effects" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <div class="col-8 pull-2" style="margin-top:30px">
                                <button type="submit" class="btn btn-blue">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
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
