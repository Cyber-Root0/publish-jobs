<?php
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
//função que envia publicação automaticamente
 function share_post($link,$title,$empresa,$img_url,$vaga){
    //processo de edição do texto antes do envio
    $description.="👩🏻‍💻 - Vagas de Programação 🚀\n\n";
    $description.="💻Nosso Bot selecionou uma vaga na $empresa \n\n";
    $description.="✔️O volume de vagas em tecnologia aumentou 90,1% em 2021, na comparação com 2020, quando houve um recuo de 17,4% em postos abertos, refletindo ajustes por conta da pandemia da covid-19";
    $description.="\n\n#recruiter #oportunidade #vagas #vaga #tech #empresas #recruiters #recrutamentoeseleção #Dev #frontend #backend #oportunidadesti #job #rh #rhtech";
    $link = $link;
    
    //TOKENS E IDS
    $access_token = 'Rro8IKR6iGp0kZJWsuNFm7UNFt0vOaO5Iok6sGaJQjCjNeMesbp2NoRHApNZW-e9g6a34GJn39Xg5t8MKKw0h4K3pquWfuxTtS78GBDJILlJDRlCW7peneOUA9RbrB7WQ5WOU7mu-AsKIpSa04fhmyJA1lEc2_iFoEmspaYFg6YBDr4fa6NcAhUHv1Ii_hUZtqz8qTGeqNTqFUTXHaYgUfiFZSbRBrCoyMaEYzRHyoLlNSBDzgxb0uto0tFarDveMAc5tEd6dXcGvfwlrhkmLWzUZ8bhHcuw'; //token de acesso do Linkedin
    $linkedin_id = 's_n0Kaiznj'; //Linkedin ID PROFILE

    $body = new \stdClass();
    $body->content = new \stdClass();
    $body->content->contentEntities[0] = new \stdClass();
    $body->text = new \stdClass();
    $body->content->contentEntities[0]->thumbnails[0] = new \stdClass();
    $body->content->contentEntities[0]->entityLocation = $link;
    $body->content->contentEntities[0]->thumbnails[0]->resolvedUrl = strval($img_url); //link da url da imagem
    $body->content->title = $title; //titulo
    $body->owner = 'urn:li:person:'.$linkedin_id;
    $body->text->text = $description; //texto
    
    
    //visivelmente para o publico
    $body->distribution= new \stdClass();
    $body->distribution->linkedInDistributionTarget = new \stdClass();
    $body->distribution->linkedInDistributionTarget->visibleToGuest=true;

    $body_json = json_encode($body, true);
      
    try {
        $client = new Client(['base_uri' => 'https://api.linkedin.com']);
        $response = $client->request('POST', '/v2/shares', [
            'headers' => [
                "Authorization" => "Bearer " . $access_token,
                "Content-Type"  => "application/json",
                "x-li-format"   => "json"
            ],
            'body' => $body_json,
        ]);
      
        if ($response->getStatusCode() !== 201) {
            echo 'Error: '. $response->getLastBody()->errors[0]->message;
        }
      
        //echo 'Post is shared on LinkedIn successfully.';
        return true;
    } catch(Exception $e) {
        echo $e->getMessage(). ' for link '. $link;
        return false;
    }



 } 
