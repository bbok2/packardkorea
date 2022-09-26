<?php
$mmenu = 5;
$smenu = 1;
include '../inc/header.php';
?>

<div id="content_wrap" class="talent">
	<div class="sub_content">
		<div class="sub_section sec01">
			<div class="inner">

				<?php
				
				$ch = curl_init();
				$url = 'http://api.seibro.or.kr/openapi/service/StockSvc/getStkIsinByShortIsinN1'; /*URL*/
				$queryParams = '?' . urlencode('shortIsin') . '=005930'; 
				$queryParams .= '&' . urlencode('ServiceKey') . '=' . urlencode('3wAbyJO3NBhRUEDJoJ9ITTjH82hBcmd5P4GbjDjEXuB9wPqc544nmggq%2B%2FyP%2FfEF7RKk%2B39vBrxiIz1Am5%2Bnpg%3D%3D'); /*공공데이터포털에서 받은 인증키*/
				$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /*페이지번호*/
				$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /*한 페이지 결과 수*/
				$queryParams .= '&' . urlencode('martTpcd') . '=' . urlencode('11'); /*11.유가증권시장, 12.코스닥, 13.K-OTC, 14.코넥스, 50.기타시장*/

				curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HEADER, FALSE);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
				$response = curl_exec($ch);
				curl_close($ch);

				echo $queryParams;

				var_dump($response);
				?>


			</div>
		</div>
	</div>
</div>

<?php include '../inc/footer.php';?>
