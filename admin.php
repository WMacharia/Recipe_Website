<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN|Users</title>
    <style>
        body {
            background-color: white;
        }
        table {
        border-collapse: collapse;
        border: 1px solid;
        width: 100%;
        margin: 0;
        }
        tr:nth-child(even) td{
            border-left:none;
            border-right:none;
        }
        th, td {
        border: 1px solid;
        padding: 8px;
        text-align: left;
        }
        th {
        background-color: rgb(95, 95, 95);
        }
        tr:hover {
        background-color: #ddd;
        }
        .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        }
        .pagination a {
        margin: 0 5px;
        padding: 8px 16px;
        text-decoration: none;
        color: #000;
        border: 1px solid #ddd;
        }
        .pagination a.active {
        background-color: rgb(95, 95, 95);
        color: white;
        border: 1px solid rgb(95, 95, 95);
        }
        .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: rgb(95, 95, 95);
        padding: 10px;
        text-align: center;
        }

        .header-container h1, .header-container a {
        color: black;
        margin: 0;
        text-decoration: none;
        font-size: 26px;
        }

        .header-container a {
        padding: 10px 20px;
        background-color: rgb(95, 95, 95);
        border-radius: 5px;
        }

        .header-container a:hover {
        background-color: grey;
        }

        *{
        font-family: "Comic Sans";
        }
        
    </style>
</head>
<body>
<div class="header-container">
    <h1 style="text-align:center;">View Users</h1>
    <a href="admindash.php">&#x2190;Back</a>
</div>
    
    <?php
    require "include/connection.php";

    //number of results per page
    $results_per_page = 10;

    //number of results stored in the table
    $sql = "SELECT COUNT(*) AS total FROM register_users";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $total_results = $row['total'];

    //getting the total number of pages available
    $total_pages = ceil($total_results / $results_per_page);

    //determining which page number visitor is currently on
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($current_page < 1) $current_page = 1;
    if ($current_page > $total_pages) $current_page = $total_pages;

    //determine the SQL LIMIT starting number for the results on the displaying page
    $start_limit = ($current_page - 1) * $results_per_page;

    //get selected results from the database
    $sql = "SELECT email, password, fname, usergroup FROM register_users LIMIT $start_limit, $results_per_page";
    $result = mysqli_query($conn, $sql);

    //display the results on the page
    if ($result->num_rows > 0) {
        echo "<table>
        <tr>
        <th>Email</th>
        <th>First Name</th>
        <th>User Group</th>
        <th>Update</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>". $row["email"]. "</td>  
                    <td>" . $row["fname"]. "</td>
                    <td>" . $row["usergroup"]. "</td>
                    <td><a href=\"updateusers.php?email=" . $row['email'] . "\">View profile</a></td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "NO RESULTS.";
    }

    // Display the pagination
    echo '<div class="pagination">';
    for ($page = 1; $page <= $total_pages; $page++) {
        echo '<a href="admin.php?page=' . $page . '" class="' . ($page == $current_page ? 'active' : '') . '">' . $page . '</a>';
    }
    echo '</div>';
    ?>
</body>
</html>
