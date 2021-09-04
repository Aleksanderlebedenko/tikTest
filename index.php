<?php

require 'vendor/autoload.php';

use App\ElectronicItems;
use App\Entity\Electronic\ExtendableItemInterface;
use App\Entity\Electronic\Item\Console;
use App\Entity\Electronic\Item\Controller;
use App\Entity\Electronic\Item\Microwave;
use App\Entity\Electronic\Item\Television;

/**
 * Create console for purchase
 */
$console = new Console(800.0);
$console->setExtras(new ElectronicItems(
    new Controller(10),
    new Controller(10),
    new Controller(5, true),
    new Controller(5, true)
));

/**
 * Create television 1 for purchase
 */
$tvFirst = new Television(400.0);
$tvFirst->setExtras(new ElectronicItems(
        new Controller(7),
        new Controller(7),
    )
);

/**
 * Create television 2 for purchase
 */
$tvSecond = new Television(500.0);
$tvSecond->addExtra(
    new Controller(7)
);

/**
 * Create microwave for purchase
 */
$microwave = new Microwave(250.0);

/**
 * Create purchase
 */
$purchase = new ElectronicItems(
    $console,
    $tvFirst,
    $tvSecond,
    $microwave
);

/**
 * Sort items by price.
 */
echo "Items before sorting:\n";
showItems($purchase);
$purchase->sortItemsByPrice(true);
echo "\nItems after sorting:\n";
showItems($purchase);

echo "\nTotal price including extras: ";
echo $purchase->getTotalPrice();

/**
 * Get prices by item type
 */
echo "\n\nHow much console's and their controllers cost?\n";
showPricesByType($purchase, Console::TYPE);

/**
 * @param ElectronicItems $items
 *
 * @return void
 */
function showItems(ElectronicItems $items): void
{
    foreach ($items as $item) {
        echo "{$item->getType()} - {$item->getPrice()} - {$item->getTotalPrice()}\n";
    }
}

/**
 * @param ElectronicItems $items
 * @param string $type
 *
 * @return void
 */
function showPricesByType(ElectronicItems $items, string $type): void
{
    $filteredItems = $items->getItemsByType($type);

    if ($filteredItems->count() <= 0) {
        echo "I didn't buy any {$type}s";
    }

    foreach ($filteredItems as $item) {
        echo "I've bought {$item->getType()} for {$item->getPrice()}$.\n";
        if ($item instanceof ExtendableItemInterface) {
            $extras = $item->getExtras();
            if ($extras->count() <= 0) {
                return;
            }
            echo "And controllers for {$extras->getTotalPrice()}$.\n";
        }
    }
}