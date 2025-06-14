<?php
namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class ShortLinkController extends Controller
{
    public function index()
    {
        $links = ShortLink::where('user_id', Auth::id())->latest()->paginate(10);
        return view('shortlinks.index', compact('links'));
    }

    public function create()
    {
        return view('shortlinks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
            'custom_code' => 'nullable|alpha_num|unique:short_links,short_code',
        ]);

        $shortCode = $request->custom_code ?? Str::random(6);

        ShortLink::create([
            'user_id' => Auth::id(),
            'original_url' => $request->original_url,
            'short_code' => $shortCode,
            'is_custom' => $request->filled('custom_code'),
        ]);

        return redirect()->route('short-links.index')->with('success', 'Short link berhasil dibuat.');
    }

    public function edit(ShortLink $shortLink)
    {
        $this->authorize('update', $shortLink);
        return view('shortlinks.edit', compact('shortLink'));
    }

    public function update(Request $request, ShortLink $shortLink)
    {
        $this->authorize('update', $shortLink);

        $request->validate([
            'original_url' => 'required|url',
        ]);

        $shortLink->update([
            'original_url' => $request->original_url,
        ]);

        return redirect()->route('short-links.index')->with('success', 'Short link diperbarui.');
    }

    public function destroy(ShortLink $shortLink)
    {
        $this->authorize('delete', $shortLink);
        $shortLink->delete();

        return redirect()->route('short-links.index')->with('success', 'Short link dihapus.');
    }
}
