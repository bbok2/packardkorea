<html>
<head>
  <title>패커드코리아</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
  <table>
    <tr>
      <td>
        <p>
          <!-- DIRECT.EXE EMBED -->
          <script>

// YOU SHOULD ONLY NEED TO CHANGE THE VARIABLES BELOW.
//
// icaFile: location of the .ICA file for both the OBJECT and EMBED.
var icaFile = "PKI-ERP.ica";
// width and height: pixel-size of the embedded application.
var width = 1024;
var height = 700;
// start attribute: if Auto, application fires up upon pageload. If Manual, application waits to be clicked by user.
var start = "Auto";
// border attribute: On/Off, to specify border around application window.
var border = "On";
// Want vertical/horizontal space around the app? Set these just like for the <IMG> tag.
var hspace = 2;
var vspace = 2;
// Where is the ActiveX CAB file located? It's probably best to leave this set to Citrix:
// C.H Lee 2009.02.04
// var cabLoc = "http://download2.citrix.com/FILES/en/products/client/ica/client9.0/ica32t.exe";
var cabLoc = "down/XenAppWeb.exe";
// Where is the Plugins Reference page located? It's probably best to leave this set to Citrix:
// 2009.02.04 C.H Lee
// var plugRefLoc = "http://download2.citrix.com/FILES/en/products/client/ale/current/wfplug32.exe";
// var plugRefLoc ="down/wfplug32.exe";
var plugRefLoc ="down/wfica.cab";
var applicationType = "application/x-ica";
// END OF CHANGES. DO NOT CHANGE THE VARIABLES BELOW.
// The following is the ActiveX tag:
var activeXHTML = '<OBJECT classid="clsid:238f6f83-b8b4-11cf-8771-00a024541ee3" data="' + icaFile + '" CODEBASE="' + cabLoc + '" width=' + width + ' height=' + height + ' hspace=' + hspace + ' vspace=' + vspace + '> <param name="Start" value="' + start + '"><param name="Border" value="' + border + '"></OBJECT>';

// And the Plugin tag:
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

<a href="http://www.packardkorea.co.kr/erp/PKI-ERP.ica">
  Your browser does not support JavaScript! You'll have to click here to launch
  the application.
</a>


</td><!-- Delete this line to remove the orange band!! -->
</tr>
</table>

</body>
</html>
