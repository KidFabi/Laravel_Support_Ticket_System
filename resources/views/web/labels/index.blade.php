@extends('layouts.app', [
    'title' => __('Labels'),
])

@section('content')
    <x-errors/>

    @can ('create', \App\Models\Label::class)
        <a href="{{ route('labels.create') }}" class="btn btn-primary mb-3">
            {{ __('Create a label') }}
        </a>
    @endcan

    <table class="table table-bordered text-center">
        <thead class="thead-light">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Created on') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($labels as $label)
                <tr>
                    <td>
                        {{ $label->id }}
                    </td>
                    <td>
                        @can ('update', $label)
                            <a href="{{ route('labels.edit', $label) }}">
                                {{ $label->name }}
                            </a>
                        @else
                            {{ $label->name }}
                        @endcan
                    </td>
                    <td>
                        <x-datetime :date="$label->created_at"/>
                    </td>
                </tr>
            @empty
                <td colspan="3">
                    {{ __('No labels have been created yet.') }}
                </td>
            @endforelse
        </tbody>
    </table>

    <x-pagination :collection="$labels"/>
@endsection
