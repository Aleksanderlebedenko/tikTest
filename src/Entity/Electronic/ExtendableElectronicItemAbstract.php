<?php

namespace App\Entity\Electronic;

use App\ElectronicItems;
use App\Exception\TooMuchExtrasException;

abstract class ExtendableElectronicItemAbstract extends ElectronicItemsAbstract implements ExtendableItemInterface
{
    protected ElectronicItems $extras;

    public function __construct(float $price, ?ElectronicItems $extras = null)
    {
        parent::__construct($price);
        if (null === $extras) {
            $this->extras = new ElectronicItems();
            return;
        }
        $this->extras = $extras;

    }

    public function getExtras(): ElectronicItems
    {
        return $this->extras;
    }

    public function getTotalPrice(): float
    {
        /*if (null === $this->extras) {
            return $this->getPrice();
        }*/

        return $this->getPrice() + $this->getExtras()->getTotalPrice();
    }

    /**
     * @throws TooMuchExtrasException
     */
    public function setExtras(ElectronicItems $items): void
    {
        /**
         * I didn't want to make some logic in the entities,
         * I did it because of a lack of time.
         * Otherwise, we can implement validation in more sophisticated way
         */
        if (null !== static::MAX_EXTRAS && $items->count() > static::MAX_EXTRAS) {
            throw new TooMuchExtrasException(
                'The max extras count for television should be less then ' . static::MAX_EXTRAS
            );
        }
        $this->extras = $items;
    }

    /**
     * @throws TooMuchExtrasException
     */
    public function addExtra(ElectronicItemInterface $item): void
    {
        /**
         * I didn't want to make some logic in the entities,
         * I did it because of a lack of time.
         * Otherwise, we can implement validation in more sophisticated way
         */
        if (null !== static::MAX_EXTRAS && $this->extras->count() >= static::MAX_EXTRAS) {
            throw new TooMuchExtrasException(
                'The max extras count for television should be less then ' . static::MAX_EXTRAS
            );
        }

        if (null === $this->extras) {
            $this->extras[] = $item;
        }
        $this->extras->add($item);
    }
}