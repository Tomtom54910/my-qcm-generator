<?php

class QcmManager
{
    private $pdo;

    public function __construct()
    {
        try{
        $this->pdo = new PDO('mysql:host=localhost;dbname=qcm','root');
        }
        catch(PDOExeption $e)
        {
            echo 'Error : ' . $e->getMessage();
            die;
        }
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM qcm';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        // return $req->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        $qcms = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($qcms as $qcm)
        {
            $obj = new QCM();
            $obj->setTheme($qcm['theme']);
            $result[] = $obj;
        }

        return $result;

    }
}

