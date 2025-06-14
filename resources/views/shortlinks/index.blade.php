<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Daftar Short Link</h2>
    </x-slot>

    <div class="p-4">
        <a href="{{ route('short-links.create') }}" class="bg-blue-500 px-4 py-2 rounded">+ Tambah</a>

        @if(session('success'))
            <div class="mt-2 p-2 bg-green-200">{{ session('success') }}</div>
        @endif

        <table class="w-full mt-4 border">
            <thead>
                <tr>
                    <th class="border p-2">Original URL</th>
                    <th class="border p-2">Short Code</th>
                    <th class="border p-2">Klik</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($links as $link)
                    <tr>
                        <td class="border p-2">{{ $link->original_url }}</td>
                        <td class="border p-2">{{ url('/s/'.$link->short_code) }}</td>
                        <td class="border p-2">{{ $link->clicks }}</td>
                        <td class="border p-2">
                            <a href="{{ route('short-links.edit', $link) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('short-links.destroy', $link) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500" onclick="return confirm('Hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-2">
            {{ $links->links() }}
        </div>
    </div>
</x-app-layout>
