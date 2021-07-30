@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    @include('admin.partials.messages')
    @include('admin.partials.breadcrumbs')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            {{ !empty(request()->segment(4)) ? Str::of(request()->segment(4))->title() : '' }} {{ Str::of(request()->segment(2))->title()->singular() }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.events.update', $event) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select class="form-control" name="user_id" id="user_id">
                        @foreach( $users as $user)
                            <option value="{{ $user->id }}"
                                @if(old('user_id') && old('user_id') === $user->id)
                                    selected
                                @elseif($user->id === $event->user_id)
                                    selected
                                @endif
                            >{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter event name" value="{{ old('name') ? old('name') : $event->name }}">
                </div>
                <div class="form-group">
                    <label for="stream_url">Stream Url</label>
                    <input type="datetime" class="form-control" id="stream_url" name="stream_url" placeholder="Event stream url" value="{{ old('stream_url') ? old('stream_url') : $event->stream_url }}">
                </div>
                <div class="form-group">
                    <label for="event_start">Start date</label>
                    <input type="text" class="form-control datetime" id="event_start" name="event_start" placeholder="Event start date/time" value="{{ old('event_start') ? old('event_start') : $event->event_start }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
