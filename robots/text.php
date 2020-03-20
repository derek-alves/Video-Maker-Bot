<?php 
require_once "vendor/autoload.php";
class textBot{
    public function contentFromWikipedia($content){
        $clientAuth = Algorithmia::client("simdbvl9uVzipJMgjxw9ALHEPTX1");
        $wikiAlgorit = $clientAuth->algo("web/WikipediaParser/0.1.2");
        $fullContent = (array)$wikiAlgorit->pipe($content)->result;
        $this->santitizeContent($fullContent);
        
        
    }

    public function santitizeContent($content){
        $result = explode(PHP_EOL,preg_replace('/^\h*\v+/m', '', $content['content']));//tira as linhas em branco
        $result = preg_replace ('/^=.*\\n/m',' ', $result);//romeve as tag '==='
        $result = preg_replace ('/\([^)]+\)/',' ', $result);
        // remove os parenteses
        $sentences = preg_split('/(?<=[.!?]|[.!?][\'"])\s+(?=\S)/', $result[0], -1, PREG_SPLIT_NO_EMPTY);
        var_dump($sentences);

                
    }
}


