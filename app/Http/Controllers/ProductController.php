<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            (object)[
                'name' => 'Membership Bulanan',
                'price' => 150000,
                'description' => 'Akses alat gym lengkap. Bebas jam kunjungan.',
                'stock' => 50,
                'image' => null
            ],
            (object)[
                'name' => 'Fat Loss Bootcamp',
                'price' => 250000,
                'description' => 'Program terpandu untuk menurunkan persentase lemak tubuh secara efektif.',
                'stock' => 15,
                'image' => null
            ],
            (object)[
                'name' => 'Home Coaching',
                'price' => 100000,
                'description' => 'Program latihan intensif tanpa alat berat yang praktis dilakukan di kosan.',
                'stock' => 99,
                'image' => null
            ],
             (object)[
                'name' => 'Promo Mahasiswa',
                'price' => 120000,
                'description' => 'Akses gym khusus pelajar/mahasiswa (Wajib menunjukkan KTM aktif).',
                'stock' => 30,
                'image' => null
            ]
        ];

        return view('landing', compact('products'));
    }
}