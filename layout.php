<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <title><?php echo $pageTitle ?? 'Hackett London' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include $content; ?>
</body>
</html>