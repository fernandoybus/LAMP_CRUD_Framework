<?php

class Post
{
    private $sub_category;
    private $location;
    private $title;
    private $price;
    private $description;
    private $email;
    private $confirm_email;
    private $agree;
    private $image1;
    private $image2;
    private $image3;
    private $image4;


    public function getSub_Category() {
        return $this->sub_category;
    }
    public function setSub_Category($x) {
        $this->sub_category = $x;
    }


    public function getLocation() {
        return $this->location;
    }
    public function setLocation($x) {
        $this->location = $x;
    }
    

    public function getTitle() {
        return $this->title;
    }
    public function setTitle($x) {
        $this->title = $x;
    }


    public function getPrice() {
        return $this->price;
    }
    public function setPrice($x) {
        $this->price = $x;
    }

    public function getDescription() {
        return $this->description;
    }
    public function setDescription($x) {
        $this->description = $x;
    }


    public function getEmail() {
        return $this->email;
    }
    public function setEmail($x) {
        $this->email = $x;
    }

    public function getConfirm_Email() {
        return $this->confirm_email;
    }
    public function setConfirm_Email($x) {
        $this->confirm_email = $x;
    }


    public function getAgree() {
        return $this->agree;
    }
    public function setAgree($x) {
        $this->agree = $x;
    }

    public function getImage1() {
        return $this->image1;
    }
    public function setImage1($x) {
        $this->image1 = $x;
    }


    public function getImage2() {
        return $this->image2;
    }
    public function setImage2($x) {
        $this->image2 = $x;
    }

    public function getImage3() {
        return $this->image3;
    }
    public function setImage3($x) {
        $this->image3 = $x;
    }


    public function getImage4() {
        return $this->image4;
    }
    public function setImage4($x) {
        $this->image4 = $x;
    }

}?>
