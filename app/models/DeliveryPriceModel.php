<?php

class DeliveryPriceModel
{
    private $id;
    private $city_id;
    private $township_id;
    private $street_id;
    private $deliveryCompany_id;
    private $deliveryPrice_id;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setCity_ID($city_id)
    {
        $this->city_id = $city_id;
    }

    public function getCity_ID()
    {
        return $this->city_id;
    }

    public function setTownship_ID($township_id)
    {
        $this->township_id = $township_id;
    }

    public function getTownship_Id()
    {
        return $this->township_id;
    }


    public function setStreet_ID($street_id)
    {
        $this->street_id = $street_id;
    }

    public function getStreet_ID()
    {
        return $this->street_id;
    }

    public function setDeliveryCompany_ID($deliveryCompany_id)
    {
        $this->deliveryCompany_id = $deliveryCompany_id;
    }

    public function getDeliveryCompany_ID()
    {
        return $this->deliveryCompany_id;
    }

    public function setDeliveryPrice_ID($deliveryPrice_id)
    {
        $this->deliveryPrice_id = $deliveryPrice_id;
    }

    public function getDeliveryPrice_ID()
    {
        return $this->deliveryPrice_id;
    }

    public function toArray()
    {
        return [
            "id" => $this->getID(),
            "city_id" => $this->getCity_ID(),
            "township_id" => $this->getTownship_Id(),
            "street_id" => $this->getStreet_ID(),
            "deliveryCompany_id" => $this->getDeliveryCompany_ID(),
            "deliveryPrice_id" => $this->getDeliveryPrice_ID()

        ];
    }
}