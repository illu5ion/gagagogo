@extends('home.layout')

@section('title', 'Add a facebook name')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">

            @if(Session::has('type'))
                <div class="alert alert-danger">
                    {{ Session::get('message') }}
                </div>
            @endif

            <form action="{{ URL::to('profile/add-facebook-name') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="col-xs-12">
                    <!-- Form Name -->
                    <!-- el -->
                    <div class="form-group">
                        <label class="col-xs-12 pull-left" for="username">Username</label>
                        <div class="col-xs-12">
                            <input id="username" name="username" type="text" value="{{ Input::old('username') }}" placeholder="" class="form-control input-md">
                            <span class="help-block">Please pick an username for yourself.</span>
                        </div>
                    </div>
                    <!-- / el -->


                    <!-- el -->
                    <div class="form-group">
                        <label class="col-xs-12 pull-left" for="email">Email</label>
                        <div class="col-xs-12">
                            <input id="email" name="email" type="email" value="{{ Input::old('email') }}" placeholder="" class="form-control input-md">
                            <span class="help-block">Please pick an email for yourself.</span>
                        </div>
                    </div>
                    <!-- / el -->

                    <button type="submit" class="pull-left btn btn-default">
                        Go
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop