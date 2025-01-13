<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .button {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .search-bar {
            margin-bottom: 20px;
        }
        .search-input {
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }
        .search-input:focus {
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Home Page</h1>

        <div class="search-bar">
            <input 
                type="text" 
                class="search-input" 
                placeholder="Search here...">
        </div>

        <a href="search.php" class="button">Search Option</a>
        <a href="list_of_employee.php" class="button">User List Option</a>
    </div>
</body>
</html>
