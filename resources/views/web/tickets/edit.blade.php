@extends('layouts.app', [
    'title' => __('Edit Ticket') . ' - ' . $ticket->id,
    'columnSize' => 'col-lg-8',
])

@section('content')
    <x-errors/>

    <form method="POST" action="{{ route('tickets.update', $ticket) }}">
        @csrf
        @method('PATCH')

        <x-tickets.form :ticket="$ticket" :agents="$agents"/>

        <hr/>

        <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
    </form>
@endsection
