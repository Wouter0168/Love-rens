<!doctype html>
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
        //Haal id uit de URL
        $id = $_GET['id'];

        //Voer query uit
        require_once '../backend/conn.php';
        $query = "SELECT * FROM berichten WHERE id = :id";
        //(maak het 5-stappenplan nog af)

        ?>

        <!-- Formulier voor edit: -->
        <form action="..." method="POST">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <!-- Voeg hier de andere velden toe -->
                
        </form>

        <!-- Formulier voor delete: -->
        <form action="..." method="POST">
            <input type="hidden" name="action" value="...">
            <!-- Voeg hier nog een veld toe -->
            <input type="submit" value="Verwijder bericht">
        </form>

    </div>  

</body>

</html>
