<?php

namespace App\Domain\Repository;
use App\Domain\Entity\Video;

interface VideoRepository {

    public function allVideo() : array;
    public function findById(int $id) : Video;
    public function save(Video $video): bool ;
    public function remove(int $id): bool ;
    public function update(Video $video): bool ;

    
}


?>