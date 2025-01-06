<x-layout>

    <x-slot:heading>
        Create a Job
    </x-slot:heading>



    <form method="POST" action="{{route('job.store')}}">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Creat a New Job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">We just need A handful details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">title</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="title" id="title" placeholder="CEO" required />
                        </div>

                        <x-form-error name="title" />

                    </x-form-field>


                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="salary" id="salary" placeholder="$50,000 USD" required />
                        </div>

                        <x-form-error name="salary" />

                    </x-form-field>



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

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{route('job.index')}}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <x-form-button>Save</x-form-button>
            </div>
    </form>





</x-layout>
