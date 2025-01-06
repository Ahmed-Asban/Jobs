{{-- @extends('components.layout')

@section('heading')
    About Page
@endsection


@section('content')
    <h1>Hello From the About Page</h1>
@endsection --}}

<x-layout>

    <x-slot:heading>
        Job
    </x-slot:heading>


    {{-- <h1>{{ $job->employer->name }}</h1> --}}
    <h2 class="font-bold text-lg">{{ $job->title }}</h2>

    <p>
        This job pays {{ $job->salary }} per a year
    </p>


    @can('edit', $job)
        <p class="mt-6">
            <x-button href="{{ route('job.edit', ['job' => $job]) }}">Edit job</x-button>
        </p>
    @endcan




</x-layout>
