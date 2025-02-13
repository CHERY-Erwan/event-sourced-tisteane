<?php

namespace Database\Seeders;

use App\Domains\Product\ProductAggregateRoot;
use App\Domains\Product\Projections\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductAttributeSeeder extends Seeder
{
    public function run()
    {
        $attributes = [
            [
                'uuid' => Str::uuid(),
                'product_variant_uuid' => ProductVariant::where('sku', 'LEO-U-LIGHT-GREEN')->first()->uuid,
                'key' => 'Battery Life',
                'value' => '10 hours',
            ],
            [
                'uuid' => Str::uuid(),
                'product_variant_uuid' => ProductVariant::where('sku', 'LEO-U-LIGHT-GREEN')->first()->uuid,
                'key' => 'Material',
                'value' => 'Bamboo',
            ],
            [
                'uuid' => Str::uuid(),
                'product_variant_uuid' => ProductVariant::where('sku', 'LEO-U-LIGHT-GREEN')->first()->uuid,
                'key' => 'Material',
                'value' => 'Recycled Plastic',
            ],
            [
                'uuid' => Str::uuid(),
                'product_variant_uuid' => ProductVariant::where('sku', 'LEO-U-ANTIQUE-PINK')->first()->uuid,
                'key' => 'Wood Type',
                'value' => 'Oak',
            ],
        ];

        foreach ($attributes as $attribute) {
            ProductAggregateRoot::retrieve($attribute['uuid'])
                ->createProductAttribute(
                    productVariantUuid: $attribute['product_variant_uuid'],
                    key: $attribute['key'],
                    value: $attribute['value'],
                )
                ->persist();
        }
    }
}
