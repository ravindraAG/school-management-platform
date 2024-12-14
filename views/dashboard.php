<html lang="en">
<head>
    <?php include "views/template/Header.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
       rel="stylesheet" 
       integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"
    >
    <title>Header Only</title>
    <style>
      header {
        background-color: #0d222f;
      }
    </style>
    <title>My Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .tables-main {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .inner-tittle {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #f8f8f8;
            transition: border-color 0.2s;
        }
        .form-control:focus {
            border-color: #007bff;
            outline: none;
            background: #fff;
        }
        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #fff;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .table th {
            background-color: #f1f1f1;
            font-weight: bold;
            color: #333;
        }
        .table tbody tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<body>
    <!-- Include header HTML here -->
    <header>
      <div
        class="d-flex justify-content-between align-items-center p-3 text-white shadow-sm"
      >
        <!-- Left Section: Logo and Sidebar Toggle -->
        <div class="d-flex align-items-center">
          <button
            id="sidebar-toggle"
            class="btn btn-link text-white fs-4 me-4 p-0"
            aria-label="Toggle sidebar"
          >
            <i class="fas fa-bars"></i>
          </button>
          <img
            src="logo.png"
            alt="School Logo"
            class="me-3"
            style="height: 50px"
            type="button"
          />
          <h1 class="m-0 fs-4">Great School</h1>
        </div>

        <!-- Right Section: Navigation -->
        <nav>
          <ul class="list-unstyled d-flex m-0 p-0">
            <li class="mx-3">
              <a
                href="index.html"
                class="text-white text-decoration-none fw-bold"
                >Hoe</a
              >
            </li>
            <li class="mx-3">
              <a
                href="about.html"
                class="text-white text-decoration-none fw-bold"
                >About</a
              >
            </li>
            <li class="mx-3">
              <a
                href="admissions.html"
                class="text-white text-decoration-none fw-bold"
                >Admissions</a
              >
            </li>
            <li class="mx-3">
              <a
                href="contact.html"
                class="text-white text-decoration-none fw-bold"
                >Contact</a
              >
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Include sidebar JavaScript here -->
    <script src="sidebar.js"></script>
  </body>
</html>

    <?php include "views/template/Header.php"; ?>
    <div class="graph-visual tables-main">
        <h3 class="inner-tittle two">My Students</h3>
        <div class="graph">
            <div class="tables">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>School Year</label>
                            <select class="form-control" name="yearlevel">
                                <option></option>
                                <option>2023-2024</option>
                                <option>2024-2025</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Grade</label>
                            <select class="form-control" name="grade">
                                <option></option>
                                <option>Grade 1</option>
                                <option>Grade 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Subject</label>
                            <select class="form-control" name="subject">
                                <option></option>
                                <option>Mathematics</option>
                                <option>Science</option>
                            </select>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered"> 
                    <thead> 
                        <tr>
                            <th>#</th> 
                            <th>First Name</th> 
                            <th>Middle Name</th> 
                            <th>Last Name</th> 
                        </tr> 
                    </thead>
                    <tbody> 
                        <tr> 
                            <th scope="row">1</th>
                            <td>Deniecia</td> 
                            <td>Richard</td> 
                            <td>Baldie</td> 
                        </tr> 
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</body>
</html>
