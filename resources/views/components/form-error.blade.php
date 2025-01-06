@props(['name'])

@error($name)
    <div class="text-red-500 font-semibold mt-1">{{ $message }}</div>
@enderror
