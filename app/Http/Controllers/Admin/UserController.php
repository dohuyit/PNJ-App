<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserAdminRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAdminAccounts()
    {
        $listAccountAdmin = User::where('role_id', '!=', 2)->get();
        $listRoleIsAdmin = Role::where('id', '!=', 2)->get();

        // dd($listRoleIsAdmin);
        return view('backend.pages.users.listAccountAdmin', compact('listAccountAdmin', 'listRoleIsAdmin'));
    }

    public function indexCustomerAccounts()
    {
        $listAccountCustomer = User::where('role_id', 2)->get();
        return view('backend.pages.users.listAccountCustomer', compact('listAccountCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAdminAccount(StoreUserRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $defaultPassword = ($request->role_id == 1) ? "adminpnj123" : "nvpnj456";

                User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($defaultPassword),
                    'role_id' => $request->role_id,
                ]);
            });
            return redirect()->back()->with('success', 'Tài khoản admin đã được thêm thành công.');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại');
        }
    }

    public function updateAdminAccount(UpdateUserAdminRequest $request, string $id)
    {
        try {
            DB::transaction(function () use ($request) {
                $defaultPassword = ($request->role_id == 1) ? "adminpnj123" : "nvpnj456";

                User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($defaultPassword),
                    'role_id' => $request->role_id,
                ]);
            });
            return redirect()->back()->with('success', 'Tài khoản admin đã được thêm thành công.');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editAdminAccount(string $id)
    {
        $adminAccount = User::find($id);
        return view('backend.pages.users.listAccountCustomer', compact('adminAccount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::find($id);
            if ($user->role_id == 1) {
                return redirect()->back()->with('error', 'Không thể xóa tài khoản admin chính');
            }

            if ($user->avatar && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }

            DB::transaction(function () use ($user) {
                $user->delete();
            });

            return redirect()->back()->with('success', 'Tài khoản đã được xóa thành công.');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại');
        }
    }
}
