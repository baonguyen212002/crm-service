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
            ],
            [
                'id'    => 2,
                'name'  => 'create_user',
            ],
            [
                'id'    => 3,
                'name'  => 'update_user',
            ],
            [
                'id'    => 4,
                'name'  => 'delete_user',
            ],
            [
                'id'    => 5,
                'name'  => 'read_user_profile',
            ],
            [
                'id'    => 6,
                'name'  => 'create_user_profile',
            ],
            [
                'id'    => 7,
                'name'  => 'update_user_profile',
            ],
            [
                'id'    => 8,
                'name'  => 'delete_user_profile',
            ],
            [
                'id'    => 9,
                'name'  => 'read_product',
            ],
            [
                'id'    => 10,
                'name'  => 'create_product',
            ],
            [
                'id'    => 11,
                'name'  => 'update_product',
            ],
            [
                'id'    => 12,
                'name'  => 'delete_product',
            ],
        ];

        $roleDatas = [
            [
                'id'            => 1,
                'name'          => 'Administrator',
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
