<?php

// Primero, creamos una interfaz base DiscountInterface que manejará descuentos generales que pueden ser aplicados a cualquier tipo de pedido.

namespace Discounts;

use Models\Order;

interface DiscountInterface
{
  public function apply(Order $order): float;
}
