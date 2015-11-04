<?php

namespace Models\Word;

use Layer\Manager\ManagerInterface;

class ConnExample
{
    private $connector;

    public function __construct($connector)
    {
        $this->connector = $connector;
    }

    public function insertEx($entity)
    {
        $query = "INSERT INTO example (example)
                  VALUES(:example)";
        $result = $this->connector->prepare($query);
        $result->bindValue(':example', $entity['example']);
        echo ' example <small>added</small>';
        return $result->execute();
    }

    public function update($entity)
    {
        $query = "UPDATE eng_word SET
                  eng_word = :eng_word
                  WHERE id_en = :id_en";
        $result = $this->connector->prepare($query);
        $result->bindValue(':eng_word', $entity['eng_word']);
        $result->bindValue(':id_en', $entity['id_en']);

        return $result->execute();
    }

    public function remove($entity)
    {
        $query = "DELETE FROM eng_word
                  WHERE id_en = :id_en";
        $result = $this->connector->prepare($query);
        $result->bindValue(':id_en', $entity['id_en']);

        return $result->execute();
    }
    public function insertConEx($entity){
        $query = "INSERT INTO con_ex (id_w, id_exl)
                  SELECT id_en, id_ex
                  FROM eng_word ew, example ex
                  WHERE ew.eng_word = :eng_word AND ex.example = :example";
        $result = $this->connector->prepare($query);
        $result->bindValue(':eng_word', $entity['eng_word']);
        $result->bindValue(':example', $entity['example']);

        return $result->execute();
    }


}