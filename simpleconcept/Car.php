<?php

class Car
{
    private $brand;
    private $color;

    //Constructor
    public function __construct($brand, $color) //two underscores
    {
        $this->brand = $brand;
        $this->color = $color;
    }

    // Getter and setter methods
    //this for brand properties
    public function getBrand()
    {
        return $this->brand;
    }
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }
    //this for color properties
    public function getColor()
    {
        return $this->color; //this referes to the current object's color property
    }
    public function setColor($color)
    {
        //make only these colors to be set
        $allowedColors = [
            "red",
            "blue",
            "green",
            "yellow"
        ];
        if (in_array($color, $allowedColors)) {
            $this->color = $color;
        }
    }


    //method
    public function getCarInfo()
    {
        return "Brand: " . $this->brand . ", Color: " . $this->color;
    }
}


