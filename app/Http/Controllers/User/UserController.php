<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Service\Permission\PermissionService;
use App\Service\Role\RoleService;
use App\Service\User\UserService;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{


    public function forgetPassword(Request $request) {
        return view('auth.passwords.reset');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => 'required',
            'new_password' => 'nullable|min:6|confirmed',
        ]);

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update email if changed
        if ($request->email !== $user->email) {
            $user->email = $request->email;
        }

        // Update password if provided
        if ($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

}
