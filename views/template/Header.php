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
                >Home</a
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
    <!-- Sidebar -->
    <div
      id="sidebar"
      class="position-fixed bg-light shadow"
      style="
        top: 0;
        left: -250px;
        width: 250px;
        height: 100vh;
        z-index: 1050;
        transition: left 0.3s ease;
      "
    >
      <ul class="list-unstyled mt-4">
        <li class="p-2 border-bottom">
          <a href="#" class="text-decoration-none text-dark fw-semibold">1</a>
        </li>
        <li class="p-2 border-bottom">
          <a href="#" class="text-decoration-none text-dark fw-semibold">2</a>
        </li>
        <li class="p-2 border-bottom">
          <a href="#" class="text-decoration-none text-dark fw-semibold">3</a>
        </li>
        <li class="p-2 border-bottom">
          <a href="#" class="text-decoration-none text-dark fw-semibold">4</a>
        </li>
        <li class="p-2 border-bottom">
          <a href="#" class="text-decoration-none text-dark fw-semibold">5</a>
        </li>
        <li class="p-2 border-bottom">
          <a href="#" class="text-decoration-none text-dark fw-semibold">6</a>
        </li>
        <li class="p-2 border-bottom">
          <a href="#" class="text-decoration-none text-dark fw-semibold">7</a>
        </li>
      </ul>
    </div>

    <!-- Overlay -->
    <div
      id="overlay"
      class="position-fixed"
      style="
        display: none;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1049;
      "
    ></div>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-rbsA2VBKQ1awR5K3Qj9MZ4X8+ArXHAXrAl0ZL9PZrIAmh4M02g9Qk0ePz4e4duj"
      crossorigin="anonymous"
    ></script>

    <!-- JavaScript -->
    <script>
      const sidebarToggle = document.getElementById("sidebar-toggle");
      const sidebar = document.getElementById("sidebar");
      const overlay = document.getElementById("overlay");

      // Open sidebar
      sidebarToggle.addEventListener("click", () => {
        sidebar.style.left = "0";
        overlay.style.display = "block";
      });

      // Close sidebar when clicking overlay
      overlay.addEventListener("click", () => {
        sidebar.style.left = "-250px";
        overlay.style.display = "none";
      });

      // Close sidebar using ESC key
      document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
          sidebar.style.left = "-250px";
          overlay.style.display = "none";
        }
      });
    </script>
  </body>
</html>
