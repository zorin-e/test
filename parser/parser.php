<?
header('Content-Type: text/html; charset=utf-8');

require_once "simple.php";
require_once "class.php";

$url = "http://timati-life.ru";
$parser = new Parse($url);

$parser->ParseMenu(".menu .bgText a");
$parser->ParseInside(".con3 .con2 a");
//$parser->ParseInside("");




// //define('INC_PATH', $_SERVER['DOCUMENT_ROOT']."/parser/");

// require_once "simple.php";

// require_once "class.php";

// // require_once $_SERVER[DOCUMENT_ROOT].$path_dop."/vars.inc.php";
// // require_once $_SERVER[DOCUMENT_ROOT].$path_dop."/netcat/connect_io.php";

// //GLOBAL $db;

// header('Content-Type: text/html; charset=utf-8');

// $url_parse = "http://berkino.ru";

// $curloutput = new Curlgetpage($url_parse);

// $html = str_get_html($curloutput->output);

// if ($html && $html->find('ul.menu li a')!=''){
//     foreach($html->find('ul.menu li a') as $a){
//     	$host = parse_url($a->href);
//     	if (isset($host['path']) && $host['path'] != '/') {
// 			echo '<a href="'.$path_dop.'/'.encodestring($a->plaintext).'">'.$a->plaintext.'</a> — '.$a->href.'</br>';    		
// 			#sql. Добавляем разделы.

// 			$curloutput2 = new Curlgetpage($a->href);
// 			$content_page = str_get_html($curloutput2->output);

// 			if (isset($content_page)) {
// 				foreach ($content_page->find('div.post') as $post) {
// 					$post_item['title'] = $post->find('div.post-title a', 0)->plaintext;
// 					$post_item['link'] = $post->find('div.post-title a', 0)->href;
// 					//$post_item['text'] = preg_replace("/(\r\n)/", "<br/>", $post->find('div.post-story > div', 0)->plaintext);
// 					if (isset($post_item['title']) && isset($post_item['link'])) {
// 						echo '<div> — '.$post_item['title'].' — '.$post_item['link'].'</div>';
// 					}

// 					# Заходим внутрь объекта
// 					$curloutput3 = new Curlgetpage($post_item['link']);
// 					// $curloutput = file_get_contents($post_item['link']);
// 					// echo $curloutput;
// 					$f_page = str_get_html($curloutput3->output);
// 					if (isset($f_page)) {
// 						$img_poster_path = $f_page->find('div.post div.post-story', 0)->children(1)->find('td img', 0)->src;
// 						$content_div = strip_tags($f_page->find('div.post div.post-story', 0)->children(1)->find('td', 0), '<br>');
// 						//$content_p = $f_page->find('div.post div.post-story > table > td div > p', 0)->plaintext;
// 						echo '<div style="border:solid 1px red;">'.(isset($img_poster_path) ? '<img src="'.$url_parse.$img_poster_path.'">':NULL).$content_div.'</div>';

// 						//print_r($content_div);
						
// 					}
// 					exit();					
// 					# end
//                     $f_page->clear();
//                     unset($f_page);
// 				}	

// 				$content_page->clear();
//     			unset($content_page);			
// 			}

//     	}        
//     }

//     $html->clear();
//     unset($html);
// }

?>