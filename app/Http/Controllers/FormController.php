<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    public function index()
    {
        return view('form.index');
    }


    public function searchCities(Request $request)
    {
        $query = $request->query('query');

        if (!$query || strlen($query) < 3) {
            return response()->json([]); // Return an empty array for invalid or short queries
        }

        $cities = City::where('city_name', 'like', '%' . $query . '%')
                      ->select('city_name', 'postal_code')
                      ->limit(10) // Limit results to prevent excessive data
                      ->get();

        return response()->json($cities); // Return JSON of matched cities
    }


    public function validateCity(Request $request)
    {
        $city = $request->input('city');

        $valid = City::where('city_name', $city)->exists();

        return response()->json(['valid' => $valid]); // Return validation result
    }



    public function store(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'degree' => 'required|string',
            'city' => 'required|string|exists:cities,city_name',
            'industries' => 'required|array|min:1|max:3',
            'industries.*' => 'exists:industries,industry_name',
            'skills' => 'required|array|min:3|max:5',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phoneNumber' => 'required|string',
            'verificationCode' => 'required|string',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('form.profile-completion')->with('success', 'User created successfully. Please complete your profile.');
    }



    // Method to display the profile completion form
    public function profileCompletion()
        {
            return view('form.profile-completion'); // View for the modal
        }

        public function completeProfile(Request $request)
        {
            $validated = $request->validate([
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validate image upload
                'self_description' => 'required|string|max:500', // Self-description max 500 characters
                'address' => 'required|string|max:255', // Address validation
            ]);

            $user = auth()->user(); // Retrieve the logged-in user

            // Update user profile
            if ($request->hasFile('profile_picture')) {
                $path = $request->file('profile_picture')->store('profile_pictures', 'public');
                $user->profile_picture = $path;
            }
            $user->self_description = $validated['self_description'];
            $user->address = $validated['address'];
            $user->save();

            return redirect()->route('dashboard')->with('success', 'Profile completed successfully!');
        }
}
