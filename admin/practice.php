<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="refresh" content="100"> 
   <title></title>


   <script>
   function autoClick(){
   document.getElementById('linkToClick').click();
   }
   </script>
</head>
<body onload="setTimeout('autoClick();');">



      <a id="linkToClick" href="sms.php?msg=amrmain_msg" target="_blank">click me</a>

           
</body>
</html>

