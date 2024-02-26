<?php

namespace Models;

interface ProductInterface
{
    public function getId(): int|string;
    public function setName(string $name): void;
    public function getName(): string;
    public function setPrice(float $price): void;
    public function getPrice(): float;
    public function getStringPrice(): string;
}