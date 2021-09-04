<?php

namespace App\Entity\Electronic;

abstract class ElectronicItemsAbstract implements ElectronicItemInterface
{
    protected const MAX_EXTRAS = null;
    protected const TYPE = null;

    protected float $price;

    public function __construct(
        float $price,
    ) {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getType(): string
    {
        return static::TYPE;
    }

    public function maxExtras(): ?int
    {
        return static::MAX_EXTRAS;
    }

    public function getTotalPrice(): float
    {
        return $this->getPrice();
    }
}