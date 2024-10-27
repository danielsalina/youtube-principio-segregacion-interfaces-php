<?php

namespace Models;

class PhysicalProduct extends Product
{
  public function __construct(int $id, string $name, float $price)
  {
    parent::__construct($id, $name, $price);
  }

  // Método específico para productos físicos
  public function ship(): string
  {
    return "El producto físico '{$this->name}' será enviado.";
  }
}
