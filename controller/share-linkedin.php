<?php
require_once 'class/auto-pub/send.php';

function share_linkedin($jobs,$stack){
    $vaga;
    $stack = "Front End";
    
   foreach($jobs as $job){
        foreach($job as $data){
          $vaga = $data; 
          break;
    }
        break;
    }
    
    //Tratamento de dados para enviar ao linkedin
    $title = "CompanyJobs | Desenvolvedor $stack ";
    $link = $vaga["link"];
    $empresa = $vaga["empresa"];
    $img_url=template_img($empresa,$stack);
    
    //GET LINK IMG 
    
        $url = "http://martpremios.com.br/api/index.php?empresa=$empresa&cargo=$vaga";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        
        $result = curl_exec($curl);
        curl_close($curl);
        echo $result;
    
    // SHARE
    //share_post($link,$title,$empresa,$img_url,$stack);
    
}

