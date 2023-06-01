<?php

class DeliveryModel
{
    private $id;
    private $user_id;
    private $address_id;
    //private $address_name;
    private $company_id;
    private $price_id;
    //private $phone_number;


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
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

    public function setCompanyId($company_id)
    {
        $this->company_id = $company_id;
    }
    public function getCompanyId()
    {
        return $this->company_id;
    }

    public function setPriceId($price_id)
    {
        $this->price_id = $price_id;
    }
    public function getPriceId()
    {
        return $this->price_id;
    }


    public function toArray()
    {
        return [
            'id'    => $this->getId(),
            'user_id'   => $this->getUserId(),
            'address_id'   => $this->getAddressId(),
            'company_id'  => $this->getCompanyId(),
            'price_id'   => $this->getPriceId()

        ];
    }
}
