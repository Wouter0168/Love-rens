<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takenbord</title>
</head>
<body>
<?php require_once 'resources/header.php'; ?>

<?php 
// Verbinding maken in de database
require_once 'configs/conn.php';
$query = "SELECT * FROM taken";
$statement = $conn->prepare($query);
$statement->execute();
$taken =  $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <!-- Todo list tonen -->
    <h2>TODO</h2>
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

<table>
    <!-- Doing list tonen -->
    <h2>Doing</h2>
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

<table>
    <!-- Done list tonen -->
    <h2>Done</h2>
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

</body>
</html>
