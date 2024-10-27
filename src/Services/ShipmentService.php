<?php

namespace Services;

use Models\Order;

class ShipmentService
{
    public function processShipment(Order $order)
    {
        echo "Envío procesado para pedido con total: {$order->getTotal()}\n";
    }
}
