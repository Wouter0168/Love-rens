<body>

    <?php require_once 'resources/header.php'; ?>

    <div class="container">
        <h1>Maak een taak aan!</h1>

        <form action="<?php echo $base_url; ?>/Controller/TaakController.php?action=create" method="POST">
            <label for="taak">De taak:</label>
            <input type="text" name= 'taak' />
            <br>
            <label for="persoon">Wie de taak moet doen:</label>
            <input type="text" name= 'persoon' />
            <br>
            <label for="sector">Welk sector van het bedrijf zit die?</label>
            <input type="text" name= 'sector' />
            <br>
            <label for="deadline">Wanner moest het af zijn:</label>
            <input type="date" name= 'persoon' />
            <br>
            <label for="status">Wat is de status van de taak:</label>
            <select name="status">
                    <option value="">Status van de taak</option>
                    <option value="ToDo">ToDo</option>
                    <option value="Doing">Doing</option>
                    <option value="Done">Done</option>
            </select>
            <br>
        
            <input type="submit" value="Create nieuwe taak">

        </form>
    </div>

</body>

</html>