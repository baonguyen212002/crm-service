<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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
                'name'  => 'read_user_profile',
                'title' => 'xem thông tin tài khoản',
            ],
            [
                'id'    => 6,
                'name'  => 'create_user_profile',
                'title' => 'Thêm thông tin tài khoản',
            ],
            [
                'id'    => 7,
                'name'  => 'update_user_profile',
                'title' => 'cập nhật thông tin tài khoản',
            ],
            [
                'id'    => 8,
                'name'  => 'delete_user_profile',
                'title' => 'Xoá thông tài khoản',
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

        $roleDatas = [
            [
                'id'            => 1,
                'name'          => 'Administrator',
                'title'         => 'Quản lý',
                'permissions'   => array_merge(
                    [
                        'read_user',
                        'create_user',
                        'update_user',
                        'delete_user',
                        'read_user_profile',
                        'create_user_profile',
                        'update_user_profile',
                        'delete_user_profile',
                        'read_product',
                        'create_product',
                        'update_product',
                        'delete_product',
                    ]
                ),
            ],
            [
                'id'            => 2,
                'name'          => 'Staff',
                'title'         => 'Nhân viên',
                'permissions'   => array_merge(
                    [
                        'read_user',
                        'update_user',
                        'delete_user',
                        'read_user_profile',
                        'create_user_profile',
                        'update_user_profile',
                        'delete_user_profile',
                        'read_product',
                        'create_product',
                        'update_product',
                        'delete_product',
                    ]
                ),
            ],
            [
                'id'            => 3,
                'name'          => 'Customer',
                'title'         => 'Khách hàng',
                'permissions'   => array_merge(
                    [
                        'update_user',
                        'delete_user',
                        'read_user_profile',
                        'create_user_profile',
                        'update_user_profile',
                        'delete_user_profile',
                        'read_product',
                    ]
                ),
            ],
        ];
        

        /**********************************
         * Update or create
         */
        foreach ($permissionDatas as $permissionData) {
            Permission::updateOrCreate([
                'id' => $permissionData['id'],
            ], $permissionData);
        }
        foreach ($roleDatas as $roleData) {
            $permissions = $roleData['permissions'];
            unset($roleData['permissions']);

            $role = Role::updateOrCreate([
                'id' => $roleData['id'],
            ], $roleData);
            $role->syncPermissions($permissions);
        }


        /**********************************
         * Delete if redundant
         */
        Permission::whereNotIn(
            'id',
            collect($permissionDatas)->pluck('id')->toArray()
        )->delete();
        Role::whereNotIn('id', collect($roleDatas)->pluck('id')->toArray())
            ->delete();
    }
}
