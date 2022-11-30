<?php
session_start();
session_unset();
session_destroy();
?>
<script>
    alert("All items cleared");
    location.replace('pur.php');
</script>
<!-- Click <a href="index.php"> here</a> to go to home page! -->