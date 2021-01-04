<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $totalPurePrice = 0;


    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalPurePrice = $oldCart->totalPurePrice;
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
        $this->totalPrice += $item->price;
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPurePrice += $item->price;

    }

    public function remove($item, $id)
    {
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {

                $this->items[$id]['price'] -= $item->price;
                $this->totalPrice -= $item->price;
                $this->totalQty--;
                $this->totalPurePrice -= $item->price;
                if ($this->items[$id]['qty'] > 1) {
                    $this->items[$id]['qty']--;
                } else {
                    unset($this->items[$id]);
                }
            }
        }
        else if($this->items==null){
            $totalQty = 0;
            $totalPrice = 0;
            $totalPurePrice = 0;
        }
    }


    public function totalPointPrice()
    {
        return number_format($this->totalPrice,0);
    }

    public function totalPointPurePrice()
    {
        return number_format($this->totalPurePrice,0);
    }


    public function PricePoint($prices)
    {
        return number_format($prices,0);
    }

}
