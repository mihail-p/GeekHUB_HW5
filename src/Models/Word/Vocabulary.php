<?php

namespace Models\Word;

class Vocabulary
{
    private $connector;

    public function __construct($connector)
    {
        $this->connector = $connector;
    }

    public function findAll()
    {
        $query = "SELECT *
                  FROM eng_word en LEFT OUTER JOIN
                  ua_word ua ON en.id_en = ua.id_1 LIMIT 100";
        $result = $this->connector->prepare($query);
        $result->execute();

        return $this->fetchEngWord($result);
    }

    public function findAllVocab()
    {
        $query = "SELECT *
                  FROM eng_word en INNER JOIN
                  ua_word ua ON en.id_en = ua.id_1 LIMIT 100";
        $result = $this->connector->prepare($query);
        $result->execute();

        return $this->fetchEngWord($result);
    }

    public function findByName($entity)
    {
        $query = "SELECT *
                  FROM eng_word en INNER JOIN
                  ua_word ua ON en.id_en = ua.id_1
                  WHERE en.eng_word = :eng_word LIMIT 100";
        $result = $this->connector->prepare($query);
        $result->bindValue(':eng_word', $entity['eng_word']);
        $result->execute();

        return $this->fetchEngWord($result);
    }

    private function fetchEngWord($statement)
    {
        $results = array();
        while ($result = $statement->fetch()) {
            $results[] = [
                'id_en' => $result['id_en'],
                'eng_word' => $result['eng_word'],
                'id_ua' => $result['id_ua'],
                'id_1' => $result['id_1'],
                'ua_word' => $result['ua_word'],
            ];
        }

        return $results;
    }
}
