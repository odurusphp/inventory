<?php

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

try {
    // Enter the share name for your USB printer here
    $connector = new WindowsPrintConnector("PrinceUSBPrinter");
    $printer = new Printer($connector);
    $image = EscposImage::load(PUBLIC_PATH.'/logo.png', false);
    $printer -> bitImage($image);
    $printer -> setTextSize(2,2);
    $printer -> setEmphasis(true);
    $printer->text("OFFICIAL RECEIPT\n");
    $printer -> setTextSize(1,1);
    $printer -> setEmphasis(true);
    $printer->text("Cashier: " .strtoupper('Testing Prince'). "\n");
    $printer -> text("\n");


    $printer -> cut();
    /* Close printer */
    $printer -> close();
} catch(Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}



?>