<?php
class Content{
    private $title;
    private $description;
    private $date;
    private $labels;
    private $location;
    private $likes;


    public function __construct($user_id, $title, $created_Date, $description, $views, $likes, $image, $label)
    {
        $this->title=$title;
        $this->description=$description;
        $this->created_Date=$created_Date;
        $this->user_id=$user_id;
        $this->label=$label;
        $this->likes=$likes;
        $this->views=$views;
        $this->image=$image;
    }
}
?>