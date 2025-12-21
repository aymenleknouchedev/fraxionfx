<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectController extends Controller
{
    /**
     * Show the contact information edit form
     */
    public function show()
    {
        return view('dashboard.connect');
    }

    /**
     * Update user contact information
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate input
        $validated = $request->validate([
            'contact_email' => 'nullable|email|max:255',
            'phone1' => 'nullable|string|max:20',
            'phone2' => 'nullable|string|max:20',
            'telegram' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'skype' => 'nullable|string|max:255',
            'discord' => 'nullable|string|max:255',
            'viber' => 'nullable|string|max:20',
        ]);

        // Update user
        $user->update($validated);

        return redirect()->route('connect.show')
                       ->with('success', 'Contact information updated successfully!');
    }
}
