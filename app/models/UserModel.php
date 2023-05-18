<?php

class UserModel
{
    // Access Modifier = public, private, protected
    private $id;
    private $name;
    private $phone_number;
    private $email;
    private $password;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setPhoneNo($phone_number)
    {
        $this->phone_number = $phone_number;
    }
    public function getPhoneNo()
    {
        return $this->phone_number;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }


    public function toArray()
    {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "phone_number" => $this->getPhoneNo(),
            "email" => $this->getEmail(),
            "password" => $this->getPassword()

        ];
    }
}
