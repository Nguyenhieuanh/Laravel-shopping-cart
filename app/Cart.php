<?php

namespace App;

class Cart
{
    protected $items = null;
    protected $totalPrice = 0;
    protected $totalQty = 0;

    public function __construct($oldCard)
    {
        if ($oldCard) {
            $this->items = $oldCard->items;
            $this->totalPrice = $oldCard->totalPrice;
            $this->totalQty = $oldCard->totalQty;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function remove($id)
    {
        $removedItem = $this->items[$id];
        $this->totalQty = $this->totalQty - $removedItem['qty'];
        $this->totalPrice = $this->totalPrice - $removedItem['price'];
        unset($this->items[$id]);
    }

    /**
     * Get the value of totalQty
     */
    public function getTotalQty()
    {
        return $this->totalQty;
    }

    /**
     * Set the value of totalQty
     *
     * @return  self
     */
    public function setTotalQty($totalQty)
    {
        $this->totalQty = $totalQty;

        return $this;
    }

    /**
     * Get the value of totalPrice
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get the value of items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set the value of items
     *
     * @return  self
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }
}
