<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        
        /**********************************
         * Init data
         */
        $permissionDatas = [
            [
                'id'    => 1,
                'name'  => 'read_user',
                'title' => 'xem tài khoản',
            ],
            [
                'id'    => 2,
                'name'  => 'create_user',
                'title' => 'Thêm tài khoản',
            ],
            [
                'id'    => 3,
                'name'  => 'update_user',
                'title' => 'cập nhật tài khoản',
            ],
            [
                'id'    => 4,
                'name'  => 'delete_user',
                'title' => 'Xoá tài khoản',
            ],
            [
                'id'    => 5,
                'name'  => 'read_user',
                'title' => 'xem tài khoản',
            ],
            [
                'id'    => 6,
                'name'  => 'create_user',
                'title' => 'Thêm tài khoản',
            ],
            [
                'id'    => 7,
                'name'  => 'update_user',
                'title' => 'cập nhật tài khoản',
            ],
            [
                'id'    => 8,
                'name'  => 'delete_user',
                'title' => 'Xoá tài khoản',
            ],
            [
                'id'    => 9,
                'name'  => 'read_product',
                'title' => 'xem sản phẩm',
            ],
            [
                'id'    => 10,
                'name'  => 'create_product',
                'title' => 'Thêm sản phẩm',
            ],
            [
                'id'    => 11,
                'name'  => 'update_product',
                'title' => 'cập nhật sản phẩm',
            ],
            [
                'id'    => 12,
                'name'  => 'delete_product',
                'title' => 'xoá sản phẩm',
            ],
        ];
    }
}
