<?php

// Choose language
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'nl'])) {
    $language = $_GET['lang'];

    // Remember the selected language
    setcookie('language', $language, time() + (365 * 24 * 60 * 60), '/');
} elseif (isset($_COOKIE['language']) && in_array($_COOKIE['language'], ['en', 'nl'])) {
    $language = $_COOKIE['language'];
} else {
    $language = 'en';
}

// Load language file
$text = require __DIR__ . '/language/' . $language . '.php';

?>

<?php

require_once 'projects-data.php';

$projectsDirectory = __DIR__ . '/school-projects';

$featuredProjects = [];

$ignoredFolders = [
    '.',
    '..',
    '.vscode',
    '.git'
];

function getFeaturedProjectImage($folderPath, $folderName)
{
    $extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    foreach ($extensions as $extension) {

        $images = glob(
            $folderPath . '/*.' . $extension,
            GLOB_NOSORT
        );

        if ($images) {

            $imageName = basename($images[0]);

            return 'school-projects/' .
                rawurlencode($folderName) .
                '/' .
                rawurlencode($imageName);
        }
    }

    return '';
}

function getFeaturedProjectTitle($folder)
{
    $folder = str_replace(
        ['-', '_'],
        ' ',
        $folder
    );

    return ucwords($folder);
}

if (is_dir($projectsDirectory)) {

    foreach (scandir($projectsDirectory) as $folder) {

        if (in_array($folder, $ignoredFolders, true)) {
            continue;
        }

        $folderPath =
            $projectsDirectory . '/' . $folder;

        if (!is_dir($folderPath)) {
            continue;
        }

        $data = $projectData[$folder] ?? [];

        if (($data['featured'] ?? false) !== true) {
            continue;
        }

        $featuredProjects[] = [

            'folder' => $folder,

            'title' =>
                $data['title']
                ?? getFeaturedProjectTitle($folder),

            'description' =>
                $data['description']
                ?? 'A project created during my Software Development studies.',

            'image' =>
                getFeaturedProjectImage(
                    $folderPath,
                    $folder
                ),

            'link' =>
                'project-details.php?project=' .
                rawurlencode($folder)

        ];
    }
}

// Maximum 3 projecten op de homepage
$featuredProjects = array_slice(
    $featuredProjects,
    0,
    3
);

?>

<!DOCTYPE html>
<html lang="<?= $language ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Welcome to Its_Mo-Portfolio</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/png" href="images/portredlogo.png">
    <script src="https://kit.fontawesome.com/122bf57c0b.js" crossorigin="anonymous"></script>

</head>
<body>
    <div id="construction-popup">
        <div class="construction-popup-content">

            <button class="construction-close" onclick="closeConstructionPopup()">
                &times;
            </button>

            <div class="construction-icon">
                🚧
            </div>

            <h2>Portfolio Under Construction</h2>

            <p>
                I'm currently working on my portfolio and adding new projects.
                Some parts of the website may still be incomplete.
            </p>

            <button class="construction-btn" onclick="closeConstructionPopup()">
                Continue to website
            </button>

        </div>
    </div>
    <div id="header">
        <div class="container">
            <nav>
                <img href='index.php' src="images/portlogor.png" class="logo">
                <ul id="sidemenu">
                    <i class="fa-solid fa-xmark" onclick="closeMenu()"></i>
                    <li><a href="#home"><?= $text['home'] ?></a></li>
                    <li><a href="#about"><?= $text['about'] ?></a></li>
                    <li><a href="#services"><?= $text['services'] ?></a></li>
                    <li><a href="#portfolio"><?= $text['portfolio'] ?></a></li>
                    <li><a href="#contact"><?= $text['contact'] ?></a></li>

                    <li class="language-switcher">
                        <a href="?lang=en">  EN  </a>
                        <span>|</span>
                        <a href="?lang=nl">  NL  </a>
                    </li>
                </ul>
                <i class="fa-solid fa-bars" onclick="openMenu()"></i>
            </nav>
            <!------------------------------- Begin Home Section ------------------------------->
            <div class="header-text">
                <h1>Make Your Business Grow Faster</h1>
                <h3>I'm <span class="red">Muhammad</span></h3>
                <h3>From <span>The Netherlands</span></h3>
                <p>And I'm A Web Developer</p>
                <div class="social-icons">
                    <a href="https://github.com/Lucky-Mo"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.instagram.com/mootje_othman"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/muhammad-alothman-2155252b0"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
             <!-- End Home Section -->

             <!------------------------------- Begin About Section ------------------------------->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="images/portimg.png">
                </div>
                <div class="about-col-2">
                    <h1 class="sub-title"><?= $text['about_me'] ?></h1>
                    <p>Hi, I’m Muhammad, a Software Developer based in the Netherlands. I’m currently studying Software Development at Vista College Maastricht, where I’m building my skills in web development and learning how to turn ideas into functional, user-friendly websites and applications.

I mainly work with HTML, CSS, JavaScript, PHP, and Python, with a particular interest in backend development and creating systems that work smoothly behind the scenes. I enjoy working on projects where I can combine problem-solving, creativity, and technology to build something useful.

Outside of school and programming, I enjoy playing football, gaming, and exploring new technologies. I’m always looking to improve my skills, learn new tools, and challenge myself with new projects.</p>
                    <div class="tab-titles">
                        <p class="tab-links active-link" onclick="opentab('skills')">Skills</p>
                        <p class="tab-links" onclick="opentab('experience')">Experience</p>
                        <p class="tab-links" onclick="opentab('education')">Education</p>
                    </div>

                    <div class="tab-contents active-tab" id="skills">
                        <ul>
                            <li><span>Web Development </span>Developing personal and school projects using modern web technologies</li>
                            <li><span>Backend Development </span>Creating functional systems, databases, and server-side features</li>
                            <li><span>Teamwork </span>Collaborating on projects and taking responsibility for assigned tasks</li>
                        </ul>
                    </div>

                    <div class="tab-contents" id="experience">
                        <ul>
                            <li>
                                <span>Current</span><br>
                                Experienced in frontend development using HTML and CSS. Currently expanding my skills in PHP and JavaScript while developing my knowledge of backend development.
                            </li>
                            <li>
                                <span>2026 - 2027</span><br>
                                Web Development Internship — Gaining practical experience in web development and applying my programming skills in a professional environment.
                            </li>
                            <li>
                                <span>2024 - 2028</span><br>
                                Software Development — Vista College Maastricht, Netherlands
                                Studying Software Development with a focus on web development, programming, and building practical software projects. 
                            </li>
                        </ul>
                    </div>
                    
                    <div class="tab-contents" id="education">
                        <ul>
                            <li>
                                <span>2026 - 2027</span><br>
                                Web Development Internship.
                            </li>
                            <li>
                                <span>2024 - 2028</span><br>
                                Studied Software Development at Vista-College Maastricht in The Netherlands. 
                            </li>
                            <li>
                                <span>2019 - 2024</span><br>
                                Studied at Graaf Huyn College in The Netherlands.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- End About Section -->

        <!------------------------------- Begin Services Section ------------------------------->
        <div id="services">
            <div class="container">
                <h1 class="sub-title"><?= $text['my_services'] ?></h1>
                <div class="services-list">
                    <div>
                        <i class="fa-solid fa-code iconred"></i>
                        <h2>Web Development</h2>
                        <p>Specializing in creating responsive and user-friendly websites using modern web technologies.</p>
                        <a href="projects.php">Learn More</a>
                    </div>

                    <div>
                        <i class="fa-solid fa-palette iconred"></i>
                        <h2>Web Design</h2>
                        <p>Creating visually appealing and intuitive user interfaces for websites and applications.</p>
                        <a href="projects.php">Learn More</a>
                    </div>

                    <div>
                        <i class="fa-brands fa-app-store iconred"></i>
                        <h2>App Development</h2>
                        <p>Developing cross-platform mobile applications with a focus on user experience and performance.</p>
                        <a href="projects.php">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- End Services Section -->

           <!------------------------------- Begin Portfolio Section ------------------------------->

<div id="portfolio">

    <div class="container">

        <h1 class="sub-title"><?= $text['my_projects'] ?></h1>

        <div class="work-list">

            <?php foreach ($featuredProjects as $project): ?>

                <div class="work">

                    <?php if ($project['image']): ?>

                        <img
                            src="<?= htmlspecialchars($project['image']) ?>"
                            alt="<?= htmlspecialchars($project['title']) ?>"
                        >

                    <?php endif; ?>

                    <div class="layer">

                        <h3>
                            <?= htmlspecialchars($project['title']) ?>
                        </h3>

                        <p>
                            <?= htmlspecialchars($project['description']) ?>
                        </p>

                        <a
                            href="<?= htmlspecialchars($project['link']) ?>"
                        >
                            <i class="fa-solid fa-up-right-from-square"></i>
                        </a>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <a href="projects.php" class="btn"><?= $text['all_projects'] ?></a>

    </div>

</div>

<!------------------------------- End Portfolio Section ------------------------------->

        <!------------------------------- Begin Contact Section ------------------------------->
        <div id="contact">
            <div class="container">
                <div class="row">
                    <div class="contact-left">
                        <h1 class="sub-title"><?= $text['contact_me'] ?></h1>
                        <p> <i class="fa-solid fa-paper-plane"></i>mdothman06@outlook.com</p>
                        <p><i class="fa-solid fa-phone"></i>+31 684603180</p>
                        <div class="social-icons">
                            <a href="https://github.com/Lucky-Mo"><i class="fa-brands fa-github"></i></a>
                            <a href="https://www.facebook.com/mohammad.othman.06/"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.instagram.com/mootje_othman"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/muhammad-alothman-2155252b0"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                        <a href="images/MyCV.pdf" download class="btn btn2">Download CV</a>
                    </div>
                    <div class="contact-right">
                        <form>
                            <input type="text" name="Name" placeholder="Your Name" required>
                            <input type="email" name="email" placeholder="Your Email" required>
                            <textarea name="Message" rows="6" placeholder="Your Message"></textarea>
                            <button type="submit" class="btn btn2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>Copyright ©. Made with <i class="fa-solid fa-heart"></i> by Muhammad Alothman</p>
            </div>
        </div>

        

        <!------------------------------- Begin JavaScript -----------------------------
         this is for the tab functionality of the tabs (skills, Experience, Education) -->
        <script>

            var tablinks = document.getElementsByClassName("tab-links");
            var tabcontents = document.getElementsByClassName("tab-contents");

            function opentab(tabname){
                for(tablink of tablinks){
                    tablink.classList.remove("active-link");
                }
                
                for(tabcontent of tabcontents){
                    tabcontent.classList.remove("active-tab");
                }
                
                event.currentTarget.classList.add("active-link");
                document.getElementById(tabname).classList.add("active-tab");
            }
        </script>

        <script>
            var sideMenu = document.getElementById("sidemenu");

            function openMenu(){
                sideMenu.style.right = "0";
            }

            function closeMenu(){
                sideMenu.style.right = "-200px";
            }
        </script>

        <script>
            function closeConstructionPopup() {
                document.getElementById("construction-popup").style.display = "none";
            }
        </script>
</body>
</html>









<!-- Begin Services Section 
        <div id="services">
            <div class="container">
                <h1 class="sub-title">My Services</h1>
                <div class="row">
                    <div class="service-col">
                        <h3>Web Development</h3>
                        <p>Creating responsive and functional websites.</p>
                    </div>
                    <div class="service-col">
                        <h3>App Development</h3>
                        <p>Building user-friendly mobile applications.</p>
                    </div>
                    <div class="service-col">
                        <h3>UI/UX Design</h3>
                        <p>Designing intuitive interfaces for better user experience.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Services Section -->

        <!-- Begin Portfolio Section 
        <div id="portfolio">
            <div class="container">
            <h1 class="sub-title">My Portfolio</h1>
            <div class="row">
                <div class="portfolio-col">
                <img src="images/project1.png" alt="Project 1">
                <h3>Project Title 1</h3>
                <p>Brief description of the project.</p>
                </div>
                <div class="portfolio-col">
                <img src="images/project2.png" alt="Project 2">
                <h3>Project Title 2</h3>
                <p>Brief description of the project.</p>
                </div>
                <div class="portfolio-col">
                <img src="images/project3.png" alt="Project 3">
                <h3>Project Title 3</h3>
                <p>Brief description of the project.</p>
                </div>
            </div>
            </div>
        </div>
        <!-- End Portfolio Section -->

        <!-- Begin Contact Section 
        <div id="contact">
            <div class="container">
            <h1 class="sub-title">Contact Me</h1>
            <form action="send_message.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
            </div>
        </div>
        <!-- End Contact Section -->






<!-- 
 <div class="home-content" data-sr-id="0" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 2s cubic-bezier(0.5, 0, 0, 1) 0.2s, transform 2s cubic-bezier(0.5, 0, 0, 1) 0.2s;">
                    <h3>Hello,It's Me</h3>
                    <h1 data-sr-id="15" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 2s cubic-bezier(0.5, 0, 0, 1) 0.2s, transform 2s cubic-bezier(0.5, 0, 0, 1) 0.2s;">Muhammad Alothman</h1>
                    <h3>And I'm a <span class="multiple-text">Web Developer</span><span class="typed-cursor" aria-hidden="true">|</span></h3>
                    <div class="social-media">
                        <a href="https://github.com/Lucky-Mo"><i class="bx bxl-github"></i></a>
                        <a href="https://www.facebook.com/mohammad.othman.06/"><i class="bx bxl-facebook"></i></a>
                        <a href="https://www.instagram.com/mootje_othman"><i class="bx bxl-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/muhammad-alothman-2155252b0"><i class="bx bxl-linkedin"></i></a>
                    </div>
                    <a href="#" class="btn">Download My CV</a>
                </div>
 -->