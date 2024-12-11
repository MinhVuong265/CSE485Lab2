<?php
require_once APP_ROOT.'/tlunews/models/News.php';
class NewsService{
    public function getAllNews(){
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'tlunews';

        try{
            $conn = new PDO("mysql:host=$host;dbname=$database",$user,$pass);

            $sql = "SELECT * FROM news";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            $newsList = [];
            while($row = $stmt->fetch()){
                $news = new news($row['id'],$row['title'],$row['context'],$row['image'],$row['create_at'],$row['category_id']);
    
                $newsList[] = $news;
            }
            return $newsList;
        }
        catch(PDOException){
            return $newsList = [];
        }
    }
}

?>