<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Users
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@demo.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'profile'=>1
            ],
            [
                'name' => 'Dealer User',
                'email' => 'dealer@demo.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'profile' =>2
            ],
            [
                'name' => 'Private User',
                'email' => 'private@demo.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'profile' =>3
            ]
        ]);

        // Componies
        DB::table('companies')->insert([
            'account_number'=>'D0001',
            'registred_name'=>'123Investments',
            'trading_name'=>'ABC Boats',
            'vat_number'=>'45612398712',
            'physical_address'=>'123 Main Street, Bedfordview, 0001',
            'contact_person'=>'James',
            'mobile'=>'+27 81 234 5678',
            'office_number'=>'011 345 6789',
            'website'=>'http://www.abc-boats.co.za',
            'email'=>'info@abc-boats.co.za',
            'logo'=>'',
        ]);

        DB::table('boat_categories')->insert([
            [
                'name'  =>'Bass Boats',
            ],
            [
                'name'  =>'Wake Board Boats',
            ],
            [
                'name'  =>'Inflatables',
            ],
            [
                'name'  =>'Fishing Boats',
            ],
            [
                'name'  =>'Jet Skis',
            ],
            [
                'name'  =>'Ships',
            ],
            [
                'name'  =>'Outboards',
            ],
            [
                'name'  =>'Luxury Yachts',
            ],
        ]);
//         DB::table('boats')->insert([
// 'reference' =>'A1',
// 'company_id' =>'1',
// 'vin_number' =>null,
// 'keywords' =>'',
// 'category_id' =>8,
// 'cof' =>'123456',
// 'brand' =>'Celebrations',
// 'model' =>'C32A',
// 'manufacturer' =>'Caterpillar',
// 'year_of_manufacture' =>'2018',
// 'main_color' =>'white',
// 'new_used' =>1,
// 'condition' =>9,
// 'province' =>'',
// 'city' =>'',
// 'short_description' =>'',
// 'description' =>'',
// 'retail_price' =>'',
// 'is_feature' =>'',
// 'special_price' =>'',
// 'special_start' =>'',
// 'special_end' =>'',
// 'bar_code' =>'',
// 'viewed' =>'',
// 'weight' =>'',
// 'length' =>'',
// 'breath' =>'',
// 'draught' =>'',
// 'crew' =>'',
// 'passengers' =>'',
// 'fuel_type' =>'',
// 'fuel_tank' =>'',
// 'max_speed' =>'',
// 'hull_construction' =>'',
// 'youtube_link' =>'',
// 'fb_link' =>'',
// 'is_sold' =>'',
// 'is_approved' =>'',
// 'is_active' =>'',


//         ])
    }
}
