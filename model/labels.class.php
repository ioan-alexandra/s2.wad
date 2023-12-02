<?php

class LabelDB extends Dbh {

    function getLabels() {
        $sql = "SELECT * FROM labels ORDER BY Name ASC";
        $stmt = $this->connect()->query($sql);

        $result = $stmt->fetchAll();
    
        return $result;
    }
    function insertLabels($name) {
        $sql = "INSERT INTO labels(Name) VALUES (:name)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        
    }
    function getLabel($name) {
        $sql = "SELECT * FROM labels WHERE Name = :name";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result;
    }
    function getLabelById($id) {
        $sql = "SELECT * FROM labels WHERE Id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result;
    }
    public function deleteSelectedLabels($id)
    {
        $sql = "DELETE FROM labels WHERE Id = :id ";
        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function updateLabel($id, $name)
    {
        $sql = "UPDATE labels SET Name = :name WHERE Id = :id ";
        $stmt = $this->connect()->prepare($sql);
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
}
