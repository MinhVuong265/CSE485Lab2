<?php
class news{
    private $id, $title, $context, $image, $create_at, $category_id;

    public function __construct($id, $title, $context, $image, $create_at, $category_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->context = $context;
        $this->image = $image;
        $this->create_at = $create_at;
        $this->category_id = $category_id;
    }

    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getContext(){
        return $this->context;
    }
    public function getImage(){
        return $this->image;
    }
    public function getCreate_at(){
        return $this->create_at;
    }
    public function getCategory_id(){
        return $this->category_id;
    }
}


?>
