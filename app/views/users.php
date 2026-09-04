<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Users | Just Klowi Things</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #0d0d12;
            color: #f5f5f5;
            min-height: 100vh;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px 8%;
            border-bottom: 1px solid #252530;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }

        .logo span {
            color: #ff6fae;
        }

        nav a {
            color: #aaa;
            text-decoration: none;
            margin-left: 25px;
            font-size: 14px;
            transition: 0.3s;
        }

        nav a:hover {
            color: #ff6fae;
        }

        .container {
            width: 84%;
            max-width: 1100px;
            margin: 60px auto;
        }

        .header {
            margin-bottom: 30px;
        }

        .tag {
            display: inline-block;
            background: #21151d;
            color: #ff6fae;
            border: 1px solid #482538;
            padding: 8px 14px;
            border-radius: 50px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        h1 {
            font-size: clamp(38px, 6vw, 60px);
            letter-spacing: -2px;
        }

        h1 span {
            color: #ff6fae;
        }

        .description {
            color: #888;
            margin-top: 12px;
            font-size: 15px;
        }

        .table-card {
            background: #15151d;
            border: 1px solid #292933;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            color: #ff6fae;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 16px;
            border-bottom: 1px solid #33333d;
        }

        td {
            padding: 16px;
            color: #ccc;
            font-size: 14px;
            border-bottom: 1px solid #252530;
        }

        tbody tr {
            transition: 0.3s;
        }

        tbody tr:hover {
            background: #1c1c26;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .id {
            color: #ff6fae;
            font-weight: bold;
        }

        .username {
            color: #f5f5f5;
            font-weight: bold;
        }

        .back-button {
            display: inline-block;
            margin-top: 25px;
            padding: 13px 22px;
            border: 1px solid #33333d;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: 0.3s;
        }

        .back-button:hover {
            border-color: #ff6fae;
            color: #ff6fae;
            transform: translateY(-2px);
        }

        footer {
            text-align: center;
            color: #555;
            padding: 30px;
            font-size: 12px;
            margin-top: 30px;
        }

        @media (max-width: 700px) {
            nav {
                padding: 20px;
            }

            nav div:last-child {
                display: none;
            }

            .container {
                width: 92%;
                margin: 40px auto;
            }

            .table-card {
                padding: 15px;
            }

            th,
            td {
                padding: 12px 10px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

<nav>
    <div class="logo">Just Klowi Things</div>

    <div>
        <a href="/student">Home</a>
        <a href="/student/profile">Profile</a>
    </div>
</nav>

<div class="container">

    <div class="header">
        <div class="tag">✦ Database Records</div>

        <h1>
            User <span>List.</span>
        </h1>

        <p class="description">
            A collection of registered users from the database.
        </p>
    </div>

    <div class="table-card">

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Username</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="id"><?= $user['id']; ?></td>
                        <td><?= $user['firstname']; ?></td>
                        <td><?= $user['lastname']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td class="username"><?= $user['username']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <a class="back-button" href="/student">
        ← Back to Home
    </a>

</div>

<footer>
    © <?= date('Y'); ?> Just Klowi Things — Built with LavaLust ✦
</footer>

</body>
</html>