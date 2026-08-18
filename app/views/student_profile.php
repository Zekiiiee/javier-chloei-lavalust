<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Just Klowi Things — Profile</title>

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

        .wrapper {
            width: 85%;
            max-width: 900px;
            margin: 70px auto;
        }

        .small-title {
            color: #ff6fae;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        h1 {
            font-size: 50px;
            letter-spacing: -2px;
            margin-bottom: 40px;
        }

        .profile-card {
            background: #15151d;
            border: 1px solid #292933;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
        }

        .profile-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 30px;
            border-bottom: 1px solid #292933;
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #ff6fae;
            color: #0d0d12;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            font-weight: bold;
        }

        .name {
            margin-left: 20px;
            flex: 1;
        }

        .name h2 {
            font-size: 24px;
        }

        .name p {
            color: #777;
            margin-top: 5px;
        }

        .badge {
            border: 1px solid #355b49;
            color: #65e6a5;
            padding: 7px 12px;
            border-radius: 50px;
            font-size: 11px;
        }

        .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-top: 30px;
        }

        .detail {
            background: #101016;
            border: 1px solid #252530;
            padding: 20px;
            border-radius: 12px;
            transition: 0.3s;
        }

        .detail:hover {
            border-color: #ff6fae;
            transform: translateY(-3px);
        }

        .label {
            color: #777;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .value {
            margin-top: 8px;
            font-size: 16px;
        }

        .contact {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #292933;
        }

        .contact h3 {
            margin-bottom: 15px;
        }

        .contact p {
            color: #aaa;
            margin: 8px 0;
        }

        .social {
            margin-top: 20px;
        }

        .social a {
            color: #ff6fae;
            text-decoration: none;
            margin-right: 20px;
            font-size: 14px;
        }

        .social a:hover {
            text-decoration: underline;
        }

        .back {
            display: inline-block;
            margin-top: 30px;
            color: #aaa;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .back:hover {
            color: #ff6fae;
        }

        @media (max-width: 650px) {

            .details {
                grid-template-columns: 1fr;
            }

            .profile-top {
                flex-wrap: wrap;
                gap: 20px;
            }

            h1 {
                font-size: 38px;
            }
        }
    </style>
</head>

<body>

<nav>

    <div class="logo">
        Just Klowi Things
    </div>

    <div>
        <a href="/student">Home</a>
        <a href="/student/profile">Profile</a>
    </div>

</nav>


<div class="wrapper">

    <div class="small-title">
        My Digital Identity
    </div>

    <h1>
        Student Profile ✦
    </h1>


    <div class="profile-card">

        <div class="profile-top">

            <div class="avatar">
                CJ
            </div>

            <div class="name">

                <h2>
                    <?= $name; ?>
                </h2>

                <p>
                    <?= $course; ?>
                </p>

            </div>

            <div class="badge">
                ● STUDENT
            </div>

        </div>


        <div class="details">

            <div class="detail">

                <div class="label">
                    Student ID
                </div>

                <div class="value">
                    <?= $student_id; ?>
                </div>

            </div>


            <div class="detail">

                <div class="label">
                    Year Level
                </div>

                <div class="value">
                    <?= $year; ?>
                </div>

            </div>


            <div class="detail">

                <div class="label">
                    Section
                </div>

                <div class="value">
                    <?= $section; ?>
                </div>

            </div>


            <div class="detail">

                <div class="label">
                    Email
                </div>

                <div class="value">
                    <?= $email; ?>
                </div>

            </div>

        </div>


        <div class="contact">

            <h3>
                Let's Connect ♡
            </h3>

            <p>
                📱 0975 053 2959
            </p>

            <p>
                📸 Instagram:
                <strong>klowiiie</strong>
            </p>

            <p>
                💬 Facebook:
                <strong>Chloei Javier</strong>
            </p>


            <div class="social">

                <a href="https://instagram.com/klowiiie" target="_blank">
                    Instagram ↗
                </a>

                <a href="#" target="_blank">
                    Facebook ↗
                </a>

            </div>

        </div>

    </div>


    <a class="back" href="/student">
        ← Back
    </a>

</div>

</body>
</html>