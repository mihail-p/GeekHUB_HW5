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
        //$result->bindValue(':id_ua', $entity['id_ua']);
        $result->execute();

        return $this->fetchEngWord($result);
    }

    public function findAllVocab()
    {
        $query = "SELECT *
                  FROM eng_word en INNER JOIN
                  ua_word ua ON en.id_en = ua.id_1 LIMIT 100";
        $result = $this->connector->prepare($query);
        //$result->bindValue(':id_ua', $entity['id_ua']);
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
/*SELECT en.id_en, en.eng_word, ua.id_ua, ua.ua_word
                  FROM eng_word en, ua_word ua
                  WHERE en.id_en = ua.id_ua";

*/