<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avatar;
use App\Models\Kitchen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function kitchens()
    {
        $kitchens = Kitchen::latest()->paginate('10');
        return view('admin.kitchens.index', compact('kitchens'));
    }

    public function create_kitchens()
    {
        $avatars = Avatar::all();
        return view('admin.kitchens.create', compact('avatars'));
    }

    /**
     * Store a newly created kitchen in storage.
     */
    public function store_kitchens(Request $request)
    {
        // Validate the request data
      // Custom validation messages
        $messages = [
            'avatar.required' => 'Please select a kitchen avatar',
            'phone.digits' => 'The contact number must be 10 digits',
            'email.unique' => 'This email is already registered',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|exists:avatars,slug',
            'owner_name' => 'required|string|max:255',
            'kitchen_name' => 'required|string|max:255',
            'email' => 'required|unique:kitchens,email',
            'phone' => 'required',
            'sqft' => 'required|integer',
            'status' => 'required|in:pending,active,draft',
            'type' => 'required|in:veg,nonveg,both',
            'rating' => 'required|in:1,2,3,4,5',
            'location' => 'required|string',
            'coordinates' => 'nullable|string'
        ], $messages);

        // If validation fails, redirect back with errors and input
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the errors below');
        }

        try {

            // Format the email (append domain if only prefix was entered)
            $email = str_contains($request->email, '@') 
                   ? $request->email 
                   : $request->email . '@gmail.com';
                   //dd($email);

            // Create the kitchen
            Kitchen::create([
                'owner_name' => $request->owner_name,
                'kitchen_name' => $request->kitchen_name,
                'email' => $email,
                'contact_no' => $request->phone,
                'sqft' => (int) str_replace(',', '', $request->sqft),
                'status' => $request->status,
                'type' => $request->type,
                'rating' => $request->rating,
                'location' => $request->location,
                'coordinates' => $request->coordinates,
                'featured_img' => $request->avatar
            ]);

           // print_r($kitchen); die();

            return redirect()->route('admin.kitchens')
                ->with('success', 'Kitchen created successfully!');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error creating kitchen: ' . $e->getMessage());
        }
    }

    public function edit_kitchens($id)
    {
        $avatars = Avatar::all();
        $kitchen = Kitchen::find($id);
        //dd($kitchen);
        return view('admin.kitchens.edit', compact('avatars', 'kitchen'));
    }

    public function update_kitchen(Request $request, $id)
    {
        $messages = [
            'avatar.required' => 'Please select a kitchen avatar',
            'phone.digits' => 'The contact number must be 10 digits',
            'email.unique' => 'This email is already registered',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|exists:avatars,slug',
            'owner_name' => 'required|string|max:255',
            'kitchen_name' => 'required|string|max:255',
            'email' => 'required|email|unique:kitchens,email,'.$id,
            'phone' => 'required',
            'sqft' => 'required|integer',
            'status' => 'required|in:pending,active,draft',
            'type' => 'required|in:veg,nonveg,both',
            'rating' => 'required|in:1,2,3,4,5',
            'location' => 'required|string',
            'coordinates' => 'nullable|string'
        ], $messages);
    
        // If validation fails, redirect back with errors and input
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the errors below');
        }
        
        $kitchen = Kitchen::findOrFail($id);
    
        try {
            // Format the email (append domain if only prefix was entered)
            $email = str_contains($request->email, '@') 
                   ? $request->email 
                   : $request->email . '@gmail.com';
    
            // Update the kitchen
            $kitchen->update([
                'owner_name' => $request->owner_name,
                'kitchen_name' => $request->kitchen_name,
                'email' => $email,
                'contact_no' => $request->phone,
                'sqft' => (int) str_replace(',', '', $request->sqft),
                'status' => $request->status,
                'type' => $request->type,
                'rating' => $request->rating,
                'location' => $request->location,
                'coordinates' => $request->coordinates,
                'featured_img' => $request->avatar
            ]);
    
            return redirect()->route('admin.kitchens')
                ->with('success', 'Kitchen updated successfully!');
    
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error updating kitchen: ' . $e->getMessage());
        }
    }

    public function delete_kitchen($id)
    {
        try {
            // Find the kitchen or fail with 404
            $kitchen = Kitchen::findOrFail($id);
            
            // Delete the kitchen
            $kitchen->delete();
            
            // Redirect with success message
            return redirect()->route('admin.kitchens')
                ->with('success', 'Kitchen deleted successfully!');
                
        } catch (\Exception $e) {
            // Handle any errors that occur during deletion
            return redirect()
                ->back()
                ->with('error', 'Error deleting kitchen: ' . $e->getMessage());
        }
    }

    public function avatars()
    {
        $avatars = Avatar::latest()->paginate(5);
        return view('admin.avatars.index', compact('avatars'));
    }

    public function create_avatars()
    {
        return view('admin.avatars.create');
    }

    public function store_avatars(Request $request)
    {
     $request->validate([
        'name' => 'required|string|max:255',
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $avatarPath = $request->file('avatar')->store('avatars', 'public');

    Avatar::create([
        'name' => $request->name,
        'avatar' => $avatarPath
    ]);

    return redirect()->route('admin.avatars')->with('success', 'Avatar created successfully');
    }

    public function edit_avatars($id)
    {
        $avatar = Avatar::find($id);
        return view('admin.avatars.edit', compact('avatar'));
    }

    public function update_avatars(Request $request, Avatar $avatar)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    try {
        if ($request->hasFile('avatar')) {
            // Delete old file
            Storage::delete('public/'.$avatar->avatar);
            
            // Store new file
            $path = $request->file('avatar')->store('avatars', 'public');
            $avatar->avatar = $path;
        }

        $avatar->name = $request->name;
        $avatar->save();

        return redirect()->route('admin.avatars')
               ->with('success', 'Avatar updated successfully');
               
    } catch (\Exception $e) {
        return back()->with('error', 'Error updating avatar: '.$e->getMessage());
    }
}

        /**
     * Remove the specified avatar from storage.
     */
    public function delete_avatars($id)
    {
        try {
            // Find the avatar or fail
            $avatar = Avatar::findOrFail($id);
            
            // Get the file path before deletion
            $filePath = 'public/' . $avatar->avatar;
            
            // Delete the database record
            $avatar->delete();
            
            // Delete the associated file
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
            
            return redirect()
                ->route('admin.avatars')
                ->with('success', 'Avatar deleted successfully');
                
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.avatars')
                ->with('error', 'Failed to delete avatar: ' . $e->getMessage());
        }
    }
}
