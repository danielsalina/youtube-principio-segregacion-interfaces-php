<?php

// Extienden de la interfaz base

namespace Discounts;

use Models\Order;

interface PercentageDiscountInterface extends DiscountInterface
{
  public function applyPercentageDiscount(Order $order): float;
}
