<?php

require_once 'vendor/autoload.php';

use Models\Product;
use Models\Order;
use Services\ShipmentService;
use Services\InvoiceService;
use Discounts\FixedDiscount;
use Discounts\PercentageDiscount;
use Models\PhysicalProduct;
use Models\DigitalProduct;

// Crear productos
$product1 = new Product(1, "Laptop", 1200);
$product2 = new Product(2, "Mouse", 40);
$product3 = new DigitalProduct(3, "Ebook", 100);
$product4 = new PhysicalProduct(4, "Laptop", 1500.00);
$product5 = new DigitalProduct(5, "Software", 300.00);

// Crear pedido
$order = new Order();
$order->addProduct($product1, 1);
$order->addProduct($product2, 2);


// Procesar el envío
echo "Ejemplo aplicando el principio de Responsabilidad única => ";
$shipmentService = new ShipmentService();
echo "Ejemplo aplicando el principio de Responsabilidad única => " . $shipmentService->processShipment($order);

// Enviar factura
$invoiceService = new InvoiceService();
$invoiceService->sendInvoice($order);

// Sin descuento
echo "Ejemplo aplicando el principio de Abierto-Cerrado => Total sin descuento: " . $order->getTotal() . PHP_EOL;

// Aplicar un descuento fijo
$fixedDiscount = new FixedDiscount(100);
$order->setDiscount($fixedDiscount);
echo "Ejemplo aplicando el principio de Abierto-Cerrado => Total con descuento fijo: " . $order->calculateTotalWithDiscount() . PHP_EOL;

// Aplicar un descuento porcentual
$percentageDiscount = new PercentageDiscount(10); // 10% de descuento
$order->setDiscount($percentageDiscount);
echo "Ejemplo aplicando el principio de Abierto-Cerrado => Total con descuento porcentual: " . $order->calculateTotalWithDiscount() . PHP_EOL;

// Precio con descuento
echo "Ejemplo aplicando el principio de sustitución de Liskov => Precio con descuento del producto físico 1: " . $product1->getDiscountedPrice() . PHP_EOL;
echo "Ejemplo aplicando el principio de sustitución de Liskov => Precio con descuento del producto físico 2: " . $product2->getDiscountedPrice() . PHP_EOL;
echo "Ejemplo aplicando el principio de sustitución de Liskov => Precio con descuento del producto digital: " . $product3->getDiscountedPrice() . PHP_EOL;

// Métodos específicos de productos físicos
echo "Ejemplo aplicando el principio de segregación de interfaces => " . $product4->getName() . " cuesta " . $product4->getPrice() . PHP_EOL;
echo "Ejemplo aplicando el principio de segregación de interfaces => " . $product4->ship() . PHP_EOL;

// Métodos específicos de productos digitales
echo "Ejemplo aplicando el principio de segregación de interfaces => " . $product5->getName() . " cuesta " . $product5->getPrice() . PHP_EOL;
echo "Ejemplo aplicando el principio de segregación de interfaces => " . $product5->generateDownloadLink() . PHP_EOL;
