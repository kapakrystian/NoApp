<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Strona powitalna</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding-bottom: 30%;
        }

        h1 {
            font-size: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="text-uppercase"><?php echo $_SESSION['name_surname']; ?>, witamy w aplikacji NoApp!</h1>
    
</body>

</html>