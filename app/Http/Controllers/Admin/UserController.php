<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserAdminRequest;
use App\Models\City;
use App\Models\District;
use App\Models\Role;
use App\Models\User;
use App\Models\Ward;
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
            $user = User::findOrFail($id);
            DB::transaction(function () use ($request, $user) {
                $defaultPassword = ($request->role_id == 1) ? "adminpnj123" : "nvpnj456";
                $user->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'role_id' => $request->role_id,
                    'password' => Hash::make($defaultPassword),
                ]);
            });

            return redirect()->back()->with('success', 'Tài khoản admin đã được cập nhật thành công.');
        } catch (\Throwable $e) {
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
    public function editCustomerAccount(string $id)
    {
        $customerAccount = User::find($id);
        // dd($customerAccount);

        $cities = City::all();
        $districts = District::where('city_id', $customerAccount->city_id)->get();
        $wards = Ward::where('district_id', $customerAccount->district_id)->get();
        return view('backend.pages.users.editAccountCustomer', compact('customerAccount', 'cities', 'districts', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCustomerAccount(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);
            DB::transaction(function () use ($request, $user) {
                $dataCustomer = [
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'gender' => $request->input('gender', 0),
                    'birthday' => $request->birthday,
                    'address' => $request->address,
                    'role_id' => 2,
                    'city_id' => intval($request->city_id),
                    'district_id' => intval($request->district_id),
                    'ward_id' => intval($request->ward_id),
                    'status' => $request->input('status', 0),
                ];
                // dd($dataCustomer);
                if ($request->hasFile('avatar')) {
                    if (!empty($user->avatar)) {
                        Storage::delete($user->avatar);
                    }
                    $dataCustomer['avatar'] = Storage::put('Users', $request->file('avatar'));
                }

                // dd($dataCustomer);

                $user->update($dataCustomer);
            });

            return redirect()->route('customer.index')->with('success', 'Tài khoản người dùng đã được cập nhật thành công.');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại');
        }
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

    public function getDistricts($city_id)
    {
        $districts = District::where('city_id', $city_id)->get();
        return response()->json($districts);
    }

    /**
     * Lấy danh sách xã/phường theo quận/huyện
     */
    public function getWards($district_id)
    {
        $wards = Ward::where('district_id', $district_id)->get();
        return response()->json($wards);
    }
}
