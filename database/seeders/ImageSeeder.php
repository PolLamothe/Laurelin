<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produitsPath = public_path('pictures/produits');
        
        if (!file_exists($produitsPath)) {
            return;
        }

        $all_products = array_filter(glob($produitsPath . '/*'), 'is_dir');

        foreach ($all_products as $productPath) {
            $id_prod = basename($productPath);
            $images = glob($productPath . '/*.{webp,jpg,jpeg,png,avif}', GLOB_BRACE);

            foreach ($images as $imagePath) {
                $filename = basename($imagePath);
                $url = "/Laurelin/pictures/produits/$id_prod/$filename";

                DB::table('Image')->insert([
                    "URL" => $url,
                    "ID_PRODUIT" => $id_prod,
                ]);
            }
        }
    }
}
