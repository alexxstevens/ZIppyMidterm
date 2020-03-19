<?php include 'header.php'; ?>
    <main>
        <BR>
        <h2 class="add">ADD VEHICLE</h2><br>
        <div class="add">
            <form action="index.php" method="get" id="add_vehicle_form">
                <input type="hidden" name="action" value="add_vehicle">
                <label>Type:</label>
                <select name="type_code">
                <?php foreach ($types as $type) : ?>
                    <option value="<?php echo $type['type_code']; ?>">
                        <?php echo $type['type_name']; ?>
                    </option>
                <?php endforeach; ?>
                </select><br>
                <label>Class:</label>
                <select name="class_code">
                <?php foreach ($classes as $class) : ?>
                    <option value="<?php echo $class['class_code']; ?>">
                        <?php echo $class['class_name']; ?>
                    </option>
                <?php endforeach; ?>
                </select><br>            

                <label>Year:</label>
                <input type="text" name="year" max="20" required><br>

                <label>Make:</label>
                <input type="text" name="make" max="50" required><br>

                <label>Model:</label>
                <input type="text" name="model" max="50" required><br>

                <label>Price:</label>
                <input type="text" name="price" max="50" required>

                <label>&nbsp;</label>
                <input type="submit" value="Add Vehicle" class="button blue"><br>
            </form>
        </div>
<br>
        <div>
            <p class="add"><a href="index.php?action=show_inventory">Click Here to View Inventory</a></p>
        </div>
        <br>
    </main>

<?php include 'footer.php'; ?>