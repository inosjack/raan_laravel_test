


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Owner</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotels as $hotel)
                                <tr>
                                    <th><a>{{ $hotel->name }}</a></th>
                                    <th>{{ $hotel->owner }}</th>
                                    <th>{{ $hotel->email }}</th>
                                    <th>{{ $hotel->contact }}</th>
                                    <th>{{ $hotel->address }}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
