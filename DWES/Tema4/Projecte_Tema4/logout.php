<?php
include_once __DIR__.'/header.php';
session_start();

?>
<main>
    <h1>Has tancat la sessió, fins la próxima!</h1>
</main>
<?php
include_once __DIR__ . '/footer.php';
?>
 <script>
        setTimeout(function() {
            window.location.href = "destroy.php";
        }, 3000);
</script>
