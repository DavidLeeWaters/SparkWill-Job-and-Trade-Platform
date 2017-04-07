<?php include "databaselogin.php"; session_start();


$rusername = $_GET['r'];


$sql4="SELECT * FROM resumes WHERE username = '".$rusername."'";
$result4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($result4)) 
{
$filenow = $row4['filename']; 
$document = "users/".$rusername."/resumefile/".$filenow."";
}
 
list($name, $ext) = explode(".", $filenow);

if ($ext == 'docx'){

function extracttext($filename) {
 
    $dataFile = "word/document.xml";    
       
    $zip = new ZipArchive;
 
    if (true === $zip->open($filename)) {

        if (($index = $zip->locateName($dataFile)) !== false) {

            $text = $zip->getFromIndex($index);

            $xml = DOMDocument::loadXML($text, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);

            return strip_tags($xml->saveXML());

        }

        $zip->close();
    }

}

$word = extracttext($document);

}






if ($ext == 'doc'){

    class DocxConversion{
    private $filename;

    public function __construct($filePath) {
        $this->filename = $filePath;
    }

    private function read_doc() {
        $fileHandle = fopen($this->filename, "r");
        $line = @fread($fileHandle, filesize($this->filename));   
        $lines = explode(chr(0x0D),$line);
        $outtext = "";
        foreach($lines as $thisline)
          {
            $pos = strpos($thisline, chr(0x00));
            if (($pos !== FALSE)||(strlen($thisline)==0))
              {
              } else {
                $outtext .= $thisline." ";
              }
          }
         $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
        return $outtext;
    }



    public function convertToText() {

        if(isset($this->filename) && !file_exists($this->filename)) {
            return "File Not exists";
        }

        $fileArray = pathinfo($this->filename);
        $file_ext  = $fileArray['extension'];
        if($file_ext == "doc" || $file_ext == "docx")
        {
            if($file_ext == "doc") {
                return $this->read_doc();
            } elseif($file_ext == "docx") {
                return $this->read_docx();
            }
        } else {
            return "Invalid File Type";
        }
    }

}

$docObj = new DocxConversion($document);
$word = $docText= $docObj->convertToText();
}



if ($ext == 'txt'){

$word = htmlspecialchars(file_get_contents($document));


}



$word = wordwrap($word, 240, '<br><br>', true);


echo "



<div id='".$rusername."contextMenu' class='resumeclass' style='width:400px; border: 2px solid black; cursor: default; position:fixed; top: 100px; left: 100px; z-index: 1600;'>
<div style='width: 100%; height: 40px; background-color: lightgreen; text-align: center; color: green; font-weight: bold; cursor: move;'>
<span style='font-size: 200%;'>".$rusername."</span>
<a style='cursor: pointer; font-size: 20; color: white; float: right;' onMouseOver='this.style.color=\"black\";' onMouseOut='this.style.color=\"white\";' onclick='document.getElementById(\"".$rusername.'rbox'."\").style.display = \"none\";'> &#10005;</a>
</div>
<div id='lower".$rusername."contextMenu' style='width: 100%; background-color: white; height: 370px; text-align: center; overflow: auto;'>
".$word."
</div>
</div>






<script>

var ".$rusername."contextmenu = document.getElementById('".$rusername."contextMenu');
var lower".$rusername."contextmenu = document.getElementById('lower".$rusername."contextMenu');
var initX, initY, mousePressX, mousePressY;

lower".$rusername."contextmenu.addEventListener('mousedown', function(event) {
event.stopPropagation();
}, false);
".$rusername."contextmenu.addEventListener('mousedown', function(event) {

var slides = document.getElementsByClassName('resumeclass');
for(var i = 0; i < slides.length; i++)
{
   slides[i].style.zIndex = '1500';
}
    ".$rusername."contextmenu.style.zIndex = '1599';

	initX = this.offsetLeft;
	initY = this.offsetTop;
	mousePressX = event.clientX;
	mousePressY = event.clientY;

	this.addEventListener('mousemove', repositionElement, false);

	window.addEventListener('mouseup', function() {
	  ".$rusername."contextmenu.removeEventListener('mousemove', repositionElement, false);
	}, false);

}, false);

function repositionElement(event) {
	this.style.left = initX + event.clientX - mousePressX + 'px';
	this.style.top = initY + event.clientY - mousePressY + 'px';
}

document.getElementById('".$rusername.'rbox'."').style.display = 'block';
</script>



";









?>