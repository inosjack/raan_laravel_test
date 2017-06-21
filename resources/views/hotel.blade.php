


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>{{ ucfirst($hotel->name) }} Details</h3>
                    </div>

                    <div class="panel-body">
                                <b>Name: {{ $hotel->name }}</b><br>
                                <b>Owner: {{ $hotel->owner }}</b><br>
                                <b>Email: {{ $hotel->email }}</b><br>
                                <b>Contact: {{ $hotel->contact }}</b><br>
                                <b>Address: {{ $hotel->address }}</b><br>

                        <h3>Comments</h3>
                        @foreach($hotel->comments as $comment)
                            <p><b>{{ $comment->user->name }}</b>: {!! $comment->comment !!}</p>
                        @endforeach

                        @if(Auth::check())
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('hotel.comment') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">

                                <div class="col-md-12">
                                    <label for="comment" class="control-label">Comments On Hotel:</label>
                                    <textarea name="comment" class="form-control" placeholder="Comment goes here..."></textarea>

                                    @if ($errors->has('comment'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Post
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
