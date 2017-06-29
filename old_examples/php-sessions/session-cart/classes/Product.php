<?php

/*
This class takes each product values (id, name, price) and puts them into an object.  Objects are a good way to store information.
This class also allows you to get each product value from the object.
*/
class Product {
  private $productId;
  private $productName;
  private $price;

  public function __construct( $productId, $productName, $price ) {
    $this->productId = $productId;
    $this->productName = $productName;
    $this->price = $price;
  }

  public function getId() {
    return $this->productId;
  }

  public function getName() {
    return $this->productName;
  }

  public function getPrice() {
    return $this->price;
  }

}
?>
