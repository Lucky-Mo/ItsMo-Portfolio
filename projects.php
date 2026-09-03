<?php

require_once 'projects-data.php';

$projectsDirectory = __DIR__ . '/school-projects';

$projects = [];

$ignoredFolders = [
    '.',
    '..',
    '.vscode',
    '.git'
];

function getProjectImage($folderPath, $folderName)
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

function getProjectTitle($folder)
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

        $folderPath = $projectsDirectory . '/' . $folder;

        if (!is_dir($folderPath)) {
            continue;
        }

        $image = getProjectImage(
            $folderPath,
            $folder
        );

        $data = $projectData[$folder] ?? [];

        $projects[] = [

            'folder' => $folder,

            'title' =>
                $data['title']
                ?? getProjectTitle($folder),

            'description' =>
                $data['description']
                ?? 'A project created during my Software Development studies.',

            'category' =>
                $data['category']
                ?? 'Web Development',

            'technologies' =>
                $data['technologies']
                ?? [],

            'image' => $image,

            'link' =>
                'project-details.php?project=' .
                rawurlencode($folder),

            'featured' =>
                $data['featured']
                ?? false

        ];
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>
<div id="header">
        <div class="container">
            <nav>
                <img href='index.php' src="images/portlogor.png" class="logo">
                <ul id="sidemenu">
                    <i class="fa-solid fa-xmark" onclick="closeMenu()"></i>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#services">Services</a></li>
                    <li><a href="index.php#portfolio">Portfolio</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
                <i class="fa-solid fa-bars" onclick="openMenu()"></i>
            </nav>
<title>My Projects</title>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {

    font-family:
        'Segoe UI',
        Tahoma,
        Geneva,
        Verdana,
        sans-serif;

    background: #000000;

    color: #ff0014;
}

/* Begin header */
#header{
    width: 100%;
    height: 100vh;
    background-image: url(../images/portimg.png);
    background-size: contain;
    background-position: right;
    background-repeat: no-repeat;
}

.logo{
    cursor: pointer;
    width: 140px;
}

.container{
    padding: 10px 10%;
}

nav{
    background-color: rgb(0, 0, 0);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

nav ul li{
    display: inline-block;
    list-style: none;
    margin: 10px 20px;
}

nav ul li a{
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    position: relative;
}

nav ul li a::after{
    content: '';
    width: 0;
    height: 3px;
    background: #ff0014;
    position: absolute;
    left: 0;
    bottom: -6px;
    transition: 0.5s;
}

nav ul li a:hover::after{
    width: 100%;
}
/* End header */


/* CONTAINER */

.container {

    max-width: 1200px;

    margin: auto;

    padding:
        60px 20px;
}


/* HEADER */

.projects-header {

    text-align: center;

    margin-bottom: 40px;
}

.projects-header h1 {

    font-size: 42px;

    margin-bottom: 10px;
}

.projects-header p {

    color: #7c7c7c;

    font-size: 16px;
}


/* SEARCH */

.search-box {

    display: flex;

    justify-content: center;

    margin-bottom: 25px;
}

.search-box input {

    width: 100%;

    max-width: 500px;

    padding: 14px 18px;

    border: 1px solid #ddd;

    border-radius: 10px;

    font-size: 15px;

    outline: none;

    transition: 0.2s;
}

.search-box input:focus {

    border-color: #ff0000;

    box-shadow:
        0 0 0 3px
        rgba(0,123,255,0.1);
}


/* FILTERS */

.filters {

    display: flex;

    justify-content: center;

    flex-wrap: wrap;

    gap: 10px;

    margin-bottom: 40px;
}

.filter-btn {

    border: none;

    padding: 9px 16px;

    border-radius: 20px;

    background: #e5e5e5;

    color: #333;

    cursor: pointer;

    transition: 0.2s;
}

.filter-btn:hover {

    background: #d5d5d5;
}

.filter-btn.active {

    background: #ff0000;

    color: white;
}


/* GRID */

.projects-grid {

    display: grid;

    grid-template-columns:
        repeat(
            auto-fit,
            minmax(300px, 1fr)
        );

    gap: 25px;
}


/* CARD */

.project-card {

    background: #262626;

    border-radius: 16px;

    overflow: hidden;

    box-shadow:
        0 4px 15px
        rgba(0,0,0,0.08);

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;

    animation: fadeIn 0.5s ease;
}

.project-card:hover {

    transform: translateY(-8px);

    box-shadow:
        0 12px 30px
        rgba(0,0,0,0.14);
}


/* IMAGE */

.project-image {

    height: 210px;

    background: #e5e5e5;

    overflow: hidden;

    display: flex;

    align-items: center;

    justify-content: center;

    color: #777;

    font-size: 18px;
}

.project-image img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    transition:
        transform 0.4s ease;
}

.project-card:hover
.project-image img {

    transform: scale(1.05);
}


/* CONTENT */

.project-content {

    padding: 22px;
}

.project-category {

    display: inline-block;

    font-size: 12px;

    font-weight: 600;

    color: #ff0014;

    margin-bottom: 8px;
}

.project-title {

    font-size: 21px;

    margin-bottom: 10px;
}

.project-desc {

    color: #ffffff;

    line-height: 1.6;

    font-size: 14px;

    margin-bottom: 18px;
}


/* TECHNOLOGIES */

.tech-tags {

    display: flex;

    flex-wrap: wrap;

    gap: 7px;

    margin-bottom: 20px;
}

.tech-tag {

    padding:
        5px 10px;

    border-radius: 20px;

    background: #ff0014;

    font-size: 12px;

    color: #ffffff;
}


/* BUTTON */

.project-link {

    display: inline-block;

    padding:
        10px 17px;

    background: #ff0000;

    color: white;

    text-decoration: none;

    border-radius: 8px;

    font-size: 14px;

    transition: 0.2s;
}

.project-link:hover {

    background: #ffffff;
    color: #ff0000;
    transform: translateY(-1px);
}


/* HIDDEN */

.project-card.hidden {

    display: none;
}


/* ANIMATION */

@keyframes fadeIn {

    from {

        opacity: 0;

        transform: translateY(10px);
    }

    to {

        opacity: 1;

        transform: translateY(0);
    }
}


/* MOBILE */

@media (max-width: 600px) {

    .container {

        padding:
            40px 15px;
    }

    .projects-header h1 {

        font-size: 32px;
    }

    .projects-grid {

        grid-template-columns: 1fr;
    }

}

</style>

</head>


<body>

<div class="container">

    <div class="projects-header">

        <h1>My Projects</h1>

        <p>
            A collection of projects I've created
            during my Software Development journey.
        </p>

    </div>


    <!-- SEARCH -->

    <div class="search-box">

        <input
            type="text"
            id="searchInput"
            placeholder="Search projects..."
        >

    </div>


    <!-- FILTERS -->

    <div class="filters">

        <button
            class="filter-btn active"
            data-filter="all"
        >
            All
        </button>

        <button
            class="filter-btn"
            data-filter="Web Development"
        >
            Web Development
        </button>

        <button
            class="filter-btn"
            data-filter="Creative Development"
        >
            Creative
        </button>

        <button
            class="filter-btn"
            data-filter="Other"
        >
            Other
        </button>

    </div>


    <!-- PROJECTS -->

    <div class="projects-grid">

        <?php foreach ($projects as $project): ?>

            <div
                class="project-card"
                data-category="<?= htmlspecialchars($project['category']) ?>"
                data-title="<?= htmlspecialchars(strtolower($project['title'])) ?>"
            >

                <div class="project-image">

                    <?php if ($project['image']): ?>

                        <img
                            src="<?= htmlspecialchars($project['image']) ?>"
                            alt="<?= htmlspecialchars($project['title']) ?>"
                            loading="lazy"
                        >

                    <?php else: ?>

                        <?= htmlspecialchars($project['title']) ?>

                    <?php endif; ?>

                </div>


                <div class="project-content">

                    <span class="project-category">

                        <?= htmlspecialchars($project['category']) ?>

                    </span>


                    <h2 class="project-title">

                        <?= htmlspecialchars($project['title']) ?>

                    </h2>


                    <p class="project-desc">

                        <?= htmlspecialchars($project['description']) ?>

                    </p>


                    <div class="tech-tags">

                        <?php foreach ($project['technologies'] as $tech): ?>

                            <span class="tech-tag">

                                <?= htmlspecialchars($tech) ?>

                            </span>

                        <?php endforeach; ?>

                    </div>


                    <a
                        href="<?= htmlspecialchars($project['link']) ?>"
                        class="project-link"
                    >

                        View Project →

                    </a>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>


<script>

const searchInput =
    document.getElementById('searchInput');

const filterButtons =
    document.querySelectorAll('.filter-btn');

const projectCards =
    document.querySelectorAll('.project-card');

let currentFilter = 'all';


function updateProjects() {

    const search =
        searchInput.value
        .toLowerCase()
        .trim();

    projectCards.forEach(card => {

        const title =
            card.dataset.title;

        const category =
            card.dataset.category;

        const matchesSearch =
            title.includes(search);

        const matchesFilter =
            currentFilter === 'all' ||
            category === currentFilter;

        if (
            matchesSearch &&
            matchesFilter
        ) {

            card.classList.remove('hidden');

        } else {

            card.classList.add('hidden');

        }

    });

}


searchInput.addEventListener(
    'input',
    updateProjects
);


filterButtons.forEach(button => {

    button.addEventListener(
        'click',
        () => {

            filterButtons.forEach(btn =>
                btn.classList.remove('active')
            );

            button.classList.add('active');

            currentFilter =
                button.dataset.filter;

            updateProjects();

        }
    );

});

</script>

</body>

</html>