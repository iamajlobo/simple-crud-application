<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/add.css">
    <link rel="stylesheet" href="./css/view.css">
    <title>CRUD | Lobo</title>
</head>
<body>
    <div class="container">
        <div class="add">
            <h1>View Student <a href="/">BACK</a></h1>
            <hr>
            <div class="profile">
                <img src="./images/sample.jpg" alt="Sample">
                <div class="info">
                    <p>Student ID: <span><?= $data['student_id'] ?></span></p>
                    <p>Full Name: <span><?= strtoupper($data['full_name']) ?></span></p>
                    <p>Email: <span><?= $data['email'] ?></span></p>
                    <p>Course: <span><?= strtoupper($data['course']) ?></span></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>