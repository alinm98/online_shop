<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Category Permissions
         */
        Permission::query()->insert([
            [
                'title' => 'category_read',
                'label' => 'خواندن دسته بندی',
            ],
            [
                'title' => 'category_create',
                'label' => 'ایجاد دسته بندی',
            ],
            [
                'title' => 'category_update',
                'label' => 'ویرایش دسته بندی',
            ],
            [
                'title' => 'category_delete',
                'label' => 'حذف دسته بندی',
            ],
        ]);

        /*
        * Brand Permissions
        */
        Permission::query()->insert([
            [
                'title' => 'brand_read',
                'label' => 'خواندن برند',
            ],
            [
                'title' => 'brand_create',
                'label' => 'ایجاد برند',
            ],
            [
                'title' => 'brand_update',
                'label' => 'ویرایش برند',
            ],
            [
                'title' => 'brand_delete',
                'label' => 'حذف برند',
            ],
        ]);

        /*
        * Product Permissions
        */
        Permission::query()->insert([
            [
                'title' => 'product_read',
                'label' => 'خواندن محصول',
            ],
            [
                'title' => 'product_create',
                'label' => 'ایجاد محصول',
            ],
            [
                'title' => 'product_update',
                'label' => 'ویرایش محصول',
            ],
            [
                'title' => 'product_delete',
                'label' => 'حذف محصول',
            ],
        ]);

        /*
        * Discount Permissions
        */
        Permission::query()->insert([
            [
                'title' => 'discount_read',
                'label' => 'خواندن تخفیف',
            ],
            [
                'title' => 'discount_create',
                'label' => 'ایجاد تخفیف',
            ],
            [
                'title' => 'discount_update',
                'label' => 'ویرایش تخفیف',
            ],
            [
                'title' => 'discount_delete',
                'label' => 'حذف تخفیف',
            ],
        ]);

        /*
        * Gallery Permissions
        */
        Permission::query()->insert([
            [
                'title' => 'gallery_read',
                'label' => 'خواندن گالری',
            ],
            [
                'title' => 'gallery_create',
                'label' => 'ایجاد گالری',
            ],
            [
                'title' => 'gallery_update',
                'label' => 'ویرایش گالری',
            ],
            [
                'title' => 'gallery_delete',
                'label' => 'حذف گالری',
            ],
        ]);

        /*
        * Role Permissions
        */
        Permission::query()->insert([
            [
                'title' => 'role_read',
                'label' => 'خواندن نقش',
            ],
            [
                'title' => 'role_create',
                'label' => 'ایجاد نقش',
            ],
            [
                'title' => 'role_update',
                'label' => 'ویرایش نقش',
            ],
            [
                'title' => 'role_delete',
                'label' => 'حذف نقش',
            ],
        ]);

        /*
        * Dashboard Permissions
        */
        Permission::query()->insert([
            'title' => 'view_dashboard',
            'label' => 'مشاهده داشبورد',
        ]);


    }
}
