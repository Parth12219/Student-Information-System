<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Student's Portal Site</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top"style="background-color:black;">
    <script src="js/scripts.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">UniGateway</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">
                <p style="color: white;text-shadow: -1px -1px 0 black, 1px -1px 0 black, -1px  1px 0 black, 1px  1px 0 black;">Welcome to the Student's Portal!</p>
            </div>
            <a class="btn btn-primary btn-xl text-uppercase" href="login.php">Login/Sign-Up</a>
        </div>
    </header>
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
            </div>
            <br><br><br><br>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-university fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Student Dashboard</h4>
                    <p class="text-muted">Track your academic performance, view upcoming classes, and manage assignments.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Resources</h4>
                    <p class="text-muted">Access study materials, e-books, and lecture notes.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Community</h4>
                    <p class="text-muted">Join forums to discuss topics, ask questions, and connect with peers.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-calendar-alt fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Events</h4>
                    <p class="text-muted">Stay informed about upcoming campus events, webinars, and workshops.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-briefcase fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Career Services</h4>
                    <p class="text-muted">Get career guidance, find internships, and browse job listings.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Web Security</h4>
                    <p class="text-muted">Access your data securely.</p>
                </div>
            </div>
        </div>
        <br><br><br><br>
    </section>
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Feedback</h2>
                <h3 class="section-subheading text-muted">Looking Forward to your Feedbacks</h3>
            </div>
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">

                            <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">

                            <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">

                            <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                    </div>
                </div>
    
                <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error sending message!</div>
                </div>
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase enabled" id="submitButton" type="submit">Send Message</button></div>
            </form>
        </div>
    </section>
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; UniGateway 2024</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer> 
</body>

</html>