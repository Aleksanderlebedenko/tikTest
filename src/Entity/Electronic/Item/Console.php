<?php

namespace App\Entity\Electronic\Item;

use App\Entity\Electronic\ExtendableElectronicItemAbstract;

final class Console extends ExtendableElectronicItemAbstract
{
    public const TYPE = 'console';
    protected const MAX_EXTRAS = 4;
}