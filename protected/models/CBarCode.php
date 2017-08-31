<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Yii::import('system.vendors.barcodegen.class.BCGFont');
Yii::import('system.vendors.barcodegen.class.BCGColor');
Yii::import('system.vendors.barcodegen.class.BCGDrawing');
Yii::import('system.vendors.barcodegen.class.BCGFont');
Yii::import('system.vendors.barcodegen.class.BCGcode128.barcode');
//require_once 'class/BCGcode128.barcode.php';

class CBarCode extends CApplicationComponent {

    //put your code here
    public function output($text, $scale = 1) {
        $font = new BCGFont(dirname(__FILE__) . '/class/font/Arial.ttf', 8);

        // The arguments are R, G, B for color.
        $color_black = new BCGColor(0, 0, 0);
        $color_white = new BCGColor(255, 255, 255);

        $code = new BCGcode128();
        $code->setScale($scale); // Resolution
        $code->setThickness(25); // Thickness
        $code->setForegroundColor($color_black); // Color of bars
        $code->setBackgroundColor($color_white); // Color of spaces
        $code->setFont($font); // Font (or 0)
        $code->parse($text);

        //$code->setLabel('');
        /* Here is the list of the arguments
          1 - Filename (empty : display on screen)
          2 - Background color */
        $drawing = new BCGDrawing('', $color_white);
        $drawing->setBarcode($code);
        //$drawing->draw();
        return $drawing;
        // Header that says it is an image (remove it if you save the barcode to a file)
        //header('Content-Type: image/png');

        // Draw (or save) the image into PNG format.
        //$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
    }

}
