# PHP Unit Converter
Unit Converter using HTML, CSS and PHP

# Introduction
The Unit Converter is a web application designed to provide users with a simple and efficient way to convert values between different measurement units. Unlike static tables, this tool performs real-time mathematical calculations on the server side to provide precise results for Length, Weight, and Temperature.

# Problem Statement
Manual conversion of units is prone to human error, especially in complex units like Temperature (Celsius to Fahrenheit), which involves specific mathematical offsets. There is a need for a centralized, digital tool that ensures accuracy and speed for students and professionals.

# Objectives
To develop a user-friendly interface using HTML and CSS.
To implement server-side logic using PHP for accurate mathematical processing.
To demonstrate the Client-Server Architecture and the use of Global Variables ($_POST).
5. Technical Specifications
Frontend: HTML5 (Structure), CSS3 (Styling).
Backend: PHP (Logic and Calculations).
Tools used: XAMPP/PHP Server (Local Environment).

# System Design & Methodology
The system follows a three-step process:
Input Phase: User enters a numeric value and selects the desired conversion category from a dropdown menu.
Processing Phase (Backend): * The data is sent to the server via the HTTP POST method.
A switch-case structure in PHP identifies the selected conversion.
The corresponding mathematical formula is applied to the input variable.
Output Phase: The calculated result is rounded to four decimal places and echoed back to the user's screen.

# Core Formulas Used
Length: km = m / 1000
Weight: lb = kg X 2.20462
Temperature: F = (C X 9/5) + 32

# Conclusion
This project successfully demonstrates the integration of frontend and backend technologies. By using PHP, the application ensures that the logic is hidden from the user, providing a secure and reliable way to perform everyday mathematical conversions.

