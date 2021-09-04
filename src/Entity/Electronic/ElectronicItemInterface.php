<?php

namespace App\Entity\Electronic;

interface ElectronicItemInterface
{
    public function getPrice(): float;

    public function getType(): string;

    public function getTotalPrice(): float;

    /**
     * I would like to put it to ExtendableItemInterface, but in the condition of the task exists
     * 'Every ElectronicItem must have a function called maxExtras'
     */
    public function maxExtras(): ?int;
}