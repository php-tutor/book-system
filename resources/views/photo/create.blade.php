@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Subject
                        <a href="{{ URL::to('admin/subjects') }}" class="pull-right">List all</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @if ($errors->first('title'))
                            <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                        @endif





                        {{ $errors->first('title') }}


                        <form method="post" action="{{url('photo')}}">
                            {{csrf_field()}}
                            <input type="text" placeholder="title" name="title">
                            <input type="submit" class="btn btn-primary">
                        </form>












                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
