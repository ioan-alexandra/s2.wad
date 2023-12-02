<?php

class ContentDB extends Dbh
{

    function getPublishedPosts()
    {
        $sql = "SELECT * FROM content ORDER BY Id DESC";
        $stmt = $this->connect()->query($sql);

        $result = $stmt->fetchAll();

        return $result;
    }
    function getUserPublishedPosts($id)
    {
        $sql = "SELECT * FROM content WHERE User_id = :user_id ORDER BY Id DESC ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function createPost($user_id, $title, $created_Date, $description, $views, $likes, $image, $label)
    {           
        $sql = "INSERT INTO content(User_id, Title, Created_Date, Description, Views, Likes, Image, Label) VALUES (:user_id,:title,:created_Date,:description,:views,:likes,:image,:label)";
        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':created_Date', $created_Date);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':views', $views);
        $stmt->bindParam(':likes', $likes);
        $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
        $stmt->bindParam(':label', $label);

        $stmt->execute();
    }

    public function updatePost($id, $title, $description, $label, $image)
    {
        $sql = "UPDATE content SET Title = :title, Description = :description, Label = :label, Image = :image WHERE Id = :id ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
        $stmt->bindParam(':label', $label);
        $stmt->execute();
    }

    public function updateLikes($id, $counter)
    {
        $sql = "UPDATE content SET Likes = Likes + $counter WHERE Id = :id ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    public function updateViews($id)
    {
        $sql = "UPDATE content SET Views = Views + 1 WHERE Id = :id ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getSelectedPosts($id)   
    {
        $sql = "SELECT * FROM content WHERE Id = :id ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result;

    }

    public function deleteSelectedPosts($id)
    {
        $sql = "DELETE FROM content WHERE Id = :id ";
        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function getFilteredPosts($label) {
        // use global $conn object in function
        $sql = "SELECT * FROM content WHERE Label = :label ORDER BY Id DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':label', $label);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }

    function searchPosts($str)
    {
        $sql = "SELECT * FROM content WHERE Title LIKE '%{$str}%' OR Description LIKE '%{$str}%' ORDER BY Id DESC";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();
    
        return $result;
    }

}
