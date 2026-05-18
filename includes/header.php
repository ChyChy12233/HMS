<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') : 'Hotel Management System' ?></title>
    <?php if (isset($pageCss)): ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($pageCss, ENT_QUOTES, 'UTF-8') ?>">
    <?php endif; ?>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
