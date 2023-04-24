<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./public/style.css" />
    <title>NoApp</title>
</head>

<body>
    <div>
        <h5>WCZYTAJ WIDOK: CZAS PRACY</h5>
        <h5><?php echo $params['resultWorktime'] ?? '' ?></h5>
        <h5><?php echo $page ?></h5>
        <!-- <?php echo htmlentities($action) ?> -->
    </div>
</body>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>