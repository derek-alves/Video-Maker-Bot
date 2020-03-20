
<?php 
include 'robots/text.php';



if (!empty($_POST)){ 
    $content = [];
     array_push($content,$_POST['content'], $_POST['searchType']);
     $bottext= new textBot(); 
     $bottext-> contentFromWikipedia($content[0]);

    }else{ ?>

    <!DOCTYPE html>
<html>
<head>
<title></title>
</head>

<body>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <p>
            Type a Wikipedia search term:
            <br>
            <input type="text" name="content" value="">
            <br>
            <select name="searchType">
                <option name="whois" value="Who is"> Who is </option>
                <option name="whatis"value="What is"> What is </option>
                <option name="history"value="The history of"> The history of </option>
            </select><br>
            <input type="submit" name="submit" value="Submit me!" />
        </p>
</form>
</body>
</html>
    <?php } 

 class index
 {   
     private $content;

    function search($content){
        $this->content = $content;
        return $this->content;
    }
   
}
    ?>
