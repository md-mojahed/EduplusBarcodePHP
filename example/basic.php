<?php

require_once __DIR__.'/../src/EduplusBarcode.php';

use Mojahed\EduplusBarcode;

// Example 1: Basic Code128 barcode
echo "Example 1: Basic Code128 Barcode\n";
$barcode = EduplusBarcode::create()
    ->text("ABC123")
    ->output("output/code128.png")
    ->generate();

if ($barcode) {
    echo "✓ Code128 barcode generated: output/code128.png\n\n";
} else {
    echo "✗ Failed to generate barcode\n";
    print_r(EduplusBarcode::create()->errors);
}

// Example 2: Code39 barcode with custom size
echo "Example 2: Code39 Barcode with custom size\n";
$barcode2 = EduplusBarcode::create()
    ->text("PRODUCT-001")
    ->output("output/code39.png")
    ->type('code39')
    ->width(400)
    ->height(120)
    ->generate();

if ($barcode2) {
    echo "✓ Code39 barcode generated: output/code39.png\n\n";
} else {
    echo "✗ Failed to generate Code39 barcode\n";
}

// Example 3: EAN-13 barcode
echo "Example 3: EAN-13 Barcode\n";
$barcode3 = EduplusBarcode::create()
    ->text("1234567890128")
    ->output("output/ean13.png")
    ->type('ean13')
    ->width(400)
    ->height(150)
    ->generate();

if ($barcode3) {
    echo "✓ EAN-13 barcode generated: output/ean13.png\n\n";
} else {
    echo "✗ Failed to generate EAN-13 barcode\n";
}

// Example 4: Quick method
echo "Example 4: Quick generation\n";
$result = EduplusBarcode::quick("SKU-12345", "output/quick.png", "code128", 350, 110);

if ($result) {
    echo "✓ Quick barcode generated: output/quick.png\n\n";
} else {
    echo "✗ Failed to generate quick barcode\n";
}

// Example 5: Generate and get base64
echo "Example 5: Generate and return base64\n";
$base64 = EduplusBarcode::create()
    ->text("BASE64-TEST")
    ->output("output/base64_barcode.png")
    ->type('code128')
    ->width(300)
    ->height(100)
    ->generateBase64();

if ($base64) {
    echo "✓ Base64 barcode generated (length: " . strlen($base64) . " chars)\n";
    echo "Data URI: data:image/png;base64," . substr($base64, 0, 50) . "...\n\n";
} else {
    echo "✗ Failed to generate base64 barcode\n";
}

// Example 6: Product inventory barcode
echo "Example 6: Product Inventory Barcode\n";
$inventory = EduplusBarcode::create()
    ->text("INV-2025-001")
    ->output("output/inventory.png")
    ->type('code128')
    ->width(400)
    ->height(120)
    ->generate();

if ($inventory) {
    echo "✓ Inventory barcode generated: output/inventory.png\n";
} else {
    echo "✗ Failed to generate inventory barcode\n";
}
