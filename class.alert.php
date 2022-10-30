<?php
require_once 'controller/get-users.php';
require_once 'controller/email.php';
require_once 'controller/api-jobs.php';
require_once 'controller/export-jobs.php';
require_once 'controller/template-email.php';
require_once 'controller/share-linkedin.php';


$number = 0;
$vaga = "";

// GET JOBS FROM API
$stacks = array("Front End","Back End","PHP");
$jobs=array();
foreach($stacks as $stack){
    $jobs[] = organize_matrix(get_jobs($stack),$stack);
    
}

//CONFIG LINKEDIN VARS


// GET LIST EMAIL USERS
$users = json_decode(get_users());
$emails = organize_email_users($users);

// SEND EMAILS
//SendEmail($emails,"CompanyJobs - Novas Vagas De T.I",mail_template($jobs));

// SEND JOBS TO API


//SEND JOBS TO LINKEDIN
    
share_linkedin($jobs,$vaga);



// ADD IN ARRAY
function organize_matrix($json,$area){
    $a = array();
    $b = array();
    $object = json_decode($json);
    foreach($object as $data){
        $a["titulo"] = $data->title;
        $a["empresa"] = $data->company_name;
        $a["local"] = $data->location;
        $a["via"] = $data->via;
        $a["link"] = $data->link;
       $b[] = $a;
       
       //VAR CONFIG
       if ($number == 0){
           $number=1;
           $vaga = $area;
       }
       
    }
    return $b;
}

function organize_email_users($data){
    $emails=array();
    foreach($data as $dados){
    $b["nome"] = $dados->name;
    $b["email"] = $dados->email;
    $emails[] = $b;
 }
 //echo json_encode($emails);
 return $emails;

}

?>