<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function createRegistration(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'liscence_plate_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'liscence_plate' => 'required|string'
        ]);

        $image_path = $request->file('image')->store('image', 'public');
        $liscence_plate_image_path = $request->file('liscence_plate_image')->store('liscence_plate_image', 'public');

        $registration = new \App\Models\Registration;

        $registration->image = $image_path;
        $registration->liscence_plate_image = $liscence_plate_image_path;
        $registration->liscence_plate = $request->liscence_plate;

        $registration->save();

        return response()->json([
            'message' => 'Registration created successfully',
            'registration' => $registration
        ], 201);

    }


    public function getRegistrations() {
        $registrations = \App\Models\Registration::all();

        return response()->json([
            'registrations' => $registrations
        ], 200);
    }

    public function deleteRegistration($id) {
        $registration = \App\Models\Registration::find($id);

        if (!$registration) {
            return response()->json([
                'message' => 'Registration not found'
            ], 404);
        }

        $registration->delete();

        return response()->json([
            'message' => 'Registration deleted successfully'
        ], 200);
    }
}
