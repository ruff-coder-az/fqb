<?php 
// Admin Tool for DB

function display_tables() {
    $mysqli = connect_to_db();
    $result = $mysqli->query("SHOW TABLES");
    echo "<table class='w3-table-all w3-round'>
            <tr>
            <th></th>
              <th>Table Name</th>
              <th>Number of Columns</th>
              <th>Total Rows</th>
              <th></th>
            </tr>";
    while ($table = $result->fetch_array()) {
        $table_name = $table[0];
        $result2 = $mysqli->query("SELECT * FROM $table_name");
        $num_cols = mysqli_num_fields($result2);
        $num_rows = mysqli_num_rows($result2);
        echo "<tr class='w3-panel w3-border'>
                <td colspan='1'>$table_name</td>
                <td colspan='1'>$num_cols</td>
                <td colspan='1'>$num_rows</td>
                <td colspan='1'><button class='w3-button w3-teal w3-right w3-round' onclick='toggleView(\"$table_name\")'>View Rows</button></td>
              </tr>
              <tr>
                <td colspan='5'>
                  <div id='$table_name' style='display:none;'>
                    <table class='w3-table-all'>
                      <tr>";
        while ($field = mysqli_fetch_field($result2)) {
            echo "<th>$field->name</th>";
        }
        echo "</tr>";
        while ($row = $result2->fetch_array()) {
            echo "<tr>";
            for ($i = 0; $i < $num_cols; $i++) {
                if ($i == 2 && $table_name == 'settings') {
                    echo "<td>
                            <form class='w3-inline' onsubmit='updateSetting(event, this)'>
                                <input type='hidden' name='id' value='" . $row[0] . "'>
                                <input type='hidden' name='label' value='" . $row[1] . "'>
                                <input type='hidden' name='table' value='" . $table_name . "'>
                                <input class='w3-input w3-border' type='text' name='setting_value' value='" . $row[2] . "'>
                                <button class='w3-button w3-teal w3-round' type='submit'>Update</button>
                            </form>
                          </td>";
                } else {
                    echo "<td>" . $row[$i] . "</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table></div></td></tr>";
    }
    echo "</table>";
}
?>