<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 div {
            text-shadow: 2px 2px;
        }
    </style>
</head>
<body>

        <center><h1 class = "center alert alert-success" style = "width:500px; font-weight:Bolder;"><div onmouseover="mOver(this)" onmouseout="mOut(this)">GESTION DE VITICULTEUR</div></h1></center>
   
        <!-- <img src="images/logo.jpg"> -->

    <span>
        
    </span>
        <span><span>
    
    
    <script>
        function mOver(obj) {
        obj.innerHTML = "VENDAGES"
        }

        function mOut(obj) {
        obj.innerHTML = "GESTION DE VITICULTEUR"
        }
    </script>
</body>
</html>