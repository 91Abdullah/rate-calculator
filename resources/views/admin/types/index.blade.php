@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 col-md-offset-3">
                @include('admin.partials.alerts')
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Weight Class</h2>
                        <h3>
                            <a href="{{ url('admin/types/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Weight Class</a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Weight Limit (in Kg)</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                @foreach($types as $type)
                                    <tr>
                                        <td>{{ $type->id }}</td>
                                        <td>{{ $type->name }}</td>
                                        <td>{{ $type->weight_limit }}</td>
                                        <td>
                                            <form action="{{ route('types.delete') }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="id" value="{{ $type->id }}">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td><a href="{{ route('types.edit', ['id' => $type->id]) }}" class="btn btn-warning">Edit</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection