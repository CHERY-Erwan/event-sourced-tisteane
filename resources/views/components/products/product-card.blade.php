<section class="relative overflow-hidden rounded-3xl w-full shadow-2xl h-[400px] group">
    <div class="absolute inset-0">
        <img
            src="{{ $product->homepage_attachment }}"
            alt="No alt"
            class="w-full h-full object-cover object-center image-hover"
            loading="lazy"
            decoding="async"
        />
    </div>
    <div class="relative h-full z-10 p-5 flex flex-col justify-between bg-gradient-to-t from-black/50 to-transparent">
        <div class="flex justify-between">
            <div class="py-3 px-4 border border-neutral-950 rounded-lg shadow-lg bg-neutral-950 text-cream text-base opacity-80">
                {{ $product->short_label }}
            </div>

            <div class="flex items-center py-3 px-4 justify-center text-base bg-neutral-400 rounded-lg shadow-lg opacity-80
                @if($product->stock > 0) text-green-700 @else text-red-700 @endif">
                @lang($product->stock > 0 ? 'pages/homepage.product_card.in_stock' : 'pages/homepage.product_card.out_of_stock')
            </div>
        </div>

        <div class="flex flex-col gap-5">
            <div class="text-cream text-xl">
                {{ $product->short_description }}
            </div>

            <div class="flex">
                <x-button-arrow
                    wire:click="$dispatch('open-product-modal', { product: '{{ $product }}' })"
                    variant="light"
                >
                    {{ __("pages/homepage.product_card.open_product") }}
                </x-button-arrow>
            </div>
        </div>
    </div>
</section>
