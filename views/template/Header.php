<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CDN -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />

    <title>Header Only</title>
    <style>
      header {
        background-color: #0d222f;
      }
    </style>
  </head>
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
