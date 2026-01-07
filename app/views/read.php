<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/read.css">
    <title>CRUD | Lobo</title>
</head>
<body>
    <div class="container">
        <div class="read">
            <h1>LOBO | CRUD Application <a href="/add">ADD USER</a></h1>
            <div class="inputs">
                <input type="text" placeholder="Search Student">
            </div>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th>Student Id</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Lobo</td>
                        <td>Alexander</td>
                        <td>aj@gmail.com</td>
                        <td>2004-03-14</td>
                        <td class="action">
                            <a href="/view">View</a>
                            <a href="/update">Edit</a>
                            <a id="del">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal-container">
        <div class="modal">
            <h3>Delete</h3>
            <hr>
            <p>Are you sure you want to delete this?</p>
            <form action="">
                <input type="text" placeholder="Type 'CONFIRM'  to delete"><br>
                <button onclick="closeModal()" class="yes" type="submit">Yes</button>
                <button onclick="closeModal()" id="no" class="no">No</button>
            </form>
        </div>
    </div>

    <script src="./js/index.js"></script>
</body>
</html>