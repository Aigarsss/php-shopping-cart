<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    // TODO Generate getters and setters of properties

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        //TODO Implement method


        if (empty($this->items)) {
            $product->decreaseQuantity($quantity);
            $cartItem = new CartItem($product, $quantity);
            array_push($this->items, $cartItem);
            return $cartItem;
        }

        foreach($this->items as $key => $item ) {
            if ($item->getCartProduct() == $product) {
                $product->decreaseQuantity($quantity);
                while ($quantity > 0) {
                    $item->increaseQuantity();
                    $quantity -= 1;
                }
                return $item;
                
            } else {
                $cartItem = new CartItem($product, $quantity);
                array_push($this->items, $cartItem);
                return $cartItem;
            }
        }


    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        //TODO Implement method
        foreach($this->items as $key => $item  ) {
            if ($item->getCartProduct() == $product) {
                unset($this->items[$key]);
                // echo $item->getCartProduct()->getProductName() . $key .  " needs to go";
            }
        }

    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        // echo '<pre>'; var_dump($this->items); echo '</pre>';

        $itemsInCart = 0;

        foreach($this->items as $item ) {
            $itemsInCart += $item->getQuantity();
        }

        return $itemsInCart;

        // return count($this->items);
        
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $sum = 0;
        // var_dump($this->items);
        foreach($this->items as $item ) {
            $sum += $item->getCartProduct()->getPrice() * $item->getQuantity();
        }

        return $sum;
    }
}