<?php

// Extienden de la interfaz base

namespace Discounts;

use Models\Order;

interface FixedDiscountInterface extends DiscountInterface
{
  public function applyFixedDiscount(Order $order): float;
}
