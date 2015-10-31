<?php

namespace Layer\Connector;


class ConnectBase implements ConnectorInterface
{
    protected $db_connect;

    public function connect($dsn, $user, $password)
    {
        $this->db_connect = new \PDO($dsn, $user, $password);
    }

    public function getPdo()
    {
        return $this->db_connect;
    }

    public function connectClose($db)
    {
        return $db = $this->db_connect>null;
    }

}