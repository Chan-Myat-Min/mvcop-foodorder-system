<?php

class AddressModel
{
    // Access Modifier = public, private, protected
    private $id;
    private $street_id;
    private $user_id;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setStreetId($street_id)
    {
        $this->street_id = $street_id;
    }
    public function getStreetId()
    {
        return $this->street_id;
    }
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }

    public function toArray()
    {
        return [
            'id'    => $this->getId(),
            'street_id'   => $this->getStreetId(),
            'user_id'  => $this->getUserId()
        ];
    }
}
