@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    @include('admin.partials.messages')
    @include('admin.partials.breadcrumbs')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            {{ !empty(request()->segment(3)) ? Str::of(request()->segment(3))->title() : '' }} {{ Str::of(request()->segment(2))->title()->singular() }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.events.store') }}">
                @csrf
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select class="form-control" name="user_id" id="user_id">
                        @foreach( $users as $user)
                            <option value="{{ $user->id }}"
                                @if(old('user_id') && old('user_id') === $user->id)
                                    selected
                                @endif
                            >{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter event name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="stream_url">Stream Url</label>
                    <input type="datetime" class="form-control" id="stream_url" name="stream_url" placeholder="Event stream url" value="{{ old('stream_url') }}">
                </div>
                <div class="form-group">
                    <label for="start_datetime">Start date/time</label>
                    <input type="text" class="form-control datetime" id="start_datetime" name="start_datetime" placeholder="Event start date/time" value="{{ old('start_datetime') }}">
                </div>
                <div class="form-group">
                    <label for="end_datetime">End date/time</label>
                    <input type="text" class="form-control datetime" id="end_datetime" name="end_datetime" placeholder="Event start date/time" value="{{ old('end_datetime') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
