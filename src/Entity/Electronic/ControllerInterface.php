<?php

namespace App\Entity\Electronic;

interface ControllerInterface extends ElectronicItemInterface
{
    public function isWired(): bool;
}