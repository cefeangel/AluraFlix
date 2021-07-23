<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Domain\Entity\Video;
use App\Infrastructure\Persistence\ConnectionCreator;
use App\Infrastructure\Repository\PdoVideoRepository;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


class VideoController {


    public function olaMundo() : Response {
        

        return new Response('Ola Mundo');
    }

    public function allVideo(Request $request) : Response {

        try{

            $connection  = ConnectionCreator::createConnection();    
            $pdoVideoRepository   = new PdoVideoRepository($connection);
            $videoList = $pdoVideoRepository->allVideo();


            $retorno = [];
            $retorno['result'] = true;
            $retorno['message'] = '';
            $retorno['data'] = $videoList;

            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_OK);
            
        
            
            return $jsonResponse ;

        }catch(\Exception $e){

            $retorno = [];
            $retorno['result'] = false;
            $retorno['message'] =  $e->getMessage();
            $retorno['data'] = [];


            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_BAD_REQUEST);

            return $jsonResponse ;
        }
    }

    public function findById(int $id,Request $request) : Response {


        try{

            $connection  = ConnectionCreator::createConnection();    
            $pdoVideoRepository   = new PdoVideoRepository($connection);
    
            $video = $pdoVideoRepository->findById($id);

            $retorno = [];
            $retorno['result'] = true;
            $retorno['message'] = '';
            $retorno['data'] = $video ;
    
            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_OK);
            
    
            return $jsonResponse;

        }catch(\Exception $e){

            $retorno = [];
            $retorno['result'] = false;
            $retorno['message'] =  $e->getMessage();
            $retorno['data'] = [];

            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_BAD_REQUEST);

            return $jsonResponse ;
        }
        

    }

    

    public function save(Request $request) : Response {

        $corpoRequisicao = $request->getContent(); 
        $dadoJson = json_decode($corpoRequisicao,true);

        $arrayErro = $this->validationVideo($dadoJson);

        if(count($arrayErro)){

            $retorno = [];
            $retorno['result'] = false;
            $retorno['message'] =  $arrayErro;
            $retorno['data'] = [];

            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_OK);

            return $jsonResponse;

        }


        $video = new Video(
            null, 
            $dadoJson['titulo'],
            $dadoJson['descricao'],
            $dadoJson['url']
        );


        
        try{


            $connection  = ConnectionCreator::createConnection();    
            $pdoVideoRepository   = new PdoVideoRepository($connection);

            $pdoVideoRepository->save($video);


            $retorno = [];
            $retorno['result'] = true;
            $retorno['message'] =  'Video salvo com sucesso.';
            $retorno['data'] = $video;

            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_CREATED);

            return $jsonResponse;

        }catch(\Exception $e){

            $retorno = [];
            $retorno['result'] = false;
            $retorno['message'] =  $e->getMessage();
            $retorno['data'] = [];

            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_BAD_REQUEST);

            return $jsonResponse ;
        }

        

    }

    public function udpate(Request $request) : Response {

        $corpoRequisicao = $request->getContent(); 
        $dadoJson = json_decode($corpoRequisicao,true);



        $arrayErro = $this->validationVideo($dadoJson,true);

        if(count($arrayErro)){

            $retorno = [];
            $retorno['result'] = false;
            $retorno['message'] =  $arrayErro;
            $retorno['data'] = [];

            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_OK);

            return $jsonResponse;

        }


       

        $video = new Video(
            $dadoJson['id'], 
            $dadoJson['titulo'],
            $dadoJson['descricao'],
            $dadoJson['url']
        );


        

        try{


            $connection  = ConnectionCreator::createConnection();    
            $pdoVideoRepository   = new PdoVideoRepository($connection);

            $pdoVideoRepository->update($video);

            $retorno = [];
            $retorno['result'] = true;
            $retorno['message'] =  'Video atualizado com sucesso.';
            $retorno['data'] = $video;

            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_OK);

            return $jsonResponse;

        }catch(\Exception $e){

            $retorno = [];
            $retorno['result'] = false;
            $retorno['message'] =  $e->getMessage();
            $retorno['data'] = [];

            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_BAD_REQUEST);

            return $jsonResponse ;
        }

    }

    public function remove(int $id) : Response {

        try{


            $connection  = ConnectionCreator::createConnection();    
            $pdoVideoRepository   = new PdoVideoRepository($connection);

            $pdoVideoRepository->remove($id);


            $retorno = [];
            $retorno['result'] = true;
            $retorno['message'] =  'Video removido com sucesso.';
            $retorno['data'] = [];

            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_OK);

            return $jsonResponse;


        }catch(\Exception $e){

            $retorno = [];
            $retorno['result'] = false;
            $retorno['message'] =  $e->getMessage();
            $retorno['data'] = [];

            $jsonResponse = new JsonResponse($retorno);
            $jsonResponse->setStatusCode(Response::HTTP_BAD_REQUEST);

            return $jsonResponse;
        }

    }

    private function validationVideo(array $dadoJson, $update = false) : array {

     
        $arrayErros = [];

        if($update){
            

            if(!isset($dadoJson['id']) || empty($dadoJson['id']) ){
                $arrayErros[] =' ID é Obrigatório.';
            }
        }


        if(!isset($dadoJson['titulo']) || empty($dadoJson['titulo']) ){
            $arrayErros[] =' Titulo é Obrigatório.';
        }

        if(!isset($dadoJson['descricao']) || empty($dadoJson['descricao']) ){
            $arrayErros[] =' Descrição é Obrigatório.';
        }

        if(!isset($dadoJson['url']) || empty($dadoJson['url']) ){
            $arrayErros[] =' Url é Obrigatório.';
        }

        


        return $arrayErros;

    }







}


?>