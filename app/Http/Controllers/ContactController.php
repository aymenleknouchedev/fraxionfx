<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('dashboard.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('dashboard.contacts.show', compact('contact'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'nullable|string|max:20',
                'subject' => 'nullable|string|max:255',
                'message' => 'required',
            ]);

            Contact::create($validated);

            // Always return JSON for non-form requests
            if ($request->isXmlHttpRequest() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Message sent successfully!'
                ]);
            }

            return redirect('/#contact')->with('success', 'Message sent successfully! We will get back to you soon.');
        } catch (\Exception $e) {
            // Return JSON error response
            if ($request->isXmlHttpRequest() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 422);
            }

            return back()->withErrors('Error: ' . $e->getMessage());
        }
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
