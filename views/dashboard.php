<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Students</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f9f9f9; display: flex; flex-direction: column; min-height: 100vh;">
    <header style="background-color: #0d222f; padding: 15px;">
        <div style="display: flex; justify-content: space-between; align-items: center; color: white;">
            <div style="display: flex; align-items: center;">
                <button style="background: none; border: none; color: white; font-size: 1.5rem; margin-right: 15px; cursor: pointer;">
                    <i class="fas fa-bars"></i>
                </button>
                <img src="logo.png" alt="School Logo" style="height: 50px; margin-right: 15px;" />
                <h1 style="margin: 0; font-size: 1.25rem;">Great School</h1>
            </div>
            <nav>
                <ul style="list-style: none; display: flex; margin: 0; padding: 0;">
                    <li style="margin: 0 15px;"><a href="index.html" style="color: white; text-decoration: none; font-weight: bold;">Home</a></li>
                    <li style="margin: 0 15px;"><a href="about.html" style="color: white; text-decoration: none; font-weight: bold;">About</a></li>
                    <li style="margin: 0 15px;"><a href="admissions.html" style="color: white; text-decoration: none; font-weight: bold;">Admissions</a></li>
                    <li style="margin: 0 15px;"><a href="contact.html" style="color: white; text-decoration: none; font-weight: bold;">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main style="flex: 1; padding: 20px;">
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h3 style="font-size: 1.5rem; margin-bottom: 20px; color: #333; border-bottom: 2px solid #ddd; padding-bottom: 10px;">My Students</h3>
            <div>
                <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                    <div style="flex: 1;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">School Year</label>
                        <select style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; background: #f8f8f8;">
                            <option></option>
                            <option>2023-2024</option>
                            <option>2024-2025</option>
                        </select>
                    </div>
                    <div style="flex: 1;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Grade</label>
                        <select style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; background: #f8f8f8;">
                            <option></option>
                            <option>Grade 1</option>
                            <option>Grade 2</option>
                        </select>
                    </div>
                    <div style="flex: 1;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Subject</label>
                        <select style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; background: #f8f8f8;">
                            <option></option>
                            <option>Mathematics</option>
                            <option>Science</option>
                        </select>
                    </div>
                </div>
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr style="background: #f1f1f1;">
                            <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">#</th>
                            <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">First Name</th>
                            <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Middle Name</th>
                            <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Last Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 12px; border: 1px solid #ddd;">1</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">Deniecia</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">Richard</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">Baldie</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer style="background-color: #0d222f; color: white; text-align: center; padding: 15px; margin-top: auto;">
        <p style="margin: 0;">&copy; 2024 Great School Systems. All Rights Reserved.</p>
    </footer>
</body>
</html>
