@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        @include('admin.partials.messages')
        @include('admin.partials.breadcrumbs')
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-6 align-self-center">
                        <p class="mb-0"><i class="fas fa-table mr-1"></i> {{ Str::of(request()->segment(2))->title() }}</p>
                    </div>
                    <div class="col-6 align-self-center d-flex justify-content-end">
                        <small><a class="btn btn-success text-sm-center btn-sm" href="{{ route('admin.events.create') }}"><i class="fas fa-plus"></i> Add</a></small>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Start Date/Time</th>
                            <th>End Date/Time</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Start Date/Time</th>
                            <th>End Date/Time</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach( $events as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->start_datetime->format('d/m/Y H:i') }}</td>
                                <td>{{ $event->end_datetime->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.events.edit', $event) }}" title="Attendees"><i class="fa fa-users text-success" aria-hidden="true"></i></a>
                                    <a href="{{ route('admin.events.edit', $event) }}"><i class="fas fa-edit text-info"></i></a>
                                    <a href="{{ route('admin.events.destroy', $event) }}" onclick="event.preventDefault(); document.getElementById('destroy-form-{{$event->id}}').submit();"><i class="fas fa-trash text-danger"></i></a>
                                    <form id="destroy-form-{{$event->id}}" action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
