<?php

namespace  App\Infrastructure\Repository;
use App\Domain\Repository\VideoRepository;
use App\Domain\Entity\Video;
use PDO;

class PdoVideoRepository implements VideoRepository{

    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function allVideo() : array {

        $sqlSelectAll = "SELECT * FROM videos;";

        $stament = $this->connection->prepare($sqlSelectAll);
        $stament->execute();

     
        return $this->hydrateVideotList($stament);
    }

    public function findById(int $id) : Video {

        $sqlSelect = "SELECT * FROM videos WHERE id = ?;";
        $stament = $this->connection->prepare($sqlSelect);

        $stament->bindValue(1 , $id , PDO::PARAM_INT); 
        $stament->execute();

        $dados = $this->hydrateVideotList($stament);

        if(isset($dados[0])){

            return $dados[0];
        }

        throw new \Exception('Video não encontrado.');
        
    }

    public function save(Video $video): bool {

        $sqlInsert = "INSERT INTO videos (titulo, descricao, url) VALUES (?, ?, ?); ";
        $stament = $this->connection->prepare($sqlInsert);

        $stament->bindValue(1 , $video->getTitulo()); 
        $stament->bindValue(2 , $video->getDescricao()); 
        $stament->bindValue(3 , $video->getUrl()); 

        $success =  $stament->execute();

        if($success){

             $video->setId($this->connection->lastInsertId());
             
        }

        return $success;

    }

    public function remove(int $id): bool {

        $sqlDelete = 'DELETE FROM videos WHERE id = ?;';
        $stament = $this->connection->prepare($sqlDelete);

        $stament->bindValue(1 , $id); 

        $success =  $stament->execute();

        return $success;
    }

    public function update(Video $video): bool {
        

        $sqlUpdate = "UPDATE videos SET titulo = ?, descricao = ?, url = ?  WHERE id = ?; ";
        $stament = $this->connection->prepare($sqlUpdate);
        
        $stament->bindValue(1 , $video->getTitulo()); 
        $stament->bindValue(2 , $video->getDescricao()); 
        $stament->bindValue(3 , $video->getUrl()); 

        $stament->bindValue(4, $video->getId()); 

        $success =  $stament->execute();

        return $success;


    }

    private function hydrateVideotList(\PDOStatement $stament) : array {

        $videoList = [];

        while($row = $stament->fetch(\PDO::FETCH_ASSOC)){

            $video= new Video($row['id'],$row['titulo'], $row['descricao'],$row['url']);

            
            $videoList[] = $video;
        }

        return $videoList;

    }

}

?>