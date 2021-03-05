<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    // TODO Generate constructor with all properties of the class
    public function __CONSTRUCT($product, $quantity) {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    // TODO Generate getters and setters of properties
    public function getQuantity(){
        return $this->quantity;
    }

    public function getCartProduct(){
        return $this->product;
    }
    

    public function increaseQuantity()
    {
        //TODO $quantity must be increased by one.        
        // Bonus: $quantity must not become more than whatever is Product::$availableQuantity
        if ($this->product->getQuantity() - 1 > - 1) {
            echo "we still have stock";
            $this->product->decreaseQuantity(1);
            $this->quantity += 1;
  
        } else {
            echo "all out";
        }



    }

    public function decreaseQuantity()
    {
        //TODO $quantity must be increased by one.
        // Bonus: Quantity must not become less than 1
    }
}