<?php
$mmenu = 7;
$smenu = 1;
include '../inc/header.php';
?>

<div id="content_wrap" class="erp">
	<div class="sub_content">
		
		<div class="sec01">	
			<div class="inner">
				<script>
				var icaFile = "PKI-ERP.ica";
				var width = 1024;
				var height = 700;
				var start = "Auto";
				var border = "On";
				var hspace = 2;
				var vspace = 2;
				var cabLoc = "down/XenAppWeb.exe";
				var plugRefLoc ="down/wfica.cab";
				var applicationType = "application/x-ica";

				var activeXHTML = '<OBJECT classid="clsid:238f6f83-b8b4-11cf-8771-00a024541ee3" data="' + icaFile + '" CODEBASE="' + cabLoc + '" width=' + width + ' height=' + height + ' hspace=' + hspace + ' vspace=' + vspace + '> <param name="Start" value="' + start + '"><param name="Border" value="' + border + '"></OBJECT>';


				var plugInHTML = '<EMBED SRC="' + icaFile + '" type="' + applicationType +'" pluginspage="' + plugRefLoc + '" width=' + width + ' height=' + height + ' start=' + start + ' border=' + border + ' hspace=' + hspace + ' vspace=' + vspace + '>';
				var plugInHTML2 = '<EMBED SRC="' + icaFile + '" type="' + applicationType +'" pluginspage="' + cabLoc + '" width=' + width + ' height=' + height + ' start=' + start + ' border=' + border + ' hspace=' + hspace + ' vspace=' + vspace + '>';

				var userAgent = navigator.userAgent;
				if (userAgent.indexOf("Mozilla") != -1) {
					if (userAgent.indexOf("MSIE") != -1) {
						if (userAgent.indexOf("Windows 3") > 0)
							{ document.write(plugInHTML); }
						else
							{ document.write(activeXHTML); }
					}
					else
						{ if (userAgent.indexOf("Win16") > 0) { document.write(plugInHTML); }
					else if (userAgent.indexOf("Mozilla/3") != -1) { document.write(plugInHTML); }
					else { document.write(plugInHTML2); }
				}
			}

			</script>

			<!-- <a href="http://www.packardkorea.co.kr/erp/PKI-ERP.ica">
				Your browser does not support JavaScript! You'll have to click here to launch
				the application.
			</a> -->



		</div>
	</div>



</div>
</div>



<?php include '../inc/footer.php';?>
