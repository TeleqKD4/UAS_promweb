<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Modular - Premium</title>

    <!-- FONT AWESOME (WAJIB DI HEAD) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #3498db;
            --bg-color: #f8f9fa;
            --text-color: #333;
            --white: #ffffff;
            --shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        header {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 20px 40px;
            box-shadow: var(--shadow);
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        nav {
            background-color: var(--white);
            padding: 15px 40px;
            margin-bottom: 30px;
            display: flex;
            gap: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        nav a {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 600;
            transition: 0.3s;
            padding: 8px 15px;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: var(--accent-color);
            color: var(--white);
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            gap: 30px;
            padding: 0 20px;
        }

        /* Sidebar Styling */
        aside {
            flex: 1;
            background: var(--white);
            padding: 25px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            height: fit-content;
        }

        /* Main Content Styling */
        main {
            flex: 3;
            background: var(--white);
            padding: 30px;
            border-radius: 12px;
            box-shadow: var(--shadow);
        }

        h3 {
            color: var(--primary-color);
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 10px;
            margin-top: 0;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 12px;
            text-align: left;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Form Styling */
        input[type="text"],
        input[type="password"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: var(--accent-color);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <header>
        <h1>Dashboard Admin</h1>
    </header>

    <nav>
        <a href="/lab11_php_oop/artikel/index">Beranda</a>
        <a href="/lab11_php_oop/artikel/tambah">Tambah User</a>
    </nav>

    <div class="container">
        <?php include "sidebar.php"; ?>
        <main>
