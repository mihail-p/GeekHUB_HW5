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
                  FROM (SELECT * FROM eng_word, ua_word WHERE id_en=id_1) en
                  LEFT JOIN
                  (SELECT con_ex.id_w, example.example FROM con_ex LEFT JOIN eng_word ON con_ex.id_w=eng_word.id_en
                      LEFT JOIN example ON con_ex.id_exl=example.id_ex) ce
                  ON en.id_en = ce.id_w LIMIT 100";
        $result = $this->connector->prepare($query);
        $result->execute();

        return $this->fetchEngWord($result);
    }

    public function findAllVocab()
    {
        $query = "SELECT * FROM con_ex
                  LEFT JOIN (
                      SELECT * FROM eng_word, ua_word WHERE id_en=id_1
                      ) e ON con_ex.id_w=e.id_en
                  LEFT JOIN example ON con_ex.id_exl=example.id_ex LIMIT 100";
        $result = $this->connector->prepare($query);
        $result->execute();

        return $this->fetchEngWord($result);
    }

    public function findByName($entity)
    {
        $query = "SELECT *
                  FROM (SELECT * FROM eng_word, ua_word WHERE id_en=id_1) en
                  LEFT JOIN
                  (SELECT con_ex.id_w, example.example FROM con_ex LEFT JOIN eng_word ON con_ex.id_w=eng_word.id_en
                      LEFT JOIN example ON con_ex.id_exl=example.id_ex) ce
                  ON en.id_en = ce.id_w
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
                'example' => $result['example'],
            ];
        }

        return $results;
    }
}
