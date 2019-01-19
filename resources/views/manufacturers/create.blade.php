@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Manufacturer
                        <a href="{{ URL::to('manufacturers') }}" class="pull-right">List all</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @if ($errors->first('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif





                        {{ $errors->first('name') }}


                        <form method="post" action="{{url('manufacturers')}}">
                            {{csrf_field()}}
                            <input type="text" placeholder="name" name="name">
                            <input type="submit" class="btn btn-primary">
                        </form>












                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
