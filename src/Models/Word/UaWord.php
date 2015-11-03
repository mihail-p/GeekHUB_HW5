<?php

namespace Models\Word;

use Layer\Manager\ManagerInterface;

class UaWord implements ManagerInterface
{
    private $connector;

    public function __construct($connector)
    {
        $this->connector = $connector;
    }

    public function insert($entity)
    {
        $query = "INSERT INTO ua_word (id_1, ua_word)
                  VALUES(:id_en, :ua_word)";
        $result = $this->connector->prepare($query);
        $result->bindValue(':id_en', $entity['id_en']);
        $result->bindValue(':ua_word', $entity['ua_word']);
        echo '<small> word: </small>' . $entity['ua_word'] . ' <small>(ua) added.</small>';

        return $result->execute();
    }

    public function update($entity)
    {
        $query = "UPDATE ua_word SET
                  ua_word = :ua_word,
                  id_1 = :id_1
                  WHERE id_ua = :id_ua";
        $result = $this->connector->prepare($query);
        $result->bindValue(':ua_word', $entity['ua_word']);
        $result->bindValue(':id_1', $entity['id_1']);
        $result->bindValue(':id_ua', $entity['id_ua']);

        return $result->execute();
    }

    public function remove($entity)
    {
        $query = "DELETE FROM ua_word
                  WHERE id_ua = :id_ua";
        $result = $this->connector->prepare($query);
        $result->bindValue(':id_ua', $entity['id_ua']);

        return $result->execute();
    }

    public function find($id)
    {
        $query = "SELECT * FROM ua_word
                  WHERE ua_en = :id_ua ";
        $result = $this->connector->prepare($query);
        $result->bindValue(':id_ua', $id['id_ua']);
        $result->execute();

        return $this->fetchEngWord($result);
    }

    private function fetchEngWord($statement)
    {
        $results = array();
        while ($result = $statement->fetch()) {
            $results[] = [
                'id_ua' => $result['id_ua'],
                'ua_word' => $result['ua_word'],
            ];
        }
        return $results;
    }

    public function findAll()
    {
        $query = "SELECT * FROM eng_word";
        $result = $this->connector->prepare($query);
        $result->execute();

        return $this->fetchEngWord($result);
    }
}