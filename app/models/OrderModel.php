<?php

class OrderModel
{
    private $id;
    private $food_id;
    private $qty;
    private $total;
    private $order_date;
    private $status_id;
    private $user_id;
    private $address_id;
    private $deliveryPrice_id;
    private $deliveryCompany_id;
    private $phoneNumber;
    
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setFoodId($food_id)
    {
        $this->food_id = $food_id;
    }

    public function getFoodId()
    {
        return $this->food_id;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }
    public function getQty()
    {
        return $this->qty;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
    public function getTotal()
    {
        return $this->total;
    }

    public function setOrderDate($order_date)
    {
        $this->order_date = $order_date;
    }
    public function getOrderDate()
    {
        return $this->order_date;
    }

    public function setStatusId($status_id)
    {
        $this->status_id = $status_id;
    }
    public function getStatusId()
    {
        return $this->status_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }
    public function setAddressId($address_id)
    {
        $this->address_id = $address_id;
    }
    public function getAddressId()
    {
        return $this->address_id;
    }
    public function setDeliveryPriceId($deliveryPrice_id)
    {
        $this->deliveryPrice_id = $deliveryPrice_id;
    }
    public function getDeliveryPriceId()
    {
        return $this->deliveryPrice_id;
    }
    public function setDeliveryCompanyId($deliveryCompany_id)
    {
        $this->deliveryCompany_id = $deliveryCompany_id;
    }
    public function getDeliveryCompanyId()
    {
        return $this->deliveryCompany_id;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    public function toArray()
    {
        return [
            'id'    => $this->getId(),
            'food_id'   => $this->getFoodId(),
            'qty' => $this->getQty(),
            'total'   => $this->getTotal(),
            'order_date'  => $this->getOrderDate(),
            'status_id'  => $this->getStatusId(),
            'user_id'   => $this->getUserId(),
            'address_id'   => $this->getAddressId(),
            'delivery_priceID' => $this->getDeliveryPriceId(),
            'delivery_companyID' => $this->getDeliveryCompanyId(),
            'phone_number' => $this->getPhoneNumber()
        ];
    }
}
