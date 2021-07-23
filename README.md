# AluraFlix
Implementação de API REST da Alura Challenge Back-End.

Listar todos os videos 
Tipo de Requisição: GET
  
URL:http://dominio/videos
 ```  
Resposta:
  {
    "result": true,
    "message": "",
    "data": [
        {
            "id": 1,
            "titulo": "Ola Mudo",
            "descricao": "Ola Mundo 40",
            "url": "http://localhost:8080/OlaPlus"
        },
        {
            "id": 2,
            "titulo": "TV Ninja",
            "descricao": "Ninja",
            "url": "http://localhost:8080/ninja"
        },
        {
            "id": 4,
            "titulo": "Java",
            "descricao": "Java em programaçao",
            "url": "http://localhost:8080/java"
        },
        {
            "id": 5,
            "titulo": "JavaScript",
            "descricao": "JavaScript new",
            "url": "http://localhost:8080/javascript"
        },
        {
            "id": 10,
            "titulo": "PHP_7",
            "descricao": "PHP new_7",
            "url": "http://localhost:8080/php_7"
        }
    ]
  }
  
 ```
Busca vídeo pelo id
Tipo de Requisição: GET
  
URL: http://dominio/videos/id
  
Resposta:
 
{
    "result": true,
    "message": "",
    "data": {
        "id": 5,
        "titulo": "JavaScript",
        "descricao": "JavaScript new",
        "url": "http://localhost:8080/javascript"
    }
}

 
Adiciona um vídeo
Tipo de Requisição: POST 
  
URL: http://dominio/videos/
  
{
    "titulo" : "Teste video",
    "descricao": " descrição video",
    "url" : "http://localhost:8080/php"
}
 
 Reposta
  {
    "result": true,
    "message": "Video salvo com sucesso.",
    "data": {
        "id": 10,
        "titulo": "Ola dds",
        "descricao": "sddsdsds",
        "url": "http://localhost:8080/php"
    }
  }
  

  Atualizar vídeo pelo id
  Tipo de Requisição: PUT/PATCH
  
  URL: http://dominio/videos
  
  {
    "id": "10",
    "titulo": "PHP_7",
    "descricao": "PHP new_7",
    "url": "http://localhost:8080/php_7"
  }
  
  
  Reposta
  
  {
    "result": true,
    "message": "Video atualizado com sucesso.",
    "data": {
        "id": 10,
        "titulo": "PHP_7",
        "descricao": "PHP new_7",
        "url": "http://localhost:8080/php_7"
    }
  }
  

  
  Remover vídeo pelo id
  Tipo de Requisição: DELETE
  
  URL: http://dominio/videos/id
  
  Reposta
  
  {
    "result": true,
    "message": "Video removido com sucesso.",
    "data": []
  }
