<?php

declare(strict_types=1);

namespace App\Domains\Product;

use App\Domains\Product\Data\ProductDetailsData;
use App\Domains\Product\Data\ProductIdentifiersData;
use App\Domains\Product\Data\ProductVariantDetailsData;
use App\Domains\Product\Events\ProductAttributeCreated;
use App\Domains\Product\Events\ProductCreated;
use App\Domains\Product\Events\ProductVariantCreated;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

final class ProductAggregateRoot extends AggregateRoot
{
    /**
     * Crée un produit.
     */
    public function createProduct(ProductIdentifiersData $identifiers, ProductDetailsData $details, string $categoryUuid): self
    {
        $this->recordThat(new ProductCreated(
            identifiers: $identifiers,
            details: $details,
            categoryUuid: $categoryUuid,
        ));

        return $this;
    }

    /**
     * Crée un variant de produit.
     */
    public function createProductVariant(ProductIdentifiersData $identifiers, ProductVariantDetailsData $details, string $productUuid): self
    {
        $this->recordThat(new ProductVariantCreated(
            identifiers: $identifiers,
            details: $details,
            productUuid: $productUuid,
        ));

        return $this;
    }

    /**
     * Crée un attribut de produit.
     */
    public function createProductAttribute(string $productVariantUuid, string $key, string $value): self
    {
        $this->recordThat(new ProductAttributeCreated(
            productVariantUuid: $productVariantUuid,
            key: $key,
            value: $value,
        ));

        return $this;
    }
}
