<?php

// Ajustamos las clases que aplican los descuentos. Las clases FixedDiscount y PercentageDiscount implementarán solo las interfaces que necesitan.

namespace Discounts;

use Models\Order;

class FixedDiscount implements FixedDiscountInterface
{
  private float $discountAmount;

  public function __construct(float $discountAmount)
  {
    $this->discountAmount = $discountAmount;
  }

  // Implementa el método de la interfaz específica
  public function applyFixedDiscount(Order $order): float
  {
    return $order->getTotal() - $this->discountAmount;
  }

  // También implementa el método general de la interfaz DiscountInterface
  public function apply(Order $order): float
  {
    return $this->applyFixedDiscount($order);
  }
}
