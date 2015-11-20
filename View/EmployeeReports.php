<?php

/* 
 * @author: Robert Vines
 */
     
 include ('Header.php');
 include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
 
 session_start();
 $deptSession = $_SESSION[dept];
 
?>

<body>
    <div id="page">
        <div id="body">
            <h1 class="title"><?php echo $deptSession . ' Employee Reports'; ?></h1>
            
            
        </div>
    </div>
</body>
</html>