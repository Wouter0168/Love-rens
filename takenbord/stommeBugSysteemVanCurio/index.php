<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Takenbord</title>
    
</head>
<body>
<?php require_once '../resources/header.php'; ?>

<?php 
// Verbinding maken in de database
require_once '../configs/conn.php';
$query = "SELECT * FROM taken";
$statement = $conn->prepare($query);
$statement->execute();
$taken =  $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- SOON moeten allebij uit de takenlijst komen , persoon moet uit de database dus niet dat je iemand random kan type of selecteren of Sector.  -->
<div class="container">
    <div class="filters">
        <h1>Taakbeheer</h1>
        <div class="task-management">
            <select id="filter-person">
                <option value="">-- Persoon (Soon) --</option>
                <option value="SOON">SOON</option>
                <option value="SOON">SOON</option>
                <option value="SOON">SOON</option>
            </select>
            <select id="filter-sector">
                <option value="">-- Sector (SOON) --</option>
                <option value="personeel">Personeel</option>
                <option value="horeca">Horeca</option>
                <option value="techniek">Techniek</option>
                <option value="inkoop">Inkoop</option>
                <option value="klantenservice">Klantenservice</option>
                <option value="groen">Groen</option>
            </select>
            <select id="filter-status">
                <option value="">-- Status --</option>
                <option value="todo">Todo</option>
                <option value="doing">Doing</option>
                <option value="done">Done</option>
            </select>
        </div>
    </div>

    <!-- Todo list tonen -->
<div class="taken-container">
    <div class="todo">
            <h2>TODO</h2>
            <table>
            <tr>
                <th>Taak</th>
                <th>Sector</th>
                <th>Persoon</th>
                <th>Status</th>
                <th>Edit de taak</th>
            </tr>
            <?php foreach($taken as $taak): ?>
                <?php if ($taak['status'] == 'ToDo'): ?>
                    <tr>
                        <td><?php echo $taak['taak']; ?></td>
                        <td><?php echo $taak['sector']; ?></td>
                        <td><?php echo $taak['persoon']; ?></td>
                        <td><?php echo $taak['status']; ?></td>
                        <td><a href="edit.php?id=<?php echo $taak['id']; ?>">Edit</a></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </div>

        <!-- Doing list tonen -->
        <div class="doing">
                <h2>Doing</h2>
                <table>
                <tr>
                    <th>Taak</th>
                    <th>Sector</th>
                    <th>Persoon</th>
                    <th>Status</th>
                    <th>Edit de taak</th>
                </tr>
                <?php foreach($taken as $taak): ?>
                    <?php if ($taak['status'] == 'Doing'): ?>
                        <tr>
                            <td><?php echo $taak['taak']; ?></td>
                            <td><?php echo $taak['sector']; ?></td>
                            <td><?php echo $taak['persoon']; ?></td>
                            <td><?php echo $taak['status']; ?></td>
                            <td><a href="edit.php?id=<?php echo $taak['id']; ?>">Edit</a></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </div>

        <!-- Done list tonen -->
    <div class="done">
        <h2>Done</h2>
        <table>
        <tr>
            <th>Taak</th>
            <th>Sector</th>
            <th>Persoon</th>
            <th>Status</th>
            <th>Edit de taak</th>
        </tr>
        <?php foreach($taken as $taak): ?>
            <?php if ($taak['status'] == 'Done'): ?>
                <tr>
                    <td><?php echo $taak['taak']; ?></td>
                    <td><?php echo $taak['sector']; ?></td>
                    <td><?php echo $taak['persoon']; ?></td>
                    <td><?php echo $taak['status']; ?></td>
                    <td><a href="edit.php?id=<?php echo $taak['id']; ?>">Edit</a></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    </div>
</div>

<script>
    const filterPerson = document.getElementById('filter-person');
    const filterSector = document.getElementById('filter-sector');
    const filterStatus = document.getElementById('filter-status');

    filterPerson.addEventListener('change', function() {
        filter();
    });

    filterSector.addEventListener('change', function() {
        filter();
    });

    filterStatus.addEventListener('change', function() {
        filter();
    });

    funcion filter() {
        window.location.replace("<?php echo $base_url; ?>/stommeBugSysteemVanCurio/index.php?filterPerson=" + filterPerson.value + "&filterSector=" + filterSector.value + "&filterStatus=" + filterStatus.value);
    }
</script>
</body>
</html>