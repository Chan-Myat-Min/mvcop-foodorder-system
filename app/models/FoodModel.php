<?php

class FoodModel
{
    private $id;
    private $title;
    private $description;
    private $price;
    private $image;
    private $categoryId;
    private $featured;
    private $active;


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

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }



    public function setFoodImage($image)
    {
        $this->image = $image;
    }
    public function getFoodImage()
    {
        return $this->image;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }
    public function getCategoryId()
    {
        return $this->categoryId;
    }


    public function setFeatured($featured)
    {
        $this->featured = $featured;
    }

    public function getFeatured()
    {
        return $this->featured;
    }
    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function toArray()
    {
        return [
            'id'    => $this->getId(),
            'title'   => $this->getTitle(),
            'price' => $this->getPrice(),
            'description'   => $this->getDescription(),
            'image'  => $this->getFoodImage(),
            'category_id'  => $this->getCategoryId(),
            'featured'   => $this->getFeatured(),
            'active'   => $this->getActive()
        ];
    }
}
