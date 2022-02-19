<?php

namespace App;


use http\Env\Request;

class Cat
{
   public $item = null;
   public $totalQty = 0;
   public $totalPrice = 0;

   public function __construct($oldCart)
   {
       if ($oldCart) {
           $this->item = $oldCart->item;
           $this->totalQty = $oldCart->totalQty;
           $this->totalPrice = $oldCart->totalPrice;


       }
   }
       public function add($item, $id)
       {
           $storedItem = ['quantity' => 0, 'selling_price' => $item->price, 'item' => $item];
           if ($this->item) {
               if (array_key_exists($id, $this->item)) {
                   $storedItem = $this->item[$id];
               }
           }
           $storedItem['quantity']++;
           $storedItem['selling_price'] = $item->selling_price * $storedItem['quantity'];
           $this->item[$id] = $storedItem;
           $this->totalQty++;
           $this->totalPrice += $item->selling_price;
   }
    public function addByOne($id){
        $this->item[$id]['quantity']++;
        $this->item[$id]['selling_price'] += $this->item[$id]['item']['selling_price'];
        $this->totalQty++;
        $this->totalPrice += $this->item[$id]['item']['selling_price'];
        if ($this->item[$id]['quantity'] <= 0){
            unset($this->item[$id]);
        }
    }
   public function reduceByOne($id){
       $this->item[$id]['quantity']--;
       $this->item[$id]['selling_price'] -= $this->item[$id]['item']['selling_price'];
       $this->totalQty--;
       $this->totalPrice -= $this->item[$id]['item']['selling_price'];
       if ($this->item[$id]['quantity'] <= 0){
           unset($this->item[$id]);
       }
   }
   public function removeItem($id){
       $this->totalQty -= $this->item[$id]['quantity'];
       $this->totalPrice -= $this->item[$id]['selling_price'];
       unset($this->item[$id]);
   }


}
