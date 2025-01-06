{{-- @extends('components.layout')

@section('heading')
    Hello Page
@endsection

@section('content')
    <h1>Hello From the Home Page</h1>
@endsection --}}

<x-layout>

    <x-slot:heading>
        Home Page
    </x-slot:heading>


    <h1>Hello From the Home Page</h1>

    {{-- @foreach ($jobs as $job)
        <li><strong>{{$job['title']}}</strong> pays: {{$job['salary']}} per a year</li>
    @endforeach --}}

</x-layout>
