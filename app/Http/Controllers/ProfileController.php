<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function edit(Request $request): View
    {
        //get data employee where id = user_id
        $employee = Employee::where('user_id', auth()->user()->id)->first();
        $user = User::where('id', Auth::user()->id)->first();
        // dd($employee);

        //use compact
        return view('profile.edit', compact('employee', 'user'));
        
       
    }

    //make function update for profile update
    public function update(Request $request)
    {

        //validation
        $request->validate([
            'name' => 'required',
            'birthday_date' => 'required',
            'blood' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'bank_number' => 'required',
            'bank' => 'required',
            
        ]);
        //update data to employee table and user table
        Employee::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'birthday_date' => $request->birthday_date,
            'blood' => $request->blood,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'bank_number' => $request->bank_number,
            'bank' => $request->bank,
            'gender' => $request->gender,
        ]);

        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);


        //redirect to profile page
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function updatePhoto(Request $request)
{
    $request->validate([
        'profile_image' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    $employee = Employee::where('id', Auth::user()->id)->first();

    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/profile_image');
        $image->move($destinationPath, $name);

        // Hapus gambar lama jika ada
        if ($employee->profile_image) {
            File::delete(public_path('/storage/profile_image/'.$employee->profile_image));
        }

        $employee->profile_image = $name;
        $employee->save();
    }

    return back()->with('success', 'Profile photo updated successfully.');
}

}
