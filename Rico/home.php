<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #111827;
            color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Navigation Styles */
        nav {
    width: 100%;
    background-color: #f4f4f4;
    padding: 10px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

nav ul {
    display: flex;
}

nav ul li {
    list-style: none;
    display: flex;
}

nav ul li a {
    margin-left: 1080px;
    color: #050505;
    text-decoration: none;
    font-size: 16px;
    padding: 8px 16px;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

nav ul li a:hover {
    background-color: #555;
    color: #e0e0e0;
}


        /* Heading Styles */
        h1 {
            color: #333;
            text-align: left;
            font-size: 16px;
            max-width: 600px; /* Optional: max width for readability */
            margin: 0;
            padding: 8px 16px;
        }
  /* Table Styles */
  table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #f4f4f4;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #f4f4f4;
        }

        td {
            background-color: #444;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><h1> Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>    
    </nav>
    <?php
                                include_once 'db.php';
                                $result = mysqli_query($conn,"SELECT * FROM studinfo");
                                ?>

                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                ?>
                                <div>
    <table>
   
        <thead>
        <a href="add.php">add student</a>
            <tr>
                <th>ID</th>
                <th>studID</th>
                <th>Full Name</th>
                <th>Course</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["sID"]; ?></td>
                    <td><?php echo $row["studID"]; ?></td>
                    <td><?php echo $row["fullname"]; ?></td>
                    <td><?php echo $row["course"]; ?></td>
                    <td><?php echo $row["year"]; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row["sID"]; ?>">Update</a>
                        <a href="delete.php?id=<?php echo $row["sID"]; ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    } else {
        echo "No result found";
    }
    ?>
</div>

</body>
</html>
