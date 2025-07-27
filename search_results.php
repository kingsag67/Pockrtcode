<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: join.php");
    exit();
}

// Get the search query, lowercase it
$query = isset($_GET['q']) ? trim($_GET['q']) : '';

// Keyword => redirect link (all lowercase keys)
$links = [

    // Direct pages
    "tutorial" => "tutorial.html",
    "tutorials" => "tutorial.html",
    "courses" => "courses.html",
    "course" => "courses.html",
    "contact" => "contact.html",

    // Courses
    "web development" => "student_viewlink.php?type=course&name=Web%20Development&url=https://www.geeksforgeeks.org/web-development/",
    "graphic design" => "student_viewlink.php?type=course&name=Graphic%20Design&url=https://www.skillshare.com/en/browse/graphic-design",
    "mobile app developer" => "student_viewlink.php?type=course&name=Mobile%20App%20Developer&url=https://www.mygreatlearning.com/mobile-app-development/free-courses",
    "data science" => "student_viewlink.php?type=course&name=Data%20Science&url=https://www.geeksforgeeks.org/ai-ml-ds/",
    "artificial intelligence" => "student_viewlink.php?type=course&name=Artificial%20Intelligence&url=https://www.geeksforgeeks.org/ai-ml-ds/",
    "hacking" => "student_viewlink.php?type=course&name=Hacking&url=https://www.mygreatlearning.com/academy/learn-for-free/courses/introduction-to-ethical-hacking",

    // Tutorials
    "html tutorial" => "student_viewlink.php?type=tutorial&name=HTML%20Tutorial&url=https://www.codewithharry.com/tutorial/overview/html-home",
    "css tutorial" => "student_viewlink.php?type=tutorial&name=CSS%20Tutorial&url=https://www.codewithharry.com/tutorial/overview/css-introduction",
    "javascript tutorial" => "student_viewlink.php?type=tutorial&name=JavaScript%20Tutorial&url=https://www.codewithharry.com/tutorial/overview/js",
    "python tutorial" => "student_viewlink.php?type=tutorial&name=Python%20Tutorial&url=https://www.codewithharry.com/tutorial/overview/python",
    "c tutorial" => "student_viewlink.php?type=tutorial&name=C%20Tutorial&url=https://www.codewithharry.com/tutorial/overview/c-overview",
    "react js tutorial" => "student_viewlink.php?type=tutorial&name=React%20JS%20Tutorial&url=https://www.codewithharry.com/tutorial/overview/react-home",
    "java tutorial" => "student_viewlink.php?type=tutorial&name=Java%20Tutorial&url=https://www.codewithharry.com/tutorial/overview/java",
    "c++ tutorial" => "student_viewlink.php?type=tutorial&name=C++%20Tutorial&url=https://www.codewithharry.com/tutorial/overview/cplusplus-overview",
    "php tutorial" => "student_viewlink.php?type=tutorial&name=PHP%20Tutorial&url=https://www.codewithharry.com/tutorial/overview/php-overview"
];

// Try to find a case-insensitive partial match
$matchedLink = '';
foreach ($links as $keyword => $link) {
    if (stripos($keyword, $query) !== false) {  // stripos = case-insensitive strpos
        $matchedLink = $link;
        break;
    }
}

// Redirect or show no result
if ($matchedLink) {
    header("Location: $matchedLink");
    exit();
} else {
    echo "<h3>No result found for '<em>" . htmlspecialchars($query) . "</em>'.</h3>";
    echo "<p>Try again using keywords like: <strong>python tutorial</strong>, <strong>web development</strong>, <strong>hacking</strong>.</p>";
}
?>
s