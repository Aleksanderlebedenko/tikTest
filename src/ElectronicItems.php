<?php

namespace App;

use App\Entity\Electronic\ElectronicItemInterface;
use ArrayIterator;
use Countable;
use IteratorAggregate;

class ElectronicItems implements IteratorAggregate, Countable
{
    private array $items;

    public function __construct(ElectronicItemInterface ...$items)
    {
        $this->items = $items;
    }

    public function add(ElectronicItemInterface $item): void
    {
        $this->items[] = $item;
    }

    public function sortItemsByPrice(bool $withExtras = false): ElectronicItems
    {
        usort($this->items, static fn($a, $b) => (
            ($withExtras ? $a->getTotalPrice() : $a->getPrice())
            <=>
            ($withExtras ? $b->getTotalPrice() : $b->getPrice())
        ));

        return $this;
    }

    public function getTotalPrice(): float
    {
        $totalPrice = 0.0;
        foreach ($this->items as $item) {
            $totalPrice += $item->getTotalPrice();
        }

        return $totalPrice;
    }

    public function getItemsByType(string $type): ElectronicItems
    {
        $items = array_filter($this->items, static function ($item) use ($type) {
            return $type === $item->getType();
        });

        return new ElectronicItems(...$items);
    }

    /**
     * @return ArrayIterator|ElectronicItemInterface[]
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }
}