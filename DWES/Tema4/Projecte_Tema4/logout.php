<?php
include_once __DIR__.'/header.php';
?>
    <h1>Has tancat la sessió, fins la próxima!</h1>
<?php
include_once __DIR__ . '/footer.php';
?>
 <script>
        setTimeout(function() {
            window.location.href = "destroy.php";
        }, 3000);
</script>
