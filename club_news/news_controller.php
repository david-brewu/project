<?php
//connect to post class
include_once (dirname(__FILE__)).'/news_class.php';

// Inserting a new post
function createNews($date,	$title,	$image, $body, $isArchive){
    // Create new post object
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
    // Create new post object
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

// function getArchivedMembers(){
//     // Create new post object
//     $member = new Member;

//     // Run query
//     $runQuery = $member->getMembers();

//     if($runQuery){
//         $members = array();
//         $archive_member = array();
//         while($record = $member->db_fetch()){
//             $members[] = $record;
//         }
//         foreach($members as $member){
//             if($member['isArchive'] == 'Yes'){
//                 $archive_member[] = $member;
//             }
//         }
//         return $archive_member;
//     }else{
//         return [];
// }}

function getSingleNews($news_ID){
    // Create new post object
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
    // Create new post object
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
    // Create new post object
    $news = new News;

    // Run query
    $runQuery = $news->delete($news_ID);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

// function totalMemberArcheives(){
//     $members = getMembers();
//     $total_archieves = 0;
//     if($members != false){
//         foreach ($members as $member){
//             if($member["isArchive"] == "Yes"){
//                 $total_archieves ++;
//             }
//         }
//     }
//     return $total_archieves;
    
//}
?>