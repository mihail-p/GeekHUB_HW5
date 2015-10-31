<?php

namespace Models;


use Layer\Connector\ConnectBase;
use Layer\Manager\ManagerInterface;

class EngWord extends ConnectBase implements ManagerInterface
{
    private $id_en;
    private $eng_word;

    /**
     * @return mixed
     */
    public function getIdEn()
    {
        return $this->id_en;
    }

    /**
     * @param mixed $id_en
     */
    public function setIdEn($id_en)
    {
        $this->id_en = $id_en;
    }

    /**
     * @return mixed
     */
    public function getEngWord()
    {
        return $this->eng_word;
    }

    /**
     * @param mixed $eng_word
     */
    public function setEngWord($eng_word)
    {
        $this->eng_word = $eng_word;
    }

    public function insert(array $entity)
    {

    }
}