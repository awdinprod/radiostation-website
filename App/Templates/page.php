<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DAWN FM</title>
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link href="/Styles/style.css" type="text/css" rel="stylesheet">
</head>
<body>

<?php
echo $this->header;

if ($user == null) : ?>
<div id="modal" class="modal">
    <?php echo $this->modal_login; ?>
</div>
<?php endif;

echo $page_temp;

echo $this->footer;
?>
    <script type="text/javascript" src="/JS/login-modal.js"></script>
</body>
</html>