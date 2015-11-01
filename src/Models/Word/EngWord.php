<?php

namespace Models\Word;


use Layer\Connector\ConnectBase;
use Layer\Manager\ManagerInterface;

class EngWord implements ManagerInterface
{
    //private $id_en;
    //private $eng_word;
    private $connector;

    public function __construct($connector)
    {
        $this->connector = $connector;
    }
    /**
     * @return mixed
     */
    /*public function getIdEn()
    {
        return $this->id_en;
    }

    /**
     * @param mixed $id_en
     */
   /* public function setIdEn($id_en)
    {
        $this->id_en = $id_en;
    }

    /**
     * @return mixed
     */
   /* public function getEngWord()
    {
        return $this->eng_word;
    }

    /**
     * @param mixed $eng_word
     */
   /* public function setEngWord($eng_word)
    {
        $this->eng_word = $eng_word;
    }
*/
    public function insert($entity)
    {
        $query = "INSERT INTO eng_word (eng_word)
                  VALUES(:eng_word)";
        $result = $this->connector->prepare($query);
        $result->bindValue(':eng_word', $entity['eng_word']);
        echo'word:'.$entity['eng_word'].' added';
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

    public function find($id)
    {
        $query = "SELECT * FROM eng_word
                  WHERE id_en = :id_en ";
        $result = $this->connector->prepare($query);
        $result->bindValue(':id_en', $id['id_en']);
        $result->execute();

        return $this->fetchEngWord($result);
    }

    public function findName($name)
    {
        $query = "SELECT id_en FROM eng_word
                  WHERE eng_word = :eng_word ";
        $result = $this->connector->prepare($query);
        $result->bindValue(':eng_word', $name['eng_word']);
        $result->execute();

        return $this->fetchName($result);
    }

    private function fetchEngWord($statement)
    {
        $results = array();
        while ($result = $statement->fetch()) {
            $results[] = [
                'id_en' => $result['id_en'],
                'eng_word' => $result['eng_word'],
                ];
    }
    return $results;
    }

    private function fetchName($statement)
    {
        $result =$statement->fetch();
        return $result;
    }

    public function findAll()
    {
        $query = "SELECT * FROM eng_word";
        $result = $this->connector->prepare($query);
        //$result->bindValue(':id_en', $entity['id_en']);
        $result->execute();

        return $this->fetchEngWord($result);
    }
}