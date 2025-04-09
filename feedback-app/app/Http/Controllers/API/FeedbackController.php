<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $query = Feedback::latest();

        // Filter by rating if provided
        if ($request->has('rating') && $request->rating >= 1 && $request->rating <= 5) {
            $query->where('rating', $request->rating);
        }

        $feedback = $query->take(10)->get();

        return response()->json($feedback);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'happiness_rating' => 'required|integer|min:1|max:5'
        ]);

        $feedback = Feedback::create($validated);

        return response()->json($feedback, 201);
    }
}
