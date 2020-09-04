<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {DB::table('permissions')->truncate();

        DB::table('permissions')->insert(['name'=> 'storeprofile-show']);
        DB::table('permissions')->insert(['name'=> 'storeprofile-create']);
        DB::table('permissions')->insert(['name'=> 'storeprofile-edit']);
        DB::table('permissions')->insert(['name'=> 'storeprofile-delete']);
        
        DB::table('permissions')->insert(['name'=> 'category-show']);
        DB::table('permissions')->insert(['name'=> 'category-create']);
        DB::table('permissions')->insert(['name'=> 'category-edit']);
        DB::table('permissions')->insert(['name'=> 'category-delete']);
        
        DB::table('permissions')->insert(['name'=> 'product-show']);
        DB::table('permissions')->insert(['name'=> 'product-create']);
        DB::table('permissions')->insert(['name'=> 'product-edit']);
        DB::table('permissions')->insert(['name'=> 'product-delete']);
    }
}