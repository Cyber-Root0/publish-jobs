<?php
require 'class/google/google-search-results.php';
require 'class/google/restclient.php';
 function get_jobs($query_job){
    $query = [
        "q" => "Desenvolvedor".$query_job." jobs",
        "location" => "São Paulo, Brazil",
        "language"=>"pt-br",
        "irad" => 50000,
       ];
       
       $search = new GoogleSearch('3963b7bd73ac8504652404b3419542ce59574d35ba664419f3cb6f4384fcb9e3');
       $result = $search->get_json($query);
       $jobs_results = $result->jobs_results->jobs;
       return json_encode($jobs_results);
 }



?>