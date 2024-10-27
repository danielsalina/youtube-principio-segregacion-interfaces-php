<?php

namespace Models;

class Product
{
    public function __construct(protected int $id, protected string $name, protected float $price) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    // Método común para obtener precio con descuento (puede ser sobrescrito)
    public function getDiscountedPrice(): float
    {
        return $this->price;
    }
}
