<?php
//connect to News class
include_once (dirname(__FILE__)).'/news_class.php';

// Inserting a new news
function createNews($date,	$title,	$image, $body, $isArchive){
    // Create new news object
    $news = new News;

    // Run query
    $runQuery = $news->create($date, $title, $image, $body, $isArchive);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function archive($news_ID, $archive){
    $news = new News;

    // Run query
    $runQuery = $news->archive($news_ID, $archive);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}




function getNews(){
    // Create new nws object
    $news = new News;

    // Run query
    $runQuery = $news->getNews();

    if($runQuery){
        $all_News = array();
        while($record = $news->db_fetch()){
            $all_News[] = $record;
        }
        return $all_News;
    }else{
        return false;
    }
}


function getSingleNews($news_ID){
    // Create new news object
    $news = new News;

    // Run query
    $runQuery = $news->getSingleNews($news_ID);

    if($runQuery){

        $single_news = $news->db_fetch();
        if(!empty($single_news)){
            return $single_news;
        }else{
            return [];
        }
        
    }else{
        return false;
    }
}

function updateNews($news_ID, $date, $title, $image, $body, $isArchive){
    // Create new news object
    $news = new News;

    // Run query
    $runQuery = $news->update($news_ID, $date, $title, $image, $body, $isArchive);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function deleteNews($news_ID){
    // Create new News object
    $news = new News;

    // Run query
    $runQuery = $news->delete($news_ID);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

?>