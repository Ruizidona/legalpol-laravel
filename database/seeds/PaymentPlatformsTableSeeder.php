<?php

use App\PaymentPlatform;
use Illuminate\Database\Seeder;

class PaymentPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        PaymentPlatform::create([
            'name' => 'MercadoPago',
            'image' => 'images/payment-platforms/mercadopago.jpg',
        ]);

        PaymentPlatform::create([
            'name' => 'SPS DECIDIR',
            'image' => 'images/payment-platforms/payu.jpg',
        ]);
    }
}