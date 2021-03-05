<?php


class Product
{
    private int $id;
    private string $title;
    private float $price;
    private int $availableQuantity;

    // TODO Generate constructor with all properties of the class
    public function __CONSTRUCT($id, $title, $price, $availableQuantity) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }

    // TODO Generate getters and setters of properties

    public function getProductName() {
        return $this->title;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getQuantity() {
        return $this->availableQuantity;
    }

    public function decreaseQuantity($amount) {
        $this->availableQuantity -= $amount;
    }

    public function increaseQuantity($amount) {
        $this->availableQuantity += $amount;
    }

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Cart $cart
     * @param int $quantity
     * @return CartItem
     */

    public function addToCart(Cart $cart, int $quantity): CartItem
    {
        $product = new Product($this->id, $this->title, $this->price, $this->availableQuantity);
        $cartItem = $cart->addProduct($product, $quantity);

        return $cartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Cart $cart
     */
    public function removeFromCart(Cart $cart)
    {
        //TODO Implement method

    }
}