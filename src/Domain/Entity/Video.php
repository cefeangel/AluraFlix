<?php

namespace App\Domain\Entity;


class Video implements \JsonSerializable {


    private ?int $id;
    private string $titulo;
    private string $descricao;
    private string $url;


    public function __construct(?int $id,string $titulo,string $descricao, string $url){

        $this->id = $id;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->url = $url;

    }


    public function jsonSerialize() 
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'url' => $this->url,
        ];
    }



    public function setId(int $id) : void {
        
        if($this->id != null){
             throw \DomainException("Você só pode definir o ID uma vez");
        }

        $this->id = $id;
    }

    public function setTitulo(string $titulo) : void {
        $this->titulo = $titulo;
    }

    public function setDescricao(string $descricao) : void {
        $this->descricao = $descricao;
    }

    public function setUrl(string $url) : void {
        $this->url = $url;
    }

    public function getId() : ?int{
        return $this->id;
    }

    public function getTitulo() : string{
        return $this->titulo;
    }

    public function getDescricao() : string{
        return $this->descricao;
    }

    public function getUrl() : string{
        return $this->url;
    }

}


?>