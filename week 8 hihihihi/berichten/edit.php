<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Prikbord / Aanpassen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>

    <div class="container">
        <h1>Aanpassen bericht</h1>

        <?php
        // Haal id uit de URL
        $id = $_GET['id'];

        // Voer query uit
        require_once '../backend/conn.php';
        $query = "SELECT * FROM berichten WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $bericht = $statement->fetch(PDO::FETCH_ASSOC);
        ?>

        <!-- Formulier voor edit: -->
        <!-- <form action="../backend/berichtenController.php" method="POST">  -->
        <form action="<?php echo $base_url; ?>/git/Love-rens/week%208%20hihihihi/backend/berichtenController.php?action=edit&id=<?php echo $_GET['id'];?>" method="POST">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="title">Titel:</label>
                <input type="text" id="title" name="title" value="<?php echo $bericht['title']; ?>">
            </div>
            <div class="form-group">
                <label for="content">Inhoud:</label>
                <textarea id="content" name="content"><?php echo $bericht['content']; ?></textarea>
            </div>
            <input type="submit" value="Opslaan">
        </form>

        <!-- Formulier voor delete: -->
        <form action="<?php echo $base_url; ?>/git/Love-rens/week%208%20hihihihi/backend/berichtenController.php?action=delete&id=<?php echo $_GET['id'];?>" method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Verwijder bericht">
        </form>

    </div>

</body>

</html>

