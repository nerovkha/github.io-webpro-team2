<div class="copyright-box">
        <div class="container container-fluid text-center copyright">
            © Joo-Marketti
        </div>
        <?php
    $filename = basename($_SERVER['PHP_SELF']);
    if (file_exists($filename)) {
        echo "<div>Last modified: " . date("F d, Y H:i:s", filemtime($filename)) . "</div>";
    }
    ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



