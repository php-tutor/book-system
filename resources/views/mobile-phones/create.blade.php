@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Mobile phones
                        <a href="{{ URL::to('mobile-phones') }}" class="pull-right">List all</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @if ($errors->first('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif




                        <form method="post" action="{{url('mobile-phones')}}">
                            {{csrf_field()}}
                            <input type="text" placeholder="name" name="name">

                            @if ($errors->first('manufacturer_id'))
                                <div class="alert alert-danger">{{ $errors->first('manufacturer_id') }}</div>
                            @endif

                          <?php if (!empty($allManufacturers)):?>
                            <select name="manufacturer_id" class="form-control">
                              <?php foreach($allManufacturers as $key => $value):?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                              <?php endforeach; ?>
                            </select>
                          <?php endif; ?>

                            <input type="submit" class="btn btn-primary">
                        </form>












                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
