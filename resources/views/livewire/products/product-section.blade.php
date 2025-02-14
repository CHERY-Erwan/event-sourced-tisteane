<?php

declare(strict_types=1);

use App\Domains\Product\Projections\Product;
use Livewire\Volt\Component;

new class extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::query()
            ->with([
                'variants.color',
                'variants.size',
                'variants.attributes',
            ])
            ->whereHas('category', function ($query) {
                $query->where('slug', 'solar-lamps');
            })
            ->isActive()
            ->isFeatured()
            ->orderBy('created_at', 'desc')
            ->get();
    }
};
?>

<div class="flex flex-col gap-5">
    <div class="pl-5 text-neutral-950 text-xl font-amita">@lang('pages/homepage.product_section.description')</div>
    @foreach ($this->products as $product)
        <x-products.product-card :product="$product" />
    @endforeach
</div>
