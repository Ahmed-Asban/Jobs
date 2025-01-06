{{-- @extends('components.layout')

@section('heading')
    About Page
@endsection


@section('content')
    <h1>Hello From the About Page</h1>
@endsection --}}

<x-layout>

    <x-slot:heading>
        Jobs List
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="{{route('job.show', ['job' => $job])}}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                <div>
                    <strong>{{ $job['title'] }}</strong> pays: {{ $job['salary'] }} per a year
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>

    </div>





</x-layout>
