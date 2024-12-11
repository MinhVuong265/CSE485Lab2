<?php
require_once APP_ROOT.'/tlunews/services/NewsService.php';
class Homecontroller{
    public function index(){
        $newsService = new NewsService();
        $newsList = $newsService->getAllNews();

        include APP_ROOT.'/tlunews/views/home/index.php';
    }
}


?>
