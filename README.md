# EduplusBarcode PHP SDK

[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

EduplusBarcode is a lightweight, high-performance PHP SDK for generating barcodes using a fast Go binary backend. It generates PNG barcodes from plain strings with zero external PHP dependencies and supports multiple barcode formats.

------------------------------------------------------------
## Features
------------------------------------------------------------

- **Lightning Fast**: Powered by optimized Go binary
- **Zero PHP Dependencies**: No GD, ImageMagick, or other extensions required
- **Cross-Platform**: Works on Linux (amd64/arm64), macOS (amd64/arm64), and Windows
- **Multiple Formats**: Code128, Code39, EAN-13
- **Fluent API**: Clean, chainable method syntax
- **Flexible Output**: Save to file, return binary data, or get base64 encoded
- **Customizable**: Configure width, height, and barcode type
- **cPanel Compatible**: Works even with restricted PHP functions

------------------------------------------------------------
## Installation
------------------------------------------------------------

Install via Composer:
```bash
composer require mojahed/eduplusbarcode
```

------------------------------------------------------------
## Quick Start
------------------------------------------------------------

```php
<?php
use Mojahed\EduplusBarcode;

// Simple usage
EduplusBarcode::quick("ABC123", "barcode.png");

// Fluent API
EduplusBarcode::create()
    ->text("PRODUCT-001")
    ->output("barcode.png")
    ->type('code39')
    ->width(400)
    ->height(120)
    ->generate();
```

------------------------------------------------------------
## Usage Examples
------------------------------------------------------------

### 1. Basic Code128 Barcode
```php
use Mojahed\EduplusBarcode;

$barcode = EduplusBarcode::create()
    ->text("ABC123")
    ->output("output/barcode.png")
    ->generate();

if ($barcode) {
    echo "Barcode generated successfully!";
} else {
    print_r(EduplusBarcode::create()->errors);
}
```

### 2. Code39 Barcode with Custom Size
```php
EduplusBarcode::create()
    ->text("PRODUCT-001")
    ->output("product.png")
    ->type('code39')
    ->width(400)
    ->height(120)
    ->generate();
```

### 3. EAN-13 Retail Barcode
```php
EduplusBarcode::create()
    ->text("1234567890128")
    ->output("retail.png")
    ->type('ean13')
    ->width(400)
    ->height(150)
    ->generate();
```

### 4. Get Base64 Encoded Barcode
```php
$base64 = EduplusBarcode::create()
    ->text("BASE64-TEST")
    ->output("temp_barcode.png")
    ->generateBase64();

// Use in HTML
echo '<img src="data:image/png;base64,' . $base64 . '" />';
```

### 5. Get Binary Data
```php
$binaryData = EduplusBarcode::create()
    ->text("BINARY-TEST")
    ->output("temp_barcode.png")
    ->generateAndReturn();

// Send as HTTP response
header('Content-Type: image/png');
echo $binaryData;
```

### 6. Quick Method
```php
// Quick generation with defaults
EduplusBarcode::quick("SKU-12345", "barcode.png");

// Quick with custom parameters
EduplusBarcode::quick("PRODUCT-001", "barcode.png", "code39", 400, 120);
```

------------------------------------------------------------
## API Methods
------------------------------------------------------------

### `create()`
Create a new EduplusBarcode instance.

### `text($text)`
Set the text to encode in the barcode.

### `output($path)`
Set the output file path. Directory will be created automatically if it doesn't exist.

### `type($type)`
Set barcode type: 'code128', 'code39', or 'ean13' (default: 'code128').

### `width($pixels)`
Set the barcode width in pixels (default: 300).

### `height($pixels)`
Set the barcode height in pixels (default: 100).

### `generate()`
Generate the barcode and save to file. Returns `true` on success, `false` on failure.

### `generateAndReturn()`
Generate the barcode and return binary PNG data.

### `generateBase64()`
Generate the barcode and return base64 encoded string.

### `quick($text, $output, $type = 'code128', $width = 300, $height = 100)`
Static method for quick barcode generation.

### `$errors`
Array containing error messages from the last operation.

------------------------------------------------------------
## Barcode Types
------------------------------------------------------------

### Code128 (Default)
- **Best for**: Alphanumeric data, general purpose
- **Characters**: All ASCII characters (0-127)
- **Use cases**: Product codes, shipping labels, inventory

```php
EduplusBarcode::create()
    ->text("ABC-123-XYZ")
    ->output("code128.png")
    ->type('code128')
    ->generate();
```

### Code39
- **Best for**: Alphanumeric with special characters
- **Characters**: A-Z, 0-9, and special chars (-, ., $, /, +, %, space)
- **Use cases**: Industrial applications, government IDs

```php
EduplusBarcode::create()
    ->text("PRODUCT-001")
    ->output("code39.png")
    ->type('code39')
    ->generate();
```

### EAN-13
- **Best for**: Retail products
- **Characters**: Exactly 13 digits (numeric only)
- **Use cases**: Retail barcodes, ISBN

```php
EduplusBarcode::create()
    ->text("1234567890128")
    ->output("ean13.png")
    ->type('ean13')
    ->generate();
```

------------------------------------------------------------
## Configuration Options
------------------------------------------------------------

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| text | string | required | Text to encode |
| output | string | required | Output file path |
| type | string | 'code128' | Barcode type: code128, code39, ean13 |
| width | int | 300 | Barcode width in pixels |
| height | int | 100 | Barcode height in pixels |

------------------------------------------------------------
## cPanel Compatibility
------------------------------------------------------------

The package automatically handles restricted hosting environments:

- Detects if `chmod` is disabled
- Falls back to home directory (`~/eduplus_barcode_bin/`) if needed
- Auto-creates directory and copies binary
- Validates all PHP functions before use

This ensures the package works even when common PHP functions are disabled in cPanel or shared hosting.

------------------------------------------------------------
## Requirements
------------------------------------------------------------

- PHP 7.4 or higher
- Linux (amd64/arm64), macOS (amd64/arm64), or Windows (amd64)
- No PHP extensions required

------------------------------------------------------------
## Platform Support
------------------------------------------------------------

The package automatically detects your platform and uses the appropriate binary:
- Linux x86_64 (amd64)
- Linux ARM64 (aarch64)
- macOS Intel (amd64)
- macOS Apple Silicon (arm64)
- Windows x86_64 (amd64)

------------------------------------------------------------
## Performance
------------------------------------------------------------

EduplusBarcode is optimized for high-volume generation:
- Generates barcodes in milliseconds
- Minimal memory footprint
- No PHP extension dependencies
- Production-ready for server environments

------------------------------------------------------------
## Use Cases
------------------------------------------------------------

- **Retail**: Product barcodes, price tags, inventory management
- **Logistics**: Shipping labels, package tracking
- **Manufacturing**: Part identification, quality control
- **Healthcare**: Patient wristbands, medication tracking
- **Warehousing**: Bin locations, asset management
- **E-commerce**: Order fulfillment, SKU management

------------------------------------------------------------
## Author
------------------------------------------------------------

**Md Mojahedul Islam**
- Email: dev.mojahedul@gmail.com
- Website: https://md-mojahed.github.io

------------------------------------------------------------
## License
------------------------------------------------------------

MIT License - see LICENSE file for details

------------------------------------------------------------
## Contributing
------------------------------------------------------------

Contributions are welcome! Please feel free to submit a Pull Request.
