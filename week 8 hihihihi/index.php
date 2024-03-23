<!DOCTYPE html>
<html lang="nl">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
<head>
    <title>Prikbord</title>
    <?php require_once 'head.php'; ?>
    
</head>

<body>

    <?php require_once 'header.php'; ?>

    <div class="container home">
        <p>Berichten:</p>

        <?php
        require_once 'backend/conn.php';
        $query = "SELECT * FROM berichten";
        $statement = $conn->prepare($query);
        $statement->execute();
        $berichten = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <ul>
            <?php foreach ($berichten as $bericht) : ?>
                <li>
                    <span>Title: <?php echo $bericht['title']; ?></span><br>
                    <span>Content: <?php echo $bericht['content']; ?></span>
                    <a href="berichten/edit.php?id=<?php echo $bericht['id']; ?>">Edit</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</body>

</html>

