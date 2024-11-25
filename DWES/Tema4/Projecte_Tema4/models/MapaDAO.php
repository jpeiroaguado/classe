<?php
require_once __DIR__.'/Mapa.php';
require_once __DIR__.'/DBConnection.php';
require_once __DIR__.'/IDbAccess.php';

class MapaDao {
    public static function getAll():?array{

        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("SELECT    id,
                                            nomMapa,
                                            tamany,
                                            propietari,
                                            imatge,
                                            timestamp
                                        FROM mapes");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Mapa');
            $stmt->execute();
            return $stmt->fetchAll();
        } else{
            return null;
        }
    }
    public static function select($id): ?Mapa{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            //La id que es passa ésautomáticament posada amb cometes. no hi ha capnrisc d'injecció SQL
            $stmt=$conn->prepare("SELECT        id,
                                                nomMapa,
                                                tamany,
                                                propietari,
                                                imatge,
                                                timestamp
                                            FROM mapes
                                            WHERE id=:id");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Mapa');
            $stmt->execute(['id'=>$id]);
            $mapa=$stmt->fetch();
            if($mapa){
                return $mapa;
            }     
        }
        return null;
    }
    
    public static function selectNomTamPro($consulta): ?array{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            //La id que es passa ésautomáticament posada amb cometes. no hi ha capnrisc d'injecció SQL
            $stmt=$conn->prepare("SELECT        id,
                                                nomMapa,
                                                tamany,
                                                propietari,
                                                imatge,
                                                timestamp
                                            FROM mapes
                                            WHERE nomMapa LIKE :nomMapa OR tamany LIKE :tamany OR propietari LIKE :propietari");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Mapa');
            $stmt->execute(['nomMapa'=>'%'.$consulta.'%','tamany'=>'%'.$consulta.'%','propietari'=>'%'.$consulta.'%']);
            $mapes=$stmt->fetchAll();
            if($mapes){
                return $mapes;
            }     
        }
        return null;
    }
    
    public static function insert($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("INSERT INTO mapes (id,
                                                nomMapa,
                                                tamany,
                                                propietari,
                                                imatge)
                                                VALUES (:id,
                                                :nomMapa,
                                                :tamany,
                                                :propietari,
                                                :imatge)");
            $stmt->execute([
                'id'=>null,
                'nomMapa'=>$object->getNomMapa(),
                'tamany'=>$object->getTamany(),
                'propietari'=>$object->getPropietari(),
                'imatge'=>$object->getImatge()
            ]);
            //return $stmt->rowCount();//Retorna el numero de files afegides
            return $conn->lastInsertId();
        }
        return 0;
    }
    public static function delete($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("DELETE FROM mapes WHERE id=:id");
            $stmt->execute(['id'=>$object->getId()]);
            return $stmt->rowCount(); //Retorna el número de files afectades
        }
        return 0;
    }
    public static function update($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("UPDATE    mapes
                                    SET     nomMapa=:nomMapa,
                                            tamany=:tamany,
                                            propietari=:propietari,
                                            imatge=:imatge
                                    WHERE   id=:id");
            $stmt->execute([
                'id'=>$object->getId(),
                'nomMapa'=>$object->getNomMapa(),
                'tamany'=>$object->getTamany(),
                'propietari'=>$object->getPropietari(),
                'imatge'=>$object->getImatge()
            ]);
            //return $stmt->rowCount();//retorna el numero de files afectades
            return $conn->lastInsertId();
        }
        return 0;
    }

}


?>