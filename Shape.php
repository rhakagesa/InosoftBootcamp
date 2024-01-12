<?php

abstract class Shape {
    protected string $shape;
    protected float $scale;

    public function __construct(string $shape, float $scale) {
        $this->shape = $shape;
        $this->scale = $scale;
    }

    public function __destruct() {
        return "Bangun datar ini adalah ".$this->shape;
    }

    abstract public function getArea();

    abstract public function getCircumference();

    abstract public function getEnlarge();

    abstract public function getShrink($scaleForShrink);

}

class Circle extends Shape {
    protected float $r;

    public function __construct(float $r, string $shape, float $scale){
        $this->r = $r;
        parent::__construct($shape, $scale);
    }

    public function __destruct(){
        return "Bangun datar ini adalah ".$this->shape." dengan luas ".$this->getArea()." dan keliling ".$this->getCircumference();
    }

    public function getArea(): float{
        return 3.14 * $this->r * $this->r;
    }

    public function getCircumference(): float{
        return 2 * 3.14 * $this->r;
    }

    public function getEnlarge(): float{
        return $this->r * $this->scale;
    }

    public function getShrink($scaleForShrink): string {
        if(0 < $scaleForShrink && $scaleForShrink < 1){
            return $this->r * $this->scale;
        } else {
            return "Masukkan nilai skala diantara 0 < skala < 1";
        }

    }
    
    
}

class Rectangle extends Shape {
    protected float $width;
    protected float $length;

    public function __construct(float $length, float $width, string $shape, float $scale){
        $this->length = $length;
        $this->width = $width;
        parent::__construct($shape, $scale);
    }

    public function __destruct(){
        return "Bangun datar ini adalah ".$this->shape." dengan luas ".$this->getArea()." dan keliling ".$this->getCircumference();
    }

    public function getArea(): float{
        return $this->length * $this->width;
    }

    public function getCircumference(): float{
        return 2 * ($this->length + $this->width);
    }

    public function getEnlarge(): string {
        $newLengthValue = $this->length * $this->scale;
        $newWidthValue = $this->width * $this->scale; 
        return "Skala diperbesar\nPanjang : ".$newLengthValue."\nLebar : ".$newWidthValue;
    }

    public function getShrink($scaleForShrink): string { 
        if(0 < $scaleForShrink && $scaleForShrink < 1){
            $newLengthValue = $this->length * $scaleForShrink;
            $newWidthValue = $this->width * $scaleForShrink;
            return "Skala diperkecil\nPanjang : ".$newLengthValue."\nLebar : ".$newWidthValue;
        } else {
            return "Masukkan nilai skala diantara 0 < skala < 1";
        }
    }

} 

class Square extends Shape {

    protected float $base;

    public function __construct(float $base, string $shape, float $scale){
        $this->base = $base;
        parent::__construct($shape, $scale);
    }

    public function __destruct(){
        return "Bangun datar ini adalah ".$this->shape." dengan luas ".$this->getArea()." dan keliling ".$this->getCircumference();
    }

    public function getArea(): float{
        return $this->base * $this->base;
    }

    public function getCircumference(): float{
        return 4 * $this->base;
    }

    public function getEnlarge(): float{
        return $this->base * $this->scale;
    }

    public function getShrink($scaleForShrink): float{
        if(0 < $scaleForShrink || $scaleForShrink < 1) {        
            return $this->base * $this->scale;
        }
    }

}

$circle = new Circle(5, "Lingkaran", 3);
$square = new Square(4, "Kotak", 4);
$rectangle = new Rectangle(3, 6, "Persegi Panjang", 5.5);

echo $circle->__destruct()."\n";
echo $square->__destruct()."\n";
echo $rectangle->__destruct()."\n\n\n";

echo $circle->getEnlarge()."\n";
echo $square->getEnlarge()."\n";
echo $rectangle->getEnlarge()."\n\n\n";

echo $circle->getShrink(0.5)."\n";
echo $square->getShrink(0.3)."\n";
echo $rectangle->getShrink(0.2)."\n\n\n";


