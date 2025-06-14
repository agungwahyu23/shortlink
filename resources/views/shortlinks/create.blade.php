<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Buat Short Link</h2>
    </x-slot>

    <div class="p-4">
        <form action="{{ route('short-links.store') }}" method="POST">
            @csrf
            <div class="mb-2">
                <label>Original URL</label>
                <input type="url" name="original_url" class="border w-full p-2" required>
                @error('original_url') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>
            <div class="mb-2">
                <label>Custom Code (opsional)</label>
                <input type="text" name="custom_code" class="border w-full p-2">
                @error('custom_code') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>
            <button class="bg-blue-500 px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
