<?php

namespace App\Entity\Electronic\Item;

use App\Entity\Electronic\ControllerInterface;
use App\Entity\Electronic\ElectronicItemsAbstract;

class Controller extends ElectronicItemsAbstract implements ControllerInterface
{
    public const TYPE = 'controller';
    protected const MAX_EXTRAS = 0;

    private bool $wired;

    public function __construct(
        float $price,
        bool $wired = false
    ) {
        parent::__construct($price);
        $this->wired = $wired;
    }

    public function isWired(): bool
    {
        return $this->wired;
    }
}