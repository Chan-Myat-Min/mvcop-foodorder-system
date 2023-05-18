<?php

class CategoryModel
{
    private $id;
    private $title;
    private $image;
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

    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getImage()
    {
        return $this->image;
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
            'image'  => $this->getImage(),
            'featured'   => $this->getFeatured(),
            'active'   => $this->getActive()
        ];
    }
}
