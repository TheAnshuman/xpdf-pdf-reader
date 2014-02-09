
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<title>PDF viwer online</title>
<link rel="stylesheet" type="text/css" media="screen" href="../jq.css" />
<style type="text/css">
#main { background: #fff; margin: 20px; text-align: center border:1px solid red;}
a.media   { display: block;}
div.media { font-size: small; margin: 25px; margin: auto}
div.media div { font-style: italic; color: #888; }
#lr { border: 1px solid #eee; margin: auto }
.red{color:red; font-weight:bolder;margin-left:30px;}

</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="http://malsup.github.com/chili-1.7.pack.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.media.js"></script>
<script type="text/javascript">
    $(function() {
        $('a.media').media({width:860, height:600});
    });
</script>
</head>
<body>

<?php
$link='default.pdf';
$error="";
if(isset($_FILES["file"]["name"]) && isset($_FILES["file"]["type"])){
$allowedExts = array("pdf","PDF");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "application/pdf")||($_FILES["file"]["type"] == "application/x-pdf")||($_FILES["file"]["type"] == "application/acrobat")||($_FILES["file"]["type"] == "application/vnd.pdf")||($_FILES["file"]["type"] == "text/pdf")) && in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
	  $link=$_FILES["file"]["name"];
      }
    }
  }
  elseif(!in_array($extension, $allowedExts)){
  $error= "This is not pdf!";
  }
else
  {
  $error= "Please select a document less than 2MB.";
  }
  }
  else{
  
  }
?>

<div id="main">
<form style="margin: auto; border:1px inset gray; padding:2px; width:850px;" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"> 
<input type="submit" name="submit" value="Submit"> <span class="red"><?php echo $error ?></span>
</form><br>
   

    <a class="media" href="uploads/<?php echo $link;?>"> </a>
    <a id="mike" class="media {type: 'html'}" href="../"></a>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-850242-2";
urchinTracker();
</script>
</body>
</html>
