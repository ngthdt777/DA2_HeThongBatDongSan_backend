<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('user_roles')->insert([
            [
                'name' => 'admin',
            ],
            [
                'name' => 'manager',
            ],
            [
                'name' => 'customer',
            ],
        ]);

        DB::table('users')->insert([
            [
                'userRoleId' => 1,
                'name' => 'admin name',
                'email' => 'admin@bds.com.vn',
                'DoB' => now(),
                'password' => '123',
                'phone' => '012345678',
            ],
            [
                'userRoleId' => 2,
                'name' => 'manager name',
                'email' => 'manager@bds.com.vn',
                'DoB' => now(),
                'password' => '123',
                'phone' => '012345688',
            ],
            [
                'userRoleId' => 3,
                'name' => 'customer name',
                'email' => 'customer@bds.com.vn',
                'DoB' => now(),
                'password' => '123',
                'phone' => '012345699',
            ],
        ]);

        DB::table('projects')->insert([
            [
                'name' => 'project 1',
                'investor' => 'investor 1',
                'introduce' => 'introduce 1',
                'info' => 'info 1',
                'customerBenefit' => 'benefit 1',
                'procedure' => 'procedure 1',
            ],
            [
                'name' => 'project 2',
                'investor' => 'investor 2',
                'introduce' => 'introduce 2',
                'info' => 'info 1',
                'customerBenefit' => 'benefit 1',
                'procedure' => 'procedure 1',
            ],
            [
                'name' => 'project 3',
                'investor' => 'investor 3',
                'introduce' => 'introduce 3',
                'info' => 'info 3',
                'customerBenefit' => 'benefit 3',
                'procedure' => 'procedure 3',
            ],
        ]);

        DB::table('project_media')->insert([
            [
                'projectId' => 1,
                'type' => 1,
                'path' => 'link 1',
            ],
            [
                'projectId' => 2,
                'type' => 1,
                'path' => 'link 2',
            ],
            [
                'projectId' => 3,
                'type' => 1,
                'path' => 'link 3',
            ],
        ]);

        DB::table('project_media')->insert([
            [
                'projectId' => 1,
                'type' => 1,
                'path' => 'link 1',
            ],
            [
                'projectId' => 2,
                'type' => 1,
                'path' => 'link 2',
            ],
            [
                'projectId' => 3,
                'type' => 1,
                'path' => 'link 3',
            ],
        ]);

        
        DB::table('areas')->insert([
            [
                'projectId' => 1,
                'name' => 'area name 1',
            ],
            [
                'projectId' => 2,
                'name' => 'area name 2',
            ],
            [
                'projectId' => 2,
                'name' => 'area name 3',
            ],
        ]);

        DB::table('real_estate_types')->insert([
            [
                'name' => 're type 1',
            ],
            [
                'name' => 're type 2',
            ],
        ]);

        DB::table('real_estates')->insert([
            [
                'areaId' => 1,
                'typeId' => 1,
                'userId' => 2,
                'sold' => false,
                'length' => 100,
                'width' => 100,
                'orientation' => 'ori 1',
                'acreage' => 100,
                'price' => 100,
                'location' => 'location 1',
                'address' => 'address 1',
                'facade' => 100,
                'mainLine' => 'mainLine 1',
                'floor' => 5,
                'bedRoom' => 5,
                'bathRoom' => 5,
                'description' => 'descripion 1',
                'dateCreated' => now(),
                'dateModified' => now(),
            ],
            [
                'areaId' => 1,
                'typeId' => 1,
                'userId' => 2,
                'sold' => false,
                'length' => 100,
                'width' => 100,
                'orientation' => 'ori 2',
                'acreage' => 100,
                'price' => 100,
                'location' => 'location 2',
                'address' => 'address 2',
                'facade' => 100,
                'mainLine' => 'mainLine 2',
                'floor' => 5,
                'bedRoom' => 5,
                'bathRoom' => 5,
                'description' => 'descripion 2',
                'dateCreated' => now(),
                'dateModified' => now(),
            ],
        ]);

        DB::table('real_estate_media')->insert([
            [
                'realEstateId' => 1,
                'type' => 1,
                'path' => 'path 1',
            ],
            [
                'realEstateId' => 2,
                'type' => 1,
                'path' => 'path 2',
            ],
        ]);

        DB::table('wish_lists')->insert([
            [
                'userId' => 1,
            ],
            [
                'userId' => 2,
            ],
        ]);

        DB::table('wish_list_real_estates')->insert([
            [
                'wishListId' => 1,
                'realEstateId' => 1,
            ],
            [
                'wishListId' => 1,
                'realEstateId' => 2,
            ],
            [
                'wishListId' => 2,
                'realEstateId' => 2,
            ],
        ]);
    }
}
