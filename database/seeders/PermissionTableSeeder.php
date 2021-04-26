<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            ['id'=>'1','permission_name' => 'admin', 'display_name' => 'Module admin','parent_id'=>'0','key_code'=>'null'],
        	['id'=>'2','permission_name' => 'admin-list', 'display_name' => 'Danh sách admin','parent_id'=>'1','key_code'=>'admin-list'],
        	['id'=>'3','permission_name' => 'admin-edit', 'display_name' => 'Sửa admin','parent_id'=>'1','key_code'=>'admin-edit'],
        	['id'=>'4','permission_name' => 'admin-add', 'display_name' => 'Thêm admin','parent_id'=>'1','key_code'=>'admin-add'],
        	['id'=>'5','permission_name' => 'admin-delete', 'display_name' => 'Xóa admin','parent_id'=>'1','key_code'=>'admin-delete'],
            ['id'=>'6','permission_name' => 'role', 'display_name' => 'Module role','parent_id'=>'0','key_code'=>'null'],
            ['id'=>'7','permission_name' => 'role-list', 'display_name' => 'Danh sách role','parent_id'=>'6','key_code'=>'role-list'],
            ['id'=>'8','permission_name' => 'role-edit', 'display_name' => 'Sửa role','parent_id'=>'6','key_code'=>'role-edit'],
            ['id'=>'9','permission_name' => 'role-add', 'display_name' => 'Thêm role','parent_id'=>'6','key_code'=>'role-add'],
            ['id'=>'10','permission_name' => 'role-delete', 'display_name' => 'Xóa role','parent_id'=>'6','key_code'=>'role-delete'],
            ['id'=>'11','permission_name' => 'banner', 'display_name' => 'Module banner','parent_id'=>'0','key_code'=>'null'],
            ['id'=>'12','permission_name' => 'banner-list', 'display_name' => 'Danh sách banner','parent_id'=>'11','key_code'=>'banner-list'],
            ['id'=>'13','permission_name' => 'banner-edit', 'display_name' => 'Sửa banner','parent_id'=>'11','key_code'=>'banner-edit'],
            ['id'=>'14','permission_name' => 'banner-add', 'display_name' => 'Thêm banner','parent_id'=>'11','key_code'=>'banner-add'],
            ['id'=>'15','permission_name' => 'banner-delete', 'display_name' => 'Xóa banner','parent_id'=>'11','key_code'=>'banner-delete'],
            ['id'=>'16','permission_name' => 'event', 'display_name' => 'Module event','parent_id'=>'0','key_code'=>'null'],
            ['id'=>'17','permission_name' => 'event-list', 'display_name' => 'Danh sách event','parent_id'=>'16','key_code'=>'event-list'],
            ['id'=>'18','permission_name' => 'event-edit', 'display_name' => 'Sửa event','parent_id'=>'16','key_code'=>'event-edit'],
            ['id'=>'19','permission_name' => 'event-add', 'display_name' => 'Thêm event','parent_id'=>'16','key_code'=>'event-add'],
            ['id'=>'20','permission_name' => 'event-delete', 'display_name' => 'Xóa event','parent_id'=>'16','key_code'=>'event-delete'],
            ['id'=>'21','permission_name' => 'user', 'display_name' => 'Module user','parent_id'=>'0','key_code'=>'null'],
            ['id'=>'22','permission_name' => 'user-list', 'display_name' => 'Danh sách user','parent_id'=>'21','key_code'=>'user-list'],
            ['id'=>'23','permission_name' => 'user-edit', 'display_name' => 'Sửa user','parent_id'=>'21','key_code'=>'user-edit'],
            ['id'=>'24','permission_name' => 'user-add', 'display_name' => 'Thêm user','parent_id'=>'21','key_code'=>'user-add'],
            ['id'=>'25','permission_name' => 'user-delete', 'display_name' => 'Xóa user','parent_id'=>'21','key_code'=>'user-delete'],
        ]);
    }
}
