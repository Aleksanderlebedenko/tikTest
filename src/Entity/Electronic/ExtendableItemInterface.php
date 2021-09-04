<?php

namespace App\Entity\Electronic;

use App\ElectronicItems;

/**
 * I wanted to keep this entity immutable.
 * But it is more convenient to use setExtras and addExtras here from my point of view.
 */
interface ExtendableItemInterface
{
    public function getExtras(): ElectronicItems;

    public function setExtras(ElectronicItems $items): void;

    public function addExtra(ElectronicItemInterface $item): void;
}