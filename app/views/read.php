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
            <div class="t-body">
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
                    <tbody class="t-body">
                        <?php foreach($data as $item):?>
                            <tr>
                                <td><?= $item['student_id'] ?></td>
                                <td><?= $item['last_name'] ?></td>
                                <td><?= $item['first_name'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['course'] ?></td>
                                <td class="action">
                                    <a href="/view?student_id=<?=$item['student_id']?>">View</a>
                                    <a href="/update?student_id=<?=$item['student_id']?>">Edit</a>
                                    <a id="del" class="del" data-id="<?= $item['student_id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                <div class="box-container">
                    <?php
                        for($i=1;$i <= 2; $i++){
                            $active = ($page == $i)? 'active' : '';
                            echo "<a class='box $active' href='/?page=$i'>$i</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-container">
        <div class="modal">
            <h3>Delete</h3>
            <hr>
            <p>Are you sure you want to delete this?</p>
            <form id="deleteForm" method="POST">
                <input type="text" id="confirmInput" placeholder="Type 'CONFIRM' to delete"><br>
                <button class="yes" type="submit">Yes</button>
                <button type="button" onclick="closeModal()" id="no" class="no">No</button>
            </form>
        </div>
    </div>

    <script src="./js/index.js"></script>
</body>
</html>