<?php

namespace App\Entity\Electronic\Item;

use App\Entity\Electronic\ElectronicItemsAbstract;

final class Microwave extends ElectronicItemsAbstract
{
    public const TYPE = 'microwave';
    protected const MAX_EXTRAS = 0;
}