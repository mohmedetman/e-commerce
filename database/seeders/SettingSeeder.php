<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ModuleAdmin\Entities\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::setMany([
            'default_locale' => 'ar',
            'default_timezone' => 'Africa/Cairo',
            'reviews_enabled' => true,
            'auto_approve_reviews' => true,
            'supported_currencies' => ['USD','LE','SAR'],
            'default_currency' => 'USD',
            'store_email' => 'admin@ecommerce.test',
            'search_engine' => 'mysql',
            'local_shipping_cost' => 0,
            'outer_shipping_cost' => 0,
            'free_shipping_cost' => 0,
            'etman_store' => "mohmedetman",
        
            'translatable' => [
                'store_name' => 'Emamy Store',
                'free_label' => 'Free Shipping',
                'local_label' => 'Local shipping',
                'outer_label' => 'outer shipping',
            ],
        ]);
    }
}