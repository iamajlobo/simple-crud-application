<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/add.css">
    <title>CRUD | Lobo</title>
</head>
<body>
    <div class="container">
        <div class="add">
            <h1>UPDATE STUDENT <a href="/">BACK</a></h1>
            <hr>
            <?php include_once 'includes/message_box.php'; ?>
            <div class="form-container">
                <form action="/api/students/<?= $data['student_id'] ?>" method="POST">
                    <div class="inputs">
                        <label for="f_name">First Name:</label><br>
                        <input type="text" id="f_name" name="first_name" placeholder="Enter first name" value="<?= $data['first_name']?>">
                    </div>
                    <div class="inputs">
                        <label for="l_name">Last Name:</label><br>
                        <input type="text" id="l_name" name="last_name" placeholder="Enter last name" value="<?= $data['last_name']?>">
                    </div>
                    <div class="inputs">
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" placeholder="juandelacruz@gmail.com" value="<?= $data['email']?>">
                    </div>
                    <div class="inputs">
                        <label for="course">Course:</label><br>
                        
                        <select name="course" id="course" >
                            <option value="<?= strtoupper($data['course']) ?>"><?= strtoupper($data['course']) ?></option>
                            <option value="BSCS">Bachelor of Science in Computer Science</option>
                            <option value="BSIT">Bachelor of Science in Information Technology</option>
                            <option value="BSIS">Bachelor of Science in Information System</option>
                        </select>
                    </div>
                    <button type="submit">SAVE CHANGES</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const flashMessage = document.getElementById('flash-message');

        if (flashMessage) {
            setTimeout(() => {
            flashMessage.classList.add('hide');
            }, 3000);
        }
    </script>
</body>
</html>