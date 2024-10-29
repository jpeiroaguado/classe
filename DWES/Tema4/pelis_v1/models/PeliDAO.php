<?php
require_once __DIR__.'/Peli.php';
require_once __DIR__.'/DBConnection.php';
require_once __DIR__.'/IDbAccess.php';

class PeliDao /*implements IDbAccess*/{
    public static function getAll():?array{

        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("SELECT    id,
                                            titol,
                                            valoracio,
                                            pais,
                                            director,
                                            genere,
                                            duracio,
                                            any,
                                            sinopsi,
                                            imatge,
                                            timestamp
                                        FROM pelis");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Peli');
            $stmt->execute();
            return $stmt->fetchAll();
        } else{
            return null;
        }
    }
    public static function select($id): ?Peli{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            //La id que es passa ésautomáticament posada amb cometes. no hi ha capnrisc d'injecció SQL
            $stmt=$conn->prepare("SELECT    id,
                                                titol,
                                                valoracio,
                                                pais,
                                                director,
                                                genere,
                                                duracio,
                                                any,
                                                sinopsi,
                                                imatge,
                                                timestamp
                                            FROM pelis
                                            WHERE id=:id");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Peli');
            $stmt->execute(['id'=>$id]);
            $peli=$stmt->fetch();
            if($peli){
                return $peli;
            }     
        }
        return null;
    }
    
    public static function insert($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("INSERT INTO pelis (id,
                                                titol,
                                                valoracio,
                                                pais,
                                                director,
                                                genere,
                                                duracio,
                                                any,
                                                sinopsi,
                                                imatge)
                                                VALUES (:id,
                                                :titol,
                                                :valoracio,
                                                :pais,
                                                :director,
                                                :genere,
                                                :duracio,
                                                :any,
                                                :sinopsi,
                                                :imatge)");
            $stmt->execute([
                'id'=>null,
                'titol'=>$object->getTitol(),
                'valoracio'=>$object->getValoracio(),
                'pais'=>$object->getPais(),
                'director'=>$object->getDirector(),
                'genere'=>$object->getGenere(),
                'duracio'=>$object->getDuracio(),
                'any'=>$object->getAny(),
                'sinopsi'=>$object->getSinopsi(),
                'imatge'=>$object->getImatge()
            ]);
            return $stmt->rowCount();//Retorna el numero de files afegides
        }
    }
    public static function delete ($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("DELETE FROM pelis WHERE id=:id");
            $stmt->execute(['id'=>$object->getId()]);
            return $stmt->rowCount(); //Retorna el número de files afectades
        }
        return 0;
    }
    public static function update($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("UPDATE    pelis
                                    SET     titol=:titol,
                                            valoracio=:valoracio,
                                            pais=:pais,
                                            director=:director,
                                            genere=:genere,
                                            duracio=:duracio,
                                            any=:any,
                                            sinopsi=:sinopsi
                                            imatge=:imatge
                                    WHERE   id=:id");
            $stmt->execute([
                'id'=>object->getId(),
                'titol'=>$object->getTitol(),
                'valoracio'=>$object->getValoracio(),
                'pais'=>$object->getPais(),
                'director'=>$object->getDirector(),
                'genere'=>$object->getGenere(),
                'duracio'=>$object->getDuracio(),
                'any'=>$object->getAny(),
                'sinopsi'=>$object->getSinopsi(),
                'imatge'=>$object->getImatge()
            ]);
            return $stmt->rowCount();//retorna el numero de files afectades
        }
        return 0;
    }
}

