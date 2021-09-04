<?php

namespace App\Entity\Electronic\Item;

use App\Entity\Electronic\ExtendableElectronicItemAbstract;

final class Television extends ExtendableElectronicItemAbstract
{
    public const TYPE = 'television';
    protected const MAX_EXTRAS = null; // null means 'without limits'.
}