<?php
class Manager
{
    protected function getBdd(){
        try{
            $bdd = new PDO('mysql:host=localhost:3308;dbname=projet4;charset=utf8', 'root', 'root');
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
        return $bdd;
    }
}