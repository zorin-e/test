<?
class Parse {
    private $output;
    private $url;
    private $info;
    private $array = array();

    public function __construct($url) {
        $this->url = $url;            
    }
    public function __destruct() {
        $this->url;
    }

    private function GetPage() {
        $cp = curl_init();
        curl_setopt($cp, CURLOPT_URL, $this->url);
        curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cp, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($cp, CURLOPT_HEADER, 1);
        $this->output = curl_exec($cp);
        $this->info = curl_getinfo($cp);
        curl_close($cp);
    }

    public function ParseMenu($elements) {
        $this->GetPage();
        if ($this->info["http_code"] == 200) {
            $html = new simple_html_dom();
            $html->load($this->output);            
            $elements = $html->find($elements);
            foreach($elements as $element) {
                $host = parse_url($element->href);
                if (isset($host["path"]) && $host["path"] != '/' && !isset($host["host"])) {
                    $this->array[] = $this->url.$element->href;
                    echo '<a href="'.$this->Encodestring($element->plaintext).'">'.$element->plaintext.'</a> — '.$this->url.$element->href.'</br>';                    
                }                    
            }     
            echo "<br>Создано разделов: ".count($elements)."<br><br>";       
            $html->clear();
            unset($html);
        }
        else echo "Не удалось загрузить страницу.";
    }

    public function ParseInside($elements) {  
        foreach ($this->array as $value) {
            $this->url = $value;
            $this->GetPage();   
            if ($this->info["http_code"] == 200) {
                $html = new simple_html_dom();
                $html->load($this->output);            
                $elements = $html->find($elements);
                foreach($elements as $element){
                    $host = parse_url($element->href);
                    if (isset($host["path"]) && $host["path"] != '/' && !isset($host["host"])) {
                        //$this->array[] = $this->url.$element->href;
                        echo '<a href="'.$this->Encodestring($element->plaintext).'">'.$element->plaintext.'</a> — '.$this->url.$element->href.'</br>';                    
                    }                    
                }     
                echo "<br>Создано разделов: ".count($elements); 
                //print_r($this->array);      
                $html->clear();
                unset($html);
            }
            else echo "Не удалось загрузить страницу.";            
        }
    }

    private function Encodestring($st) {
    $st = mb_strtolower($st, "utf-8");
    $st = str_replace(array(
    '?','!','.',',',':',';','*','(',')','{','}','[',']','%','#','№','@','$','^','-','+','/','\\','=','|','"','\'','а','б','в','г','д','е','ё','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ъ','ы','э',' ','ж','ц','ч','ш','щ','ь','ю','я'), array('_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','a','b','v','g','d','e','e','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','j','i','e','_','zh','ts','ch','sh','shch','','yu','ya'), $st);
    $st = preg_replace("/[^a-z0-9_]/", "", $st);
    $st = trim($st, '_');

    $prev_st = '';
    do
    {
        $prev_st = $st;
        $st = preg_replace("/_[a-z0-9]_/", "_", $st);
    }
    while($st != $prev_st);

    $st = preg_replace("/_{2,}/", "_", $st);
    return $st;
    }
}

// class Curlgetpage {
// 	public $output;
    
// 	public function Curlgetpage($url) {
// 		$cp = curl_init();
// 		curl_setopt($cp, CURLOPT_URL, $url);
// 		curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
// 		curl_setopt($cp, CURLOPT_HEADER, 0);
// 		$this->output = curl_exec($cp);
// 		curl_close($cp);
// 	}
// }
?>