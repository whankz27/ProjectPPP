<?php
function getNoPPPValue($id_to_fetch) {
    global $conn;
    // Fetch data from the database
    $sql = "SELECT * FROM onlinelisting WHERE no_ppp = $id_to_fetch";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Output data of the first row
        $row = $result->fetch_assoc();
        // Get the value
        $no_ppp_value = $row["no_ppp"];
    } else {
        // If no results are found, set a default value or handle accordingly
        $no_ppp_value = "No data found";
    }

    // Close the database connection
    $conn->close();

    // Return the value
    return $no_ppp_value;
}

