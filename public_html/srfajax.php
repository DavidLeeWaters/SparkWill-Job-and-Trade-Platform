<?php
include "databaselogin.php"; session_start();

$person = $_GET['p'];

$sql4="SELECT * FROM resumes WHERE username = '".$person."'";
$result4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($result4)) 
{
$filenow = $row4['filename']; 
$document = "users/".$person."/resumefile/".$filenow."";
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
        if($file_ext == "doc" || $file_ext == "docx" || $file_ext == "xlsx" || $file_ext == "pptx")
        {
            if($file_ext == "doc") {
                return $this->read_doc();
            } elseif($file_ext == "docx") {
                return $this->read_docx();
            } elseif($file_ext == "xlsx") {
                return $this->xlsx_to_text();
            }elseif($file_ext == "pptx") {
                return $this->pptx_to_text();
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




$word = wordwrap($word, 410, '<br><br>', true);


?>








<div id="moveme" style="width:600px; border: 2px solid black; cursor: default; position: absolute; right: 1%;">
<div id="dxy" style="display: inline-block; width: 100%; height: 40px; background-color: lightgreen; cursor: move;">
<a style='cursor: pointer; font-size: 25; color: white; float: right;' onMouseOver="this.style.color='black';" onMouseOut="this.style.color='white';" onclick="document.getElementById('moveme').style.display = 'none';"> &#10005;</a>
</div>
<div style="width: 100%; background-color: white; height: 560px; text-align: center; overflow: auto;">
<?php echo $word; ?>
</div>
</div>


<script>
window.onload = addListeners();
var offX;
var offY;


function addListeners(){
    document.getElementById('dxy').addEventListener('mousedown', mouseDown, false);
    window.addEventListener('mouseup', mouseUp, false);

}

function mouseUp()
{
    window.removeEventListener('mousemove', divMove, true);
}

function mouseDown(e){
  var div = document.getElementById('moveme');
  offY= e.clientY-parseInt(div.offsetTop);
  offX= e.clientX-parseInt(div.offsetLeft);
 window.addEventListener('mousemove', divMove, true);
}

function divMove(e){
    var div = document.getElementById('moveme');
  div.style.position = 'absolute';
  div.style.top = (e.clientY-offY) + 'px';
  div.style.left = (e.clientX-offX) + 'px';
}
</script>