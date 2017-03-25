<?php
        session_start();
        unset($_SESSION['session_id']);
        echo '<script>window.location="login.php"</script>';
 ?>
<html>
        <head>
                <title>Logout</title>
                <link href="challenge.css" rel="stylesheet"/>
        </head>
        <body>
                
        </body>
</html>