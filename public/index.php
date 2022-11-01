<!DOCTYPE html>
<html lang="ka" data-env="jmeter">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Avtandil Kikabidze aka LONGMAN">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="none"/>
</head>
<body>

<p>Folders:</p>

<?php
$iterator = new DirectoryIterator('.');
$folders = [];
foreach (new DirectoryIterator('.') as $fileInfo) {
    if ($fileInfo->isDot() || ! $fileInfo->isDir()) {
        continue;
    }
    $folders[] = $fileInfo->getFilename();
}

sort($folders);

echo '<ul>';
foreach ($folders as $folder) {
    echo '<li>';
    ?>
    <a href="<?= $folder ?>"><?= $folder ?></a>
    <?php
    echo '</li>';
}
echo '</ul>';
?>

</body>
</html>
