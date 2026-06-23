<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('profile_edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $data = [
            'f_name' => $request->firstName,
            'm_name' => $request->middleName,
            'l_name' => $request->lastName,
            'usertype' => $request->usertype,
            'dob' => $request->dob,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => now(),
        ];

        // Only update password if provided
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        // Check if a new file is uploaded
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $path = $request->file('photo')->storeAs('public/images',$fileName);
            $path1 = ('images/'.$fileName);
            $data['file_name'] = $path1; // Update only if a new file is uploaded
        }

        DB::table('users')->where('id', Auth::User()->id)->update($data);

        return redirect()->route('user.profile');
    }

    public function showUser()
    {
        if (auth()->check() && auth()->user()->usertype !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized Access!');
        }

        $users = User::where('usertype', 'user')->get();
        return view('admin/admin_user_list',compact('users'));
    }
    public function showAdmin()
    {
        if (auth()->check() && auth()->user()->usertype !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized Access!');
        }
        
        $users = User::where('usertype','admin')->get();
        return view('admin/admin_admin_list',compact('users'));
    }
    public function showRegistrationForm()
    {
        return view('signup'); 
    }

    public function registerUser(Request $request)
    {
        $file = $request->file('photo');

        // Validate user input
        $request->validate([
            'firstName' => 'required|string|max:50',
            'middleName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'dob' => 'required|date',
            'photo' => 'required|mimes:png,jpeg,jpg|max:3000',
            'email' => 'required|string|email|max:50|unique:users',
            'phone' => 'required|string|min:10|max:10',
            'password' => 'required|string|min:8|max:50|confirmed', 
        ]);

        $fileName = $file->getClientOriginalName();
        $path = $request->file('photo')->storeAs('public/images',$fileName);
        $path1 = ('images/'.$fileName);

        // Create a new user instance
        $users = User::create([
            'f_name' => $request->firstName,
            'm_name' => $request->middleName,
            'l_name' => $request->lastName,
            'dob' => $request->dob,
            'file_name' => $path1,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), 
        ]);
        
        if($users){
            return redirect()->route('welcome');
        }
    }
    public function newRegisterUser(Request $request)
    {
        $file = $request->file('photo');

        // Validate user input
        $request->validate([
            'firstName' => 'required|string|max:50',
            'middleName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'dob' => 'required|date',
            'photo' => 'required|mimes:png,jpeg,jpg|max:3000',
            'email' => 'required|string|email|max:50|unique:users',
            'phone' => 'required|string|min:10|max:10',
            'password' => 'required|string|min:8|max:50|confirmed', 
        ]);

        $fileName = $file->getClientOriginalName();
        $path = $request->file('photo')->storeAs('public/images',$fileName);
        $path1 = ('images/'.$fileName);

        // Create a new user instance
        $users = User::create([
            'f_name' => $request->firstName,
            'm_name' => $request->middleName,
            'l_name' => $request->lastName,
            'dob' => $request->dob,
            'file_name' => $path1,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), 
        ]);
        
        if($users){
            return redirect('admin_user_list');
        }
    }
    public function newRegisterAdmin(Request $request)
    {
        $file = $request->file('photo');

        // Validate user input
        $request->validate([
            'firstName' => 'required|string|max:50',
            'middleName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'dob' => 'required|date',
            'photo' => 'required|mimes:png,jpeg,jpg|max:3000',
            'email' => 'required|string|email|max:50|unique:users',
            'phone' => 'required|string|min:10|max:10',
            'password' => 'required|string|min:8|max:50|confirmed', 
        ]);

        $fileName = $file->getClientOriginalName();
        $path = $request->file('photo')->storeAs('public/images',$fileName);
        $path1 = ('images/'.$fileName);

        // Create a new user instance
        $users = User::create([
            'usertype' => 'admin',
            'f_name' => $request->firstName,
            'm_name' => $request->middleName,
            'l_name' => $request->lastName,
            'dob' => $request->dob,
            'file_name' => $path1,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), 
        ]);
        
        if($users){
            return redirect('admin_admin_list');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'f_name' => $request->firstName,
            'm_name' => $request->middleName,
            'l_name' => $request->lastName,
            'usertype' => $request->usertype,
            'dob' => $request->dob,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => now(),
        ];

        // Only update password if provided
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        // Check if a new file is uploaded
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $path = $request->file('photo')->storeAs('public/images',$fileName);
            $path1 = ('images/'.$fileName);
            $data['file_name'] = $path1; // Update only if a new file is uploaded
        }

        DB::table('users')->where('id', $id)->update($data);

        return back()->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        $users = User::find($id);
        if(!is_null($users))
        {
            $users->delete();
        }
        return redirect('admin_admin_list');
    }

    public function view()
    {
        $users = User::where('usertype','admin')->onlyTrashed()->get();
        return view('admin/admin-trash',compact('users'));
    }

    public function restore($id)
    {
        $users = User::withTrashed()->find($id);
        if(!is_null($users))
        {
            $users->restore();
        }
        return redirect('admin_admin_list');
    }

    public function permanentDelete($id)
    {
        $users = User::withTrashed()->find($id);
        if(!is_null($users))
        {
            $users->forceDelete();
        }
        return redirect('admin_admin_list');
    }

    public function u_delete($id)
    {
        $users = User::find($id);
        if(!is_null($users))
        {
            $users->delete();
        }
        return redirect('admin_user_list');
    }

    public function u_view()
    {
        $users = User::where('usertype','user')->onlyTrashed()->get();
        return view('admin/user-trash',compact('users'));
    }

    public function u_restore($id)
    {
        $users = User::withTrashed()->find($id);
        if(!is_null($users))
        {
            $users->restore();
        }
        return redirect('admin_user_list');
    }

    public function u_permanentDelete($id)
    {
        $users = User::withTrashed()->find($id);
        if(!is_null($users))
        {
            $users->forceDelete();
        }
        return redirect('admin_user_list');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls',
        ]);
    
        Excel::import(new UsersImport, $request->file('file')->getRealPath());
    
        return back()->with('success', 'Users imported successfully!');
    }
}
