<?php require_once 'template/header.php' ?>
<?php if (!isset($_SESSION['AUTHORIZED'])): ?>
    <?php include_once 'template/modals/index/auth.php' ?>
<?php endif; ?>
<?php require_once 'template/footer.php' ?>
<?php if (!isset($_SESSION['AUTHORIZED'])): ?>
    <script type="text/javascript" src="template/js/index/index.js"></script>
    <script>
        let registerModal = new Register_Modal();
    </script>
<?php endif; ?>