    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Students</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container my-5">
        <h2> List of Students</h2>
        <a class="btn btn-primary" href="/crud_app/students/create.php" role="button">New student</a>
        <a class="btn btn-secondary" href="/crud_app/students/refresh.php" role="button">Refresh ID</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "newpassword";
            $database = "crud_app";

            //Create connection
            $conn = new mysqli($servername, $username, $password, $database);
            //Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //Read all from database
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);
            if (!$result) {
                die("Invalid query: " . $conn->error);
            }
            //Read the data
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['age']}</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/crud_app/students/edit.php?id={$row['id']}'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/crud_app/students/delete.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>
                ";
            }
            ?>
            </tbody>

        </table>
    </div>
    </body>
    </html>
