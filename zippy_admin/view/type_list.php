<?php include 'header.php'; ?>
<br>

    <h2 class="list">Vehicle Types</h2>
    <div class="list">
        <table>
            <tr>
                <th colspan="2">Type Name</th>
            </tr>        
            <?php foreach ($types as $type) : ?>
            <tr>
                <td class="table"><?php echo $type['type_name']; ?></td>
                <td class="table">
                    <form action="." method="get">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="type_code"
                            value="<?php echo $type['type_code']; ?>"/>
                        <input type="submit" value="Remove" class="button red" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>    
        </table>
</div>
<br><br>

        <h2 class="list">Add Vehicle Type</h2>
        <div class="list">
        <form action="." method="get" id="add_type_form">
            <input type="hidden" name="action" value="add_type">

            <label class="list">Type Name:</label>
            <input type="text" name="type_name" max="20" required>

            <br><br>
            <input id="add_type_button" type="submit" class="button blue" value="Add Vehicle Type"><br>
        </form>
</div>
<div>
    <br>
        <p class="add"><a href="index.php?action=show_inventory">Click Here to View Inventory</a></p>
    <br>
</div>

<?php include 'footer.php'; ?>

