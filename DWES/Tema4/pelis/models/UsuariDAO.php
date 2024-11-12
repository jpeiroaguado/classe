<?php
require_once __DIR__.'/Usuari.php';
require_once __DIR__.'/DBConnection.php';
require_once __DIR__.'/IDbAccess.php';

class UsuariDao {/*implements IDbAccess*/
    public static function getAll(): ?array{

        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("SELECT    id,
                                            email,
                                            pass,
                                            timestamp
                                        FROM usuaris");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'usuari');
            $stmt->execute();
            return $stmt->fetchAll();
        } else{
            return null;
        }
    }
    //Funció seleccionar en la base de dades
    public static function select($id): ?usuari{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            //La id que es passa ésautomáticament posada amb cometes. no hi ha capnrisc d'injecció SQL
            $stmt=$conn->prepare("SELECT        id,
                                                email,
                                                pass,
                                                timestamp
                                            FROM usuaris
                                            WHERE id=:id");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'usuari');
            $stmt->execute(['id'=>$id]);
            $usuari=$stmt->fetch();
            if($usuari){
                return $usuari;
            }     
        }
        return null;
    }//WHERE titol LIKE :titol OR director LIKE:director... $stmt->execute(['titol]=>'%'.$titol.'%', 'dr)
    public static function selectByMail($email): ?usuari{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("SELECT        id,
                                                email,
                                                pass,
                                                timestamp
                                            FROM usuaris
                                            WHERE email=:email");
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'usuari');
            $stmt->execute(['email'=>$email]);
            $usuari=$stmt->fetch();
            if($usuari){
                return $usuari;
            }     
        }
        return null;
    }
    //Funció insertar en la base de dades
    public static function insert($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("INSERT INTO usuaris (id,
                                                email,
                                                pass)
                        
                                                VALUES (:id,
                                                :email,
                                                :pass)");
            $stmt->execute([
                'id'=>null,
                'email'=>$object->getEmail(),
                'pass'=>$object->getPass(),
            ]);
            return $conn->lastInsertId();
            //return $stmt->rowCount();//Retorna el numero de files afegides
        }
        return 0;
    }
    //Funció borrar de la base de dades
    public static function delete($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("DELETE FROM usuaris WHERE id=:id");
            $stmt->execute(['id'=>$object->getId()]);
            //return $stmt->rowCount(); //Retorna el número de files afectades
            return $conn->lastInsertId();
        }
        return 0;
    }
    //Funció actualitzar de la base de dades
    public static function update($object): int{
        $conn=DBConnection::connectDB();
        if(!is_null($conn)){
            $stmt=$conn->prepare("UPDATE    usuaris
                                    SET     email=:email,
                                            pass=:pass
                                    WHERE   id=:id");
            $stmt->execute([
                'id'=>$object->getId(),
                'email'=>$object->getEmail(),
                'pass'=>$object->getPass()
            ]);
            //return $stmt->rowCount();//retorna el numero de files afectades
            return $conn->lastInsertId();
        }
        return 0;
    }
}