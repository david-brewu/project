<?php
    require_once (dirname(__FILE__)).'/../db_essentials/db_class.php';

    class News extends db_connection {
        public function create($date,	$title,	$image, $body, $isArchive ){
            // sql query
            $sql = "INSERT INTO `news`(`date`,`title`,`image`, `body`, `isArchive`) VALUES ('$date','$title','$image', '$body', '$isArchive')";

            // run query
            return $this->db_query_ID($sql);
        }

        public function archive($news_ID, $archive){
            $sql = "UPDATE `news` SET `isArchive`='$archive' WHERE  `member_ID` = '$news_ID'";
            return $this->db_query($sql);
        }

        

        public function getNews(){
            //sql query
            $sql = "SELECT * FROM `news`";

            //run query
            return $this->db_query($sql);
        }

        public function getSingleNews($news_ID){
            // sql query
            $sql = "SELECT * FROM `news` WHERE `news_ID`='$news_ID'";

            // run query
            return $this->db_query($sql);
        }

        public function update($news_ID, $date,	$title,	$image, $body, $isArchive){
            // sql query
            $sql = "UPDATE `news` SET `date`='$date',`title`='$title', `image`='$image',`body`='$body', `isArchive`='$isArchive' WHERE `news_ID`='$news_ID'";

            // run query
            return $this->db_query($sql);
        }

        public function delete($news_ID){
            // sql query
            $sql = "DELETE FROM `news` WHERE `news_ID`='$news_ID'";

            // run query
            return $this->db_query($sql);
        }

        
    }


    ?>