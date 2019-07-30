<?php
session_start();
?>

<html>
<head>
    <title>Ambruz | Creative Works</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <script src="jquery-ui.min.js"></script>
    <script>
        function LoggedIN(){

            <?php
            if(isset($_SESSION['user'])){
                ?>
                var id= document.getElementById('signin');
                id.text="<?php echo $_SESSION['user'];?>";
                <?php
            }
            else
                echo $_SESSION['user'];
            ?>
        }

        LoggedIN();
    </script>
</body>
</html>