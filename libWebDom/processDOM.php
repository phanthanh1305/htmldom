<?php 
	include('simple_html_dom.php');

	function getData_1($url){
		if($url == null || $url == ""){
			return false;
		}
		$html = new simple_html_dom();
		$html->load_file($url);
		$list_post = $html->find('.listing_box');
		$stt = 0;
		foreach ($list_post as $item) {
			$html1 = new simple_html_dom();
			$html1->load($item);
			$tieude = $html1->find('.company_name',0);
			$diachi = $html1->find('.listing_diachi',0);
			$sdt = $html1->find('.listing_tel',0);
			$stt++;
			echo "<tr>";
			echo "<th scope='row'>".$stt."</th>";
			echo "<td><span class='copy-btn badge badge-primary' data-clipboard-text='".trim($tieude->plaintext)."'>Copy</span> ".trim($tieude->plaintext)."</td>";
			echo "<td><span class='copy-btn badge badge-success' data-clipboard-text='".trim($diachi->plaintext)."'>Copy</span> ".trim($diachi->plaintext)."</td>";
			echo "<td><span class='copy-btn badge badge-danger' data-clipboard-text='".trim($sdt->plaintext)."'>Copy</span> ".trim($sdt->plaintext)."</td>";
			echo "</tr>";
		}
		return true;
	}
	function getData_2($url){
		if($url == null || $url == ""){
			return false;
		}
		$html = new simple_html_dom();
		$html->load_file($url);
		$list_post = $html->find('.noidungchinh');
		$stt = 0;
		foreach ($list_post as $item) {
			$html1 = new simple_html_dom();
			$html1->load($item);
			$tieude = $html1->find('.company_name',0);
			$diachi = $html1->find('.diachisection',1);
			$sdt = $html1->find('.thoaisection',0);
			$stt++;
			echo "<tr>";
			echo "<th scope='row'>".$stt."</th>";
			echo "<td><span class='copy-btn badge badge-primary' data-clipboard-text='".trim($tieude->plaintext)."'>Copy</span> ".trim($tieude->plaintext)."</td>";
			echo "<td><span class='copy-btn badge badge-success' data-clipboard-text='".trim($diachi->plaintext)."'>Copy</span> ".trim($diachi->plaintext)."</td>";
			echo "<td><span class='copy-btn badge badge-danger' data-clipboard-text='".trim($sdt->plaintext)."'>Copy</span> ".trim($sdt->plaintext)."</td>";
			echo "</tr>";
		}
		return true;
	}
	function getData_3($url){
		if($url == null || $url == ""){
			return false;
		}
		$html = new simple_html_dom();
		$html->load_file($url);
		$baongoai = $html->find('#noidungchinh', 0);
		$html->load($baongoai->children(1)->outertext);
		$list_post = $html->find('div');
		$stt = 0;
		foreach ($list_post as $item) {
			if($stt > 0){
				$html1 = new simple_html_dom();
				$html1->load($item);
				$tieude = $html1->find('h2', 0);
				echo $tieude->plaintext;
			}
			
		}
		return true;
	}
	function getData($url){
		if($url == null || $url == ""){
			return false;
		}
		if(strpos($url, 'yellowpages.vnn.vn'))
			getData_1($url);
		else if(strpos($url, 'trangvangvietnam.com'))
			getData_2($url);
		else if(strpos($url, 'niengiamtrangvang.com'))
			getData_3($url);
		return true;
	}
?>