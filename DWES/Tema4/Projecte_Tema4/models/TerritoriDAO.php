<?php
require_once __DIR__.'/Territori.php';
require_once __DIR__.'/DBConnection.php';
require_once __DIR__.'/IDbAccess.php';

class MapaDao {
    public static function getAll():?array{

        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("SELECT    id,
                                            idMapa,
                                            nomTerritori,
                                            coordenades,
                                            gobernant,
                                            timestamp
                                        FROM territoris");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Territori');
            $stmt->execute();
            return $stmt->fetchAll();
        } else{
            return null;
        }
    }
    public static function select($id): ?Territori{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            //La id que es passa ésautomáticament posada amb cometes. no hi ha capnrisc d'injecció SQL
            $stmt=$conn->prepare("SELECT        id,
                                                idMapa,
                                                nomTerritori,
                                                coordenades,
                                                gobernant,
                                                timestamp
                                            FROM territoris
                                            WHERE id=:id");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Territori');
            $stmt->execute(['id'=>$id]);
            $mapa=$stmt->fetch();
            if($mapa){
                return $mapa;
            }     
        }
        return null;
    }
    public static function getTerritorisMapa($idMapa): ?array {
        $conn = DBConnection::connectDB();
        if (!is_null($conn)) {
            $stmt = $conn->prepare("SELECT id, 
                                            idMapa, 
                                            nomTerritori, 
                                            coordenades, 
                                            gobernant, 
                                            timestamp 
                                    FROM territoris 
                                    WHERE idMapa = :idMapa");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Territori');
            $stmt->execute(['idMapa' => $idMapa]);
            $territoris = $stmt->fetchAll();
            if ($territoris) {
                return $territoris;
            }
        }
        return null;
    }
    public static function selectNomGob($consulta): ?array{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            //La id que es passa ésautomáticament posada amb cometes. no hi ha capnrisc d'injecció SQL
            $stmt=$conn->prepare("SELECT        id,
                                                idMapa,
                                                nomTerritori,
                                                coordenades,
                                                gobernant,
                                                timestamp
                                            FROM territoris
                                            WHERE nomTerritori LIKE :nomTerritori OR gobernant LIKE :gobernant");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Territori');
            $stmt->execute(['nomTerritori'=>'%'.$consulta.'%','gobernant'=>'%'.$consulta.'%']);
            $territoris=$stmt->fetchAll();
            if($territoris){
                return $territoris;
            }     
        }
        return null;
    }
    
    public static function insert($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("INSERT INTO territoris (id,
                                                idMapa,
                                                nomTerritori,
                                                coordenades,
                                                gobernant)
                                                VALUES (:id,
                                                :idMapa,
                                                :nomTerritori,
                                                :coordenades,
                                                :gobernant)");
            $stmt->execute([
                'id'=>null,
                'idMapa'=>$object->getIdMapa(),
                'nomTerritori'=>$object->getNomTerritori(),
                'coordenades'=>$object->getCoordenades(),
                'gobernant'=>$object->getGobernant()
            ]);
            //return $stmt->rowCount();//Retorna el numero de files afegides
            return $conn->lastInsertId();
        }
        return 0;
    }
    public static function delete($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("DELETE FROM territoris WHERE id=:id");
            $stmt->execute(['id'=>$object->getId()]);
            return $stmt->rowCount(); //Retorna el número de files afectades
        }
        return 0;
    }
    public static function update($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("UPDATE    territoris
                                    SET     idMapa=:idMapa,
                                            nomTerritori=:nomTerritori,
                                            coordenades=:coordenades,
                                            gobernant=:gobernant
                                    WHERE   id=:id");
            $stmt->execute([
                'id'=>null,
                'idMapa'=>$object->getIdMapa(),
                'nomTerritori'=>$object->getNomTerritori(),
                'coordenades'=>$object->getCoordenades(),
                'gobernant'=>$object->getGobernant()
            ]);
            //return $stmt->rowCount();//retorna el numero de files afectades
            return $conn->lastInsertId();
        }
        return 0;
    }

}


?>