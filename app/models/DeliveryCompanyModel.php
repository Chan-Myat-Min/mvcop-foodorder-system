<?php

class DeliveryCompanyModel
{
    private $id;
    private $title;
    private $image;


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getImage()
    {
        return $this->image;
    }



    public function toArray()
    {
        return [
            'id'    => $this->getId(),
            'image'  => $this->getImage(),
            'company_name'   => $this->getTitle()
        ];
    }
}
