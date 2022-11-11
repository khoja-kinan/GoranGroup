<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
    {
        $permissions = [
            'Show Post',
            'Create Post',
            'Edit Post',
            'Delete Post',

            'Show Company',
            'Create Company',
            'Edit Company',
            'Delete Company',

            'Show Section',
            'Create Section',
            'Edit Section',
            'Delete Section',

            'Show User',
            'Create User',
            'Edit User',
            'Delete User',

            'Show Role',
            'Create Role',
            'Edit Role',
            'Delete Role',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}