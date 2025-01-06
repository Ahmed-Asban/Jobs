<x-layout>

    <x-slot:heading>
        Edit a Job: {{ $job->title }}
    </x-slot:heading>



    <form method="POST" action="{{route('job.update', ['job' => $job])}}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">


                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                                    placeholder="Shift Leader" required value="{{ $job->title }}">
                            </div>
                        </div>
                        @error('title')
                            <div class="text-red-500 font-semibold mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="salary" id="salary"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                                    placeholder="$50,000 USD" required value="{{ $job->salary }}">
                            </div>
                            @error('salary')
                                <div class="text-red-500 font-semibold mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div>
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-red-500 italic">{{ $error }}</li>
                    @endforeach
                </ul>

                @endif
              </div> --}}


                    </div>
                </div>




            </div>

            <div class="mt-6 flex items-center justify-between gap-x-6">

                <div class="flex items-center">

                    <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>

                </div>

                <div class="flex items-center gap-x-6">
                    <a href="{{route('job.show', ['job' => $job])}}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>

                </div>
            </div>
    </form>

    <form method="POST" id="delete-form" action="{{route('job.destroy', ['job' => $job])}}" class="hidden">
        @csrf
        @method('DELETE')
    </form>





</x-layout>
