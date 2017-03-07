@extends('layout')

@section('content')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Destination
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <form class="form-inline" method="post" action="{{ route('destinations.create')  }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name of destination e.g Same Zone">
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection