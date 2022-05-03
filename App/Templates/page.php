<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DAWN FM</title>
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link href="/Styles/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<script src="https://unpkg.com/react@17.0.2/umd/react.production.min.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@17.0.2/umd/react-dom.production.min.js" crossorigin></script>
<?php
echo $this->header;

if ($user == null) {
    echo $this->modal_login;
}

echo $page_temp;

echo $this->footer;
?>
    <script type="text/javascript" src="/JS/login-modal.js"></script>
</body>
</html>