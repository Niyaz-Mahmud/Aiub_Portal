<?php

// Include necessary files
include '../../Model/Registrar/registrar_add_course_model.php';
session_start();

// Define current page
$currentPage = "registrar_course_management";

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['users_id']);
}

// Logout functionality
if (isset($_GET['logout'])) {
    // Clear session data
    $_SESSION = array();
    session_destroy();
    
    // Redirect to login page
    header("Location: ../login_controller.php");
    exit;
}

// Redirect to login if user is not logged in
if (!isLoggedIn()) {
    header("Location: ../login_controller.php");
    exit;
}

// Get user ID from session
$userId = isset($_GET['users_id']) ? $_GET['users_id'] : '';

// Welcome message
$welcomeMessage = (isset($userId)) ? "Welcome, " . htmlentities(fetchNameFromDatabase($userId)) : "Welcome";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $section = $_POST['section'];
    $capacity = $_POST['capacity'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $status = $_POST['status'];
    $weekday = $_POST['weekday'];

    // Check if course is available
    if (isCourseAvailable($course_name, $section)) {
        $error = "Course already exists!";
    } else {
        // Add course to database
        addCourseToDatabase($course_name, $section, $capacity, $start_time, $end_time, $status, $weekday);
        $message = "Course added successfully!";
    }
}

    // List of available courses and sections
    $courses = [
        "DIFFERENTIAL CALCULUS & CO-ORDINATE GEOMETRY",
        "PHYSICS 1",
        "PHYSICS 1 LAB",
        "ENGLISH READING SKILLS & PUBLIC SPEAKING",
        "INTRODUCTION TO COMPUTER STUDIES",
        "INTRODUCTION TO PROGRAMMING LAB",
        "INTRODUCTION TO PROGRAMMING",
        "DISCRETE MATHEMATICS",
        "INTEGRAL CALCULUS & ORDINARY DIFFERENTIAL EQUATIONS",
        "OBJECT ORIENTED PROGRAMMING 1",
        "PHYSICS 2",
        "PHYSICS 2 LAB",
        "ENGLISH WRITING SKILLS & COMMUNICATIONS",
        "INTRODUCTION TO ELECTRICAL CIRCUITS",
        "INTRODUCTION TO ELECTRICAL CIRCUITS LAB",
        "CHEMISTRY",
        "COMPLEX VARIABLE,LAPLACE & Z-TRANSFORMATION",
        "INTRODUCTION TO DATABASE",
        "ELECTRONIC DEVICES LAB",
        "PRINCIPLES OF ACCOUNTING",
        "ELECTRONIC DEVICES",
        "DATA STRUCTURE",
        "DATA STRUCTURE LAB",
        "COMPUTER AIDED DESIGN & DRAFTING",
        "ALGORITHMS",
        "MATRICES, VECTORS, FOURIER ANALYSIS",
        "OBJECT ORIENTED PROGRAMMING 2",
        "OBJECT ORIENTED ANALYSIS AND DESIGN",
        "BANGLADESH STUDIES",
        "DIGITAL LOGIC AND CIRCUITS",
        "DIGITAL LOGIC AND CIRCUITS LAB",
        "COMPUTATIONAL STATISTICS AND PROBABILITY",
        "THEORY OF COMPUTATION",
        "PRINCIPLES OF ECONOMICS",
        "BUSINESS COMMUNICATION",
        "NUMERICAL METHODS FOR SCIENCE AND ENGINEERING",
        "DATA COMMUNICATION",
        "MICROPROCESSOR AND EMBEDDED SYSTEMS",
        "SOFTWARE ENGINEERING",
        "ARTIFICIAL INTELLIGENCE AND EXPERT SYSTEM",
        "COMPUTER NETWORKS",
        "COMPUTER ORGANIZATION AND ARCHITECTURE",
        "OPERATING SYSTEM",
        "WEB TECHNOLOGIES",
        "ENGINEERING ETHICS",
        "COMPILER DESIGN",
        "COMPUTER GRAPHICS",
        "ENGINEERING MANAGEMENT",
        "RESEARCH METHODOLOGY",
        "ADVANCE DATABASE MANAGEMENT SYSTEM",
        "MANAGEMENT INFORMATION SYSTEM",
        "ENTERPRISE RESOURCE PLANNING",
        "DATA WAREHOUSE AND DATA MINING",
        "HUMAN COMPUTER INTERACTION",
        "BUSINESS INTELLIGENCE AND DECISION SUPPORT SYSTEMS",
        "INTRODUCTION TO DATA SCIENCE",
        "CYBER LAWS & INFORMATION SECURITY",
        "DIGITAL MARKETING",
        "E-COMMERCE, E-GOVERNANCE & E-SERIES",
        "SOFTWARE DEVELOPMENT PROJECT MANAGEMENT",
        "SOFTWARE REQUIREMENT ENGINEERING",
        "SOFTWARE QUALITY AND TESTING",
        "PROGRAMMING IN PYTHON",
        "VIRTUAL REALITY SYSTEMS DESIGN",
        "ADVANCED PROGRAMMING WITH JAVA",
        "ADVANCED PROGRAMMING WITH .NET",
        "ADVANCED PROGRAMMING IN WEB TECHNOLOGY",
        "MOBILE APPLICATION DEVELOPMENT",
        "SOFTWARE ARCHITECTURE AND DESIGN PATTERNS",
        "COMPUTER SCIENCE MATHEMATICS",
        "BASIC GRAPH THEORY",
        "ADVANCED ALGORITHM TECHNIQUES",
        "NATURAL LANGUAGE PROCESSING",
        "LINEAR PROGRAMMING",
        "PARALLEL COMPUTING",
        "MACHINE LEARNING",
        "BASIC MECHANICAL ENGG.",
        "DIGITAL SIGNAL PROCESSING",
        "VLSI CIRCUIT DESIGN",
        "SIGNALS & LINEAR SYSTEM",
        "DIGITAL SYSTEM DESIGN",
        "IMAGE PROCESSING",
        "MULTIMEDIA SYSTEMS",
        "SIMULATION & MODELING",
        "ADVANCED COMPUTER NETWORKS",
        "COMPUTER VISION AND PATTERN RECOGNITION",
        "NETWORK SECURITY",
        "ADVANCED OPERATING SYSTEM",
        "DIGITAL DESIGN WITH SYSTEM [ VERILOG,VHDL & FPGAS ]",
        "ROBOTICS ENGINEERING",
        "TELECOMMUNICATIONS ENGINEERING",
        "NETWORK RESOURCE MANAGEMENT & ORGANIZATION",
        "WIRELESS SENSOR NETWORKS",
        "INDUSTRIAL ELECTRONICS, DRIVES & INSTRUMENTATION"
    ];

    $sections = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];

    $course_name = "List of Courses: " . implode(", ", $courses);
    echo '<title>' . $course_name . '</title>';

    // Include view file
    include '../../View/Registrar/registrar_add_course_view.php';

    ?>