<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Short Link</h2>
    </x-slot>

    <div class="p-4">
        <form action="{{ route('short-links.update', $shortLink) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-2">
                <label>Original URL</label>
                <input type="url" name="original_url" value="{{ $shortLink->original_url }}" class="border w-full p-2" required>
                @error('original_url') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>
            <p>Short Code: <strong>{{ $shortLink->short_code }}</strong></p>
            <button class="bg-blue-500 px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
