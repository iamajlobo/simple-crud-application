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
            <h1>ADD STUDENT <a href="/">BACK</a></h1>
            <hr>
            <div class="form-container">
                <form action="">
                    <div class="inputs">
                        <label for="f_name">First Name:</label><br>
                        <input type="text" id="f_name" name="f_name" placeholder="Enter first name">
                    </div>
                    <div class="inputs">
                        <label for="l_name">Last Name:</label><br>
                        <input type="text" id="l_name" name="l_name" placeholder="Enter last name">
                    </div>
                    <div class="inputs">
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" placeholder="juandelacruz@gmail.com">
                    </div>
                    <div class="inputs">
                        <label for="course">Course:</label><br>
                        <select name="course" id="course">
                            <option value="NONE">Choose Course</option>
                            <option value="BSCS">Bachelor of Science in Computer Science</option>
                            <option value="BSIT">Bachelor of Science in Information Technology</option>
                            <option value="BSIS">Bachelor of Science in Information System</option>
                        </select>
                    </div>
                    <div class="">
                        <label for="photo">Photo:</label>
                        <input type="file" id="photo" name="photo">
                    </div>
                    <button type="submit">ADD STUDENT</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>