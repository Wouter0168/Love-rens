<!doctype html>
<html lang="nl">

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
        <?php foreach($berichten as $bericht): ?>
            <td><?php echo $bericht['title']; ?></td>
            <td><?php echo $bericht['content']; ?></td>
            <td><a href="edit.php?id=<?php echo $bericht['id']; ?>">Edit</a></td>
        </ul>
        <?php endforeach; ?>
    </div>

</body>

</html>
