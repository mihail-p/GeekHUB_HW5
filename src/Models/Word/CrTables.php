<?php

namespace Models\Word;

use Layer\Connector\ConnectBase;

class CrTables extends ConnectBase
{
    private $connector;

    public function __construct($connector)
    {
        $this->connector = $connector;
    }

    public function crEngWord()
    {
        $query = "
           CREATE TABLE IF NOT EXISTS eng_word (
           id_en INT AUTO_INCREMENT,
           eng_word varchar(50) NOT NULL,
           PRIMARY KEY (id_en))";
        $result = $this->connector->exec($query);
        var_dump($result);
        if ($result === false) {
            echo 'Table "eng_word" NOT created<br />';
        } else {
            echo 'Table "eng_word" was created<br />';
        }

    }

    public function crUaWord()
    {
        $query = "
           CREATE TABLE IF NOT EXISTS ua_word (
           id_ua INT AUTO_INCREMENT,
           id_1 INT,
           ua_word varchar(50) NOT NULL,
           PRIMARY KEY (id_ua))";
        $result = $this->connector->exec($query);
        if ($result === false) {
            echo 'Table "ua_word" NOT created<br />';
        } else {
            echo 'Table "ua_word" was created<br />';
        }
    }

    public function crExample()
    {
        $query = "
           CREATE TABLE IF NOT EXISTS example (
           id_ex INT AUTO_INCREMENT,
           example varchar(255) NOT NULL,
           PRIMARY KEY (id_ex))";
        $result = $this->connector->exec($query);
        if ($result === false) {
            echo 'Table "example" NOT created<br />';
        } else {
            echo 'Table "example" was created<br />';
        }
    }
}