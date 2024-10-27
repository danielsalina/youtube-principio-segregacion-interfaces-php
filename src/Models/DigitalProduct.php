<?php

namespace Models;

class DigitalProduct extends Product
{
  public function __construct(int $id, string $name, float $price)
  {
    parent::__construct($id, $name, $price);
  }

  // Método específico para productos digitales
  public function generateDownloadLink(): string
  {
    return "Enlace de descarga generado para el producto digital '{$this->name}' => https://www.youtube.com/@Dani-Code ❤";
  }

  // Los productos digitales tienen un precio reducido, se sobreescribe el método
  public function getDiscountedPrice(): float
  {
    return $this->price / 2; // Ejemplo: precio con 50% de descuento para productos digitales
  }
}
