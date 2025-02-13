<?php

namespace Database\Seeders;

use App\Domains\Product\Data\ProductIdentifiersData;
use App\Domains\Product\Data\ProductVariantDetailsData;
use App\Domains\Product\ProductAggregateRoot;
use App\Domains\Product\Projections\Product;
use App\Domains\Shared\Data\PriceData;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductVariantSeeder extends Seeder
{
    public function run()
    {
        $variants = [
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'CST')->first()->uuid,
                'sku' => 'CST-U-U',
                'slug' => 'solar-lid-t082-unique-unique',
                'size_id' => Size::where('code', 'U')->first()->id,
                'color_id' => Color::where('code', 'BLACK')->first()->id,
                'price' => PriceData::from(['amount' => 1999]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'CSLP')->first()->uuid,
                'sku' => 'CSLP-U-U',
                'slug' => 'solar-lid-le-parfait-unique-unique',
                'size_id' => Size::where('code', 'U')->first()->id,
                'color_id' => Color::where('code', 'BLACK')->first()->id,
                'price' => PriceData::from(['amount' => 2499]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'LP')->first()->uuid,
                'sku' => 'LP-S-BLACK',
                'slug' => 'le-parfait-solar-lamp-black-small',
                'size_id' => Size::where('code', 'S')->first()->id,
                'color_id' => Color::where('code', 'BLACK')->first()->id,
                'price' => PriceData::from(['amount' => 2499]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'LP')->first()->uuid,
                'sku' => 'LP-M-BLACK',
                'slug' => 'le-parfait-solar-lamp-black-medium',
                'size_id' => Size::where('code', 'M')->first()->id,
                'color_id' => Color::where('code', 'BLACK')->first()->id,
                'price' => PriceData::from(['amount' => 2749]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'LP')->first()->uuid,
                'sku' => 'LP-L-BLACK',
                'slug' => 'le-parfait-solar-lamp-black-large',
                'size_id' => Size::where('code', 'L')->first()->id,
                'color_id' => Color::where('code', 'BLACK')->first()->id,
                'price' => PriceData::from(['amount' => 2999]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'PDL')->first()->uuid,
                'sku' => 'PDL-U-LIGHT-GREEN',
                'slug' => 'pot-de-lait-light-green-unique',
                'size_id' => Size::where('code', 'U')->first()->id,
                'color_id' => Color::where('code', 'LIGHT-GREEN')->first()->id,
                'price' => PriceData::from(['amount' => 1499]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'PDL')->first()->uuid,
                'sku' => 'PDL-U-AZURE-BLUE',
                'slug' => 'pot-de-lait-azure-blue-unique',
                'size_id' => Size::where('code', 'U')->first()->id,
                'color_id' => Color::where('code', 'AZURE-BLUE')->first()->id,
                'price' => PriceData::from(['amount' => 1499]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'PDL')->first()->uuid,
                'sku' => 'PDL-U-ANTIQUE-PINK',
                'slug' => 'pot-de-lait-antique-pink-unique',
                'size_id' => Size::where('code', 'U')->first()->id,
                'color_id' => Color::where('code', 'ANTIQUE-PINK')->first()->id,
                'price' => PriceData::from(['amount' => 1499]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'PDL')->first()->uuid,
                'sku' => 'PDL-U-MELON',
                'slug' => 'pot-de-lait-melon-unique',
                'size_id' => Size::where('code', 'U')->first()->id,
                'color_id' => Color::where('code', 'MELON')->first()->id,
                'price' => PriceData::from(['amount' => 1499]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'LEO')->first()->uuid,
                'sku' => 'LEO-U-LIGHT-GREEN',
                'slug' => 'leonardo-solar-lamp-light-green-unique',
                'size_id' => Size::where('code', 'U')->first()->id,
                'color_id' => Color::where('code', 'LIGHT-GREEN')->first()->id,
                'price' => PriceData::from(['amount' => 1699]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'LEO')->first()->uuid,
                'sku' => 'LEO-U-AZURE-BLUE',
                'slug' => 'leonardo-solar-lamp-azure-blue-unique',
                'size_id' => Size::where('code', 'U')->first()->id,
                'color_id' => Color::where('code', 'AZURE-BLUE')->first()->id,
                'price' => PriceData::from(['amount' => 1699]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'LEO')->first()->uuid,
                'sku' => 'LEO-U-ANTIQUE-PINK',
                'slug' => 'leonardo-solar-lamp-antique-pink-unique',
                'size_id' => Size::where('code', 'U')->first()->id,
                'color_id' => Color::where('code', 'ANTIQUE-PINK')->first()->id,
                'price' => PriceData::from(['amount' => 1699]),
                'is_active' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'product_uuid' => Product::where('sku', 'LEO')->first()->uuid,
                'sku' => 'LEO-U-MELON',
                'slug' => 'leonardo-solar-lamp-melon-unique',
                'size_id' => Size::where('code', 'U')->first()->id,
                'color_id' => Color::where('code', 'MELON')->first()->id,
                'price' => PriceData::from(['amount' => 1699]),
                'is_active' => true,
            ],
        ];

        foreach ($variants as $variant) {
            ProductAggregateRoot::retrieve($variant['uuid'])
                ->createProductVariant(
                    identifiers: new ProductIdentifiersData($variant['uuid'], $variant['sku'], $variant['slug']),
                    details: new ProductVariantDetailsData($variant['size_id'], $variant['color_id'], $variant['price']->amount, $variant['is_active']),
                    productUuid: $variant['product_uuid'],
                )
                ->persist();
        }
    }
}
