<div class="copyright-box">
        <div class="container container-fluid text-center copyright">
            © Joo-Marketti
            <?php
        $currentFile = basename($_SERVER['PHP_SELF']);
        $lastModifiedTime = filemtime($currentFile);
        echo "<br>Last modified: " . date("F d, Y H:i:s", $lastModifiedTime);
        ?>
        </div>
      
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




<style>

    
.copyright-box {
    background-color: #FF3F00;
    margin-top: 30px;
    padding: 10px; /* Adjusted padding for space inside the box */
    text-align: center;
    color: white;
}

</style>