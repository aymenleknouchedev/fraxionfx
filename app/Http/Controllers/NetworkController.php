<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NetworkController extends Controller
{
    /**
     * Show the network/social media edit form
     */
    public function show()
    {
        return view('dashboard.network');
    }

    /**
     * Update user social media links
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate input
        $validated = $request->validate([
            'github' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'portfolio' => 'nullable|url|max:255',
            'behance' => 'nullable|url|max:255',
            'dribbble' => 'nullable|url|max:255',
            'codepen' => 'nullable|url|max:255',
        ]);

        // Update user
        $user->update($validated);

        return redirect()->route('network.show')
                       ->with('success', 'Social media links updated successfully!');
    }
}
