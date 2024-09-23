<?php      

session_start();
$isLoggedIn = false;
$username = "";                 
                                    

if (isset($_SESSION['id'])) {
    $isLoggedIn = true;
    if (isset($_SESSION['name'])) {
        $username = $_SESSION['name'];              // [MD. Ashraful Islam Talukdar]
    }
}


if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}


$servername = "localhost";
$db_username = "root";
$password = "";
$database = "aksdesign";


// Create connection [MD. Ashraful Islam Talukdar]
$conn = new mysqli($servername, $db_username, $password, $database);




function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name_err = $address_err = $contact_number_err = $details_err = "";                 // [MD. Ashraful Islam Talukdar]

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate and sanitize form inputs [MD. Ashraful Islam Talukdar]
    $name = !empty($_POST["Name"]) ? sanitize_input($_POST["Name"]) : $name_err = "Name is required";
    $address = !empty($_POST["Address"]) ? sanitize_input($_POST["Address"]) : $address_err = "Address is required";
    $contact_number = !empty($_POST["contact_number"]) ? sanitize_input($_POST["contact_number"]) : $contact_number_err = "Contact number is required";
    $package_name = !empty($_POST["package_name"]) ? sanitize_input($_POST["package_name"]) : "Unknown Package";
    $details = !empty($_POST["Details"]) ? sanitize_input($_POST["Details"]) : $details_err = "Details are required";

    // Check for any input errors [MD. Ashraful Islam Talukdar]
    if (empty($name_err) && empty($address_err) && empty($contact_number_err) && empty($details_err)) {
        $sql = "INSERT INTO orders (name, address, contact_number, package_name, details) VALUES ('$name', '$address', '$contact_number', '$package_name', '$details')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to prevent form resubmission [MD. Ashraful Islam Talukdar]
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {                                                                          // [MD. Ashraful Islam Talukdar]
        if (!empty($name_err)) {
            echo "<script>alert('Error: $name_err');</script>";
        }
        if (!empty($address_err)) {
            echo "<script>alert('Error: $address_err');</script>";
        }
        if (!empty($contact_number_err)) {
            echo "<script>alert('Error: $contact_number_err');</script>";
        }
        if (!empty($details_err)) {
            echo "<script>alert('Error: $details_err');</script>";
        }
    }
 
    // Close connection [MD. Ashraful Islam Talukdar]
    $conn->close();
}
?>





<!DOCTYPE html>     
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">                <!-- [MD. Ashraful Islam Talukdar] -->
    <title>AKS Design</title>
    <link rel="favicon icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="css/default.css">      
    <link rel="stylesheet" href="css/landingPageStyle.css">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">                                                                                                              <!-- [MD. Ashraful Islam Talukdar] -->
</head>
<body>
    <!-- Home Section Start [MD. Ashraful Islam Talukdar] -->
    <section id="contact" class="contact-area pt-0 pb-130 gray-bg">
    <div class="navigation-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="images/logo.png" alt="Logo">          <!-- [MD. Ashraful Islam Talukdar] -->
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">                                              <!-- [MD. Ashraful Islam Talukdar] -->
                                <ul id="nav" class="navbar-nav ml-auto pl-125">
                                    <li class="nav-item">
                                        <a class="page-scroll" href="landingpage.php#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="landingpage.php#about">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="landingpage.php#service">Service</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="landingpage.php#project">Projects</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="landingpage.php#packages">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="landingpage.php#team">Our Team</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="navbar-btn d-flex align-items-center">
                                <?php if ($isLoggedIn): ?>
                                    <span class="navbar-text mr-2"
                                        style="background-color: rgba(255, 255, 255, 0.1); padding: 5px; border-radius: 5px; margin-right: 10px; color: white;"><?php echo htmlspecialchars($username); ?></span>                                               <!-- [MD. Ashraful Islam Talukdar] -->
                                    <!-- If logged in, display logout button [MD. Ashraful Islam Talukdar] -->
                                    <form method="post" class="d-flex">
                                        <button type="submit" name="logout" class="main-btn">Logout</button>
                                    </form>
                                <?php else: ?>
                                    <!-- If not logged in, displaying Login/Registration button [MD. Ashraful Islam Talukdar] -->
                                    <form class="d-flex">
                                        <button class="main-btn" type="button"
                                            onclick="redirectToIndex()">Registration</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </nav>
                    </div>
                </div> <!-- [MD. Ashraful Islam Talukdar] -->
            </div>
        </div>
        <div>
            <img src="images/about/about-3.jpg">
            <h3 class="about-title mt-90 ml-70 mr-70">WHY CHOOSE US</h3>
            <p class="mt-30 ml-70 mr-70">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p> 
            <p class="mt-10 ml-70 mr-70">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>                                            
        </div>
    </section>

    <!-- Home Section End [MD. Ashraful Islam Talukdar] -->
       




        <!-- Contact Us Section Start [MD. Ashraful Islam Talukdar] -->

        <section id="contact" class="contact-area pt-40 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h5 class="sub-title mb-15">Contact Us</h5>
                        <h2 class="title">Get In Touch</h2>
                    </div>
                </div><!-- [MD. Ashraful Islam Talukdar] -->
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form-unique123">
                        <form id="contact-form" onsubmit="sendMail(event)">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-single-form-unique123 contact-form-group-unique123">
                                        <input type="text" id="name" name="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-single-form-unique123 contact-form-group-unique123">
                                        <input type="email" id="email" name="email" placeholder="Your Email">                                                                                                   <!-- [MD. Ashraful Islam Talukdar] -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-single-form-unique123 contact-form-group-unique123">
                                        <input type="text" id="subject" name="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-single-form-unique123 contact-form-group-unique123">
                                        <input type="text" id="phone" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-single-form-unique123 contact-form-group-unique123">
                                        <textarea id="message" placeholder="Your Message" name="message"></textarea>
                                    </div>
                                </div>
                                <p class="contact-form-message-unique123"></p>
                                <div class="col-md-12">
                                    <div class="contact-single-form-unique123 contact-form-group-unique123 text-center">                                                                <!-- [MD. Ashraful Islam Talukdar] -->
                                        <button type="submit" class="main-btn">Send Mail</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>      <!-- [MD. Ashraful Islam Talukdar] -->
                </div>
            </div>
        </div>
    </section>

    <script>
        function sendMail(event) {
            event.preventDefault();


            var name = encodeURIComponent(document.getElementById('name').value || 'No name provided');
            var email = encodeURIComponent(document.getElementById('email').value || 'No email provided');
            var subject = encodeURIComponent(document.getElementById('subject').value || 'No subject provided');
            var phone = encodeURIComponent(document.getElementById('phone').value || 'No phone provided');
            var message = encodeURIComponent(document.getElementById('message').value || 'No message provided');

            // Construct Gmail link [MD. Ashraful Islam Talukdar]
            var gmailLink = `https://mail.google.com/mail/?view=cm&fs=1&to=${email}&su=${subject}&body=Name:%20${name}%0D%0APhone:%20${phone}%0D%0AMessage:%20${message}`;


            window.open(gmailLink, '_blank');
        }
    </script>

    <!-- Contact Us Section End [MD. Ashraful Islam Talukdar] -->





    <!-- FAQ Section Start [MD. Ashraful Islam Talukdar] -->

    <section id="faq" class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-item">
            <button class="faq-question" onclick="toggleFAQ(this)">Why Us?</button>
            <div class="faq-answer">
                <p>We offer the best services at the most competitive prices, ensuring customer satisfaction.</p>                                       <!-- [MD. Ashraful Islam Talukdar] -->
            </div>
        </div> <!-- [MD. Ashraful Islam Talukdar] -->

        <div class="faq-item">
            <button class="faq-question" onclick="toggleFAQ(this)">Where is the Office?</button>
            <div class="faq-answer">
                <p>Our office is located at 12/3 Ambarkhana, Sylhet Sadar, Bangladesh</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question" onclick="toggleFAQ(this)">How to do booking?</button>
            <div class="faq-answer">
                <p>You can book our services through our website Packages section and after that our admin will contact                                                                                                                             <!-- [MD. Ashraful Islam Talukdar] -->
                    with you</p>
            </div>
        </div>
    </section>

    <script>
        function toggleFAQ(element) {
            const answer = element.nextElementSibling;
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        }
    </script>

    <!-- FAQ Section End [MD. Ashraful Islam Talukdar] -->





    <!-- Footer Section Start [MD. Ashraful Islam Talukdar] -->

    <footer id="footer" class="footer-area">
        <div class="footer-widget pt-80 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-8">
                        <div class="footer-logo mt-50">
                            <a href="#">
                                <img src="images/logo.png">
                            </a>
                            <ul class="footer-info">
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>Phone: +880 0000 000 000</p>             <!-- [MD. Ashraful Islam Talukdar] -->                                                                                                                                                                                                      <!-- [MD. Ashraful Islam Talukdar] -->
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>Email: aks@gmail.com</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>Location: Bangladesh</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>       <!-- [MD. Ashraful Islam Talukdar] -->

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">Essential</h4>
                            </div>
                            <ul class="mt-15">
                                <li><a href="#about">About Us</a></li>
                                <li><a href="#project">Project Blogs</a></li>
                                <li><a href="#packages">Packages</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">Services</h4>
                            </div>
                            <ul class="mt-15">
                                <li><a href="#project">Product Design</a></li>      <!-- [MD. Ashraful Islam Talukdar] -->
                                <li><a href="#team">Research Team</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">Contact Us</h4>
                            </div>
                            <ul class="footer-social mt-20">
                                <li><a href="https://www.behance.net/ashraful_215"><i class="fa-brands fa-behance"></i></a></li>
                                <li><a href="https://dribbble.com/ashraful_215"><i class="fa-solid fa-basketball"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/md-ashraful-islam-talukdar-59370a1a9/"><i class="fab fa-linkedin"></i></a></li>                                                                                                                                            <!-- [MD. Ashraful Islam Talukdar] -->
                                <li><a href="https://www.instagram.com/ashraful_215"><i class="fa-brands fa-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p>© Copyright, AKS Design 2024. All rights reserved. <a href="https://github.com/ashraful-215">Please Click Here</a></p>                                                                                                <!-- [MD. Ashraful Islam Talukdar] -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Section End [MD. Ashraful Islam Talukdar] -->

</body>
</html>