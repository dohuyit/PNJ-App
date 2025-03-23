<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\CustomerVoucher;
use App\Models\District;
use App\Models\JewelryLine;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductType;
use App\Models\ProductVoucher;
use App\Models\User;
use App\Models\Variant;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DetailController extends Controller
{

    private function showDataNavbar()
    {
        return [
            'categories' => Category::pluck('name', 'id'),
            'productTypes' => ProductType::where('category_id', 1)->pluck('name', 'id'),
            'jewelryLines' => JewelryLine::where('is_wedding', 1)->pluck('name', 'id'),
            'collections' => Collection::where('is_wedding_collection', 1)->pluck('name', 'id'),
            'brands' => Brand::pluck('name', 'id'),
            'subBanner' => Banner::where('position', 'submenu')->where('priority', 1)->where('is_active', 0)->first()
        ];
    }

    public function showDetailProduct($id)
    {
        $navbarData = $this->showDataNavbar();

        $variantIds = Variant::whereHas('attribute.attributegroups', function ($query) {
            $query->where('name', 'Size');
        })->pluck('id');



        $listComments = Comment::with('users')
            ->where('user_id', $id)
            ->where('status_comment', 0)
            ->get();

        // dd($listComments);

        $dataDetail = Product::with([
            'variants' => function ($query) use ($variantIds) {
                $query->whereIn('id', $variantIds)->with('attribute');
            },
        ])->find($id);

        $relatedProducts = Product::where('product_type_id', $dataDetail->product_type_id)
            ->where('id', '!=', $dataDetail->id)
            ->get();

        // dd($relatedProducts);

        $albumImageProduct = ProductImage::query()->where('product_id', $id)->get();
        // dd($albumImageProduct);

        if (!$dataDetail) {
            abort(404);
        }
        // dd($dataDetail);
        return view('frontend.detail', array_merge($navbarData, compact('dataDetail', 'albumImageProduct', 'listComments', 'relatedProducts')));
    }

    public function profile($id)
    {
        $customer = User::with([
            'city',
            'district',
            'ward'
        ])
            ->findOrFail($id);
        $cities = City::all();
        $districts = District::where('city_id', $customer->city_id)->get();
        $wards = Ward::where('district_id', $customer->district_id)->get();
        // dd($customer);

        Session::forget('client_auth');

        Session::put('client_auth', $customer);

        return view('frontend.detail-user', compact(
            'customer',
            'cities',
            'districts',
            'wards'
        ));
    }

    public function profileUpdate(Request $request, string $id)
    {
        // dd($request->all());
        try {
            $customer = User::query()->findOrFail($id);
            DB::transaction(function () use ($request, $customer) {
                $dataCustomer = [
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'birthday' => $request->birthday,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'city_id' => $request->city_id,
                    'district_id' => $request->district_id,
                    'ward_id' => $request->ward_id,
                ];

                if ($request->hasFile('avatar')) {
                    if ($customer->avatar && Storage::disk('public')->exists($customer->avatar)) {
                        Storage::disk('public')->delete($customer->avatar);
                    }
                    $dataCustomer['avatar'] = Storage::disk('public')->put('Users', $request->file('avatar'));
                }

                // dd($dataCustomer);

                $customer->update($dataCustomer);
            });

            return redirect()->route('user.profile', $customer->id)->with('success', 'Cập nhật thông tin khách hàng thành công');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    public function listOrdersByCustomer($id)
    {
        $customer = User::with([
            'city',
            'district',
            'ward'
        ])
            ->findOrFail($id);

        $listOrders = Order::with([
            'orderItems.variant.product.jewelryLine',
            'orderItems.variant.attribute.attributegroups',
            'city',
            'district',
            'ward',
            'paymentMethod',
            'orderStatus'
        ])
            ->where('user_id', $customer->id)->orderBy('id', 'desc')->get();

        return view('frontend.detail-order', compact('listOrders'));
    }

    public function detailOrdersByCustomer($id)
    {
        $detailOrder = Order::with(
            'orderItems.variant.product.jewelryLine',
            'orderItems.variant.attribute.attributegroups',
            'city',
            'district',
            'ward',
            'paymentMethod',
            'orderStatus'
        )
            ->find($id);

        if (!$detailOrder) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại!');
        }

        // dd($detailOrder);

        $orderStatuses = OrderStatus::limit(5)->get();

        return view('frontend.detail-info-order', compact('detailOrder', 'orderStatuses'));
    }

    public function getVoucherByUser($id)
    {
        // Lấy danh sách voucher của user
        $listVouchers = CustomerVoucher::with('voucher')
            ->where('user_id', $id)
            ->get();

        // dd($listVouchers);

        // Voucher có thể sử dụng
        $validVouchers = $listVouchers->filter(function ($customerVoucher) {
            $voucher = $customerVoucher->voucher;

            // dd($customerVoucher->uses);

            return
                $voucher->uses < $voucher->max_uses_user
                && $voucher->end_date > now()
                && $voucher->start_date <= now();
        });

        // dd($validVouchers);

        // Voucher đã sử dụng hết
        $usedVouchers = $listVouchers->filter(function ($customerVoucher) {
            $voucher = $customerVoucher->voucher;

            return ($voucher->uses >= $voucher->max_uses  // Voucher đã dùng hết tổng số lần
                || ($voucher->max_uses_user && $voucher->uses >= $voucher->max_uses_user))  // Hoặc user đã dùng hết số lần cho phép
                && $voucher->end_date > now()  // Chưa hết hạn
                && $voucher->start_date <= now();  // Đã đến thời gian sử dụng
        });

        // dd($usedVouchers);

        // Voucher đã hết hạn hoặc chưa đến hạn
        $expiredVouchers = $listVouchers->filter(function ($customerVoucher) {
            $voucher = $customerVoucher->voucher;
            return $voucher->end_date <= now() || $voucher->start_date > now();
        });

        return view('frontend.detail-voucher', compact('validVouchers', 'usedVouchers', 'expiredVouchers'));
    }

    public function searchData(Request $request)
    {

        // dd($request->all());
        $query = $request->input('input-search');
        $navbarData = $this->showDataNavbar();

        // Tìm kiếm trong tên sản phẩm hoặc mô tả sản phẩm
        $products = Product::where('product_name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

        return view('frontend.detail-search', array_merge($navbarData, compact('products', 'query')));
    }

    public function commentProcess(Request $request)
    {
        // dd($request->all());
        try {
            DB::transaction(function () use ($request) {
                $dataComments = [
                    'product_id' => $request->product_id,
                    'user_id' => Auth::user()->id,
                    'content_comment' => $request->content,
                    'rating' => $request->rate
                ];

                // dd($dataComments);

                Comment::query()->create($dataComments);
            });

            return redirect()->route('client.product', Auth::user()->id)->with('success', 'bình luận sản phẩm đã được gửi!');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
}
