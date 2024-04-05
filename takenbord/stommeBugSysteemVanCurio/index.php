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
                <option value="personeel">personeel</option>
                <option value="horeca">horeca</option>
                <option value="techniek">techniek</option>
                <option value="inkoop">inkoop</option>
                <option value="klantenservice">klantenservice</option>
                <option value="groen">groen</option>
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
document.addEventListener("DOMContentLoaded", function() {
    const filterPerson = document.getElementById("filter-person");
    const filterSector = document.getElementById("filter-sector");
    const filterStatus = document.getElementById("filter-status");

    filterPerson.addEventListener("change", filterTasks);
    filterSector.addEventListener("change", filterTasks);
    filterStatus.addEventListener("change", filterTasks);

    filterTasks(); // Filter taken bij het laden van de pagina

    function filterTasks() {
        const person = filterPerson.value;
        const sector = filterSector.value;
        const status = filterStatus.value;

        const todoDiv = document.querySelector(".todo");
        const doingDiv = document.querySelector(".doing");
        const doneDiv = document.querySelector(".done");

        // Verberg alle secties voordat je gaat filteren
        document.querySelectorAll(".todo, .doing, .done").forEach(function(element) {
            element.style.display = "none";
        });

        // Toon alle secties als "-- Status --" is geselecteerd
        if (status === "") {
            document.querySelectorAll(".todo, .doing, .done").forEach(function(element) {
                element.style.display = "block";
            });
        } else {
            // Toon alleen de relevante sectie op basis van de geselecteerde status
            if (status === "todo") {
                todoDiv.style.display = "block";
                populateTable(taken.filter(task => task.status === "ToDo"), document.getElementById("todo-table"));
            } else if (status === "doing") {
                doingDiv.style.display = "block";
                populateTable(taken.filter(task => task.status === "Doing"), document.getElementById("doing-table"));
            } else if (status === "done") {
                doneDiv.style.display = "block";
                populateTable(taken.filter(task => task.status === "Done"), document.getElementById("done-table"));
            }
        }
    }

    function populateTable(tasks, table) {
        // Clear table content
        table.innerHTML = '';

        // Add table rows for each task
        tasks.forEach(task => {
            const row = table.insertRow();
            row.innerHTML = `<td>${task.taak}</td><td>${task.sector}</td><td>${task.persoon}</td><td>${task.status}</td><td><a href="edit.php?id=${task.id}">Edit</a></td>`;
        });
    }
});
</script>
</body>
</html>