<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\CustomerVoucher;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\Post;
use App\Models\PostsCategory;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductVoucher;
use App\Models\ShopImport;
use App\Models\ShopImportDetail;
use App\Models\ShopStore;
use App\Models\Variant;
use App\Models\Voucher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // AttributeGroupSeeder::class,
            // AttributeSeeder::class,
            // CategorySeeder::class,
            // BrandSeeder::class,
            // ProductTypeSeeder::class,
            // CollectionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            // ProductSeeder::class,
            // VariantSeeder::class,
            // CartSeeder::class,
            // CartItemSeeder::class,
            // PaymentMethodSeeder::class,
            // OrderStatusSeeder::class,
            // OrderSeeder::class,
            // OrderItemSeeder::class,
            // CommentSeeder::class,
            // PostsCategorySeeder::class,
            // PostSeeder::class,
            // VoucherSeeder::class,
            // CustomerVoucherSeeder::class,
            // ProductVoucherSeeder::class,
            // ShopStoreSeeder::class,
            // InventorySeeder::class,
            // ShopImportSeeder::class,
            // ShopImportDetailSeeder::class
        ]);
    }
}
