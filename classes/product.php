<?php

class Product {
    private $name;
    private $image;
    private $price;

    public function __construct( $name, $image, $price)
    {
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
    }
}