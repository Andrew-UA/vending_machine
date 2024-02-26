<?php

require __DIR__ . '/vendor/autoload.php';

use App\Application;
use Commands\CommandEnum;
use Commands\CommandImplementations\BuyItemCommand;
use Commands\CommandImplementations\SelectItemCommand;
use Commands\CommandImplementations\ShowBalanceCommand;
use Commands\CommandImplementations\ShowGoodsCommand;
use Commands\CommandImplementations\TopUpBalanceCommand;
use Models\Product;
use Models\VendingMachine;

// Innit products
$productsList = [
    [
        "name" => 'Coca-cola',
        "price" => 1.5
    ],
    [
        "name" => 'Snickers',
        "price" => 1.2
    ],
    [
        "name" => 'Lay\'s',
        "price" => 2.0
    ]
];
$products = [];
foreach ($productsList as $product) {
    $products[] = new Product($product['name'], $product['price']);
}

// Innit vending machine
$vendingMachine = new VendingMachine($products);

// Innit commands
$commands = [
    CommandEnum::SHOW_GOODS->name     => new ShowGoodsCommand,
    CommandEnum::SELECT_ITEM->name    => new SelectItemCommand,
    CommandEnum::TOP_UP_BALANCE->name => new TopUpBalanceCommand,
    CommandEnum::SHOW_BALANCE->name   => new ShowBalanceCommand,
    CommandEnum::BUY_ITEM->name       => new BuyItemCommand,
];

$app = new Application($commands, $vendingMachine);
$app->run();
