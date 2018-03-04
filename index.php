<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bookstore</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div id="particles-js">
    <section class="section">
      <h1 class="ptext">
        T H E &nbsp;  B O O K &nbsp;  S T O R E
      </h1>
    </section>
  </div>
  <div class="download">

    <section class="section2">
    <form name="form" action="" method="get">
    <center class="box">
      <input type="text" id="searchText" name="searchText" value="<?php 
																										   
																										   if (array_key_exists('searchText', $_GET)) {
																										   
																										   echo $_GET['searchText']; 
																										   
																										   }
																										   
																										   ?>" placeholder="enter you search item...Book Title/Book author"
        style="height:30px;width:40em;"
      >
      <br>
      <button type="submit" name="button"
        style="height:40px;width:10em;margin:10px;font-size:20px;"
      >
      search
    </button>
    </center>
    </form>
    </section>

    <div id="show">
    <?php
include("simple_html_dom.php");
if (array_key_exists('searchText', $_GET)) {
        $item = str_replace(' ', '%20', $_GET['searchText']);
        $html=file_get_html("http://ebook-dl.com/Search/".$item);
        $content=$html->find('div.container');
        foreach($content[4]->find('div.mediaholder') as $ans)
                               {
                                 $link = $ans->first_child ();
                                 echo $ans->first_child ();
                                 echo '<br>';
                                 $title = $ans->next_sibling ()->plaintext;
                                 echo '<b style="color:#2f3255;font-size:25px;background-color:#f4f4f4;">'.$title.'</b>';
                                 echo '<br>';
                                 $final=$link->href;
                                 $final = str_replace("/book","http://ebook-dl.com/downloadshort",$final);
                                 echo '<a href='.$final.' style="margin:10px;font-size:35px;color:white;background-color:#006666;">&nbsp;download&nbsp;</a>';
                                 echo '<br>';
                               }
    }
    else{
      echo '<div style="background-color: black;color:azure; margin:20px;"
      ><b>Tips : </b><br><ul><li>Use author name for accurate result.<li>Search for related information like (book name,author).</ul></div>';
    }
?>
    </div>

  </div>
  <script src="./particles.js"></script>
 <script>
    particlesJS.load('particles-js', './particles.json', function(){
      console.log('particles.json loaded...');
    });
  </script>
</body>
<footer
style="font-size:30px;font-family:cursive;text-align:center;background-color:#f4f4f4;opacity:0.7;"
>thanks for using!!! this website is only for educational purpose as a personal project.</footer>
<center><span style="font-size:20px;background-color:#43513b;opacity:0.9;color:#ee6a50">for non commercial use only</sapn></center>
</html>
