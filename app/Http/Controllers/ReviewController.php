<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /**
     * Show all reviews for the user
     */
    public function index()
    {
        $reviews = Auth::user()->reviews()->orderBy('created_at', 'desc')->get();
        return view('dashboard.reviews', compact('reviews'));
    }

    /**
     * Store a new review
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:100',
            'client_title' => 'nullable|string|max:100',
            'client_company' => 'nullable|string|max:100',
            'message' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
            'client_image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $validated['user_id'] = Auth::id();

        // Handle image upload
        if ($request->hasFile('client_image')) {
            $path = $request->file('client_image')->store('reviews', 'public');
            $validated['client_image'] = $path;
        }

        Review::create($validated);

        return redirect()->route('reviews.index')
                       ->with('success', 'Review added successfully!');
    }

    /**
     * Update a review
     */
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:100',
            'client_title' => 'nullable|string|max:100',
            'client_company' => 'nullable|string|max:100',
            'message' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
            'client_image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('client_image')) {
            if ($review->client_image) {
                Storage::disk('public')->delete($review->client_image);
            }
            $path = $request->file('client_image')->store('reviews', 'public');
            $validated['client_image'] = $path;
        }

        $review->update($validated);

        return redirect()->route('reviews.index')
                       ->with('success', 'Review updated successfully!');
    }

    /**
     * Delete a review
     */
    public function destroy(Review $review)
    {
        // Delete image if exists
        if ($review->client_image) {
            Storage::disk('public')->delete($review->client_image);
        }

        $review->delete();

        return redirect()->route('reviews.index')
                       ->with('success', 'Review deleted successfully!');
    }
}
