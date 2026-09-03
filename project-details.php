<?php

require_once 'projects-data.php';

$projectsDirectory = __DIR__ . '/school-projects';

$projectName = $_GET['project'] ?? '';

$projectPath =
    $projectsDirectory . '/' . $projectName;


/*
|--------------------------------------------------------------------------
| Security
|--------------------------------------------------------------------------
*/

if (
    !$projectName ||
    !is_dir($projectPath) ||
    str_contains($projectName, '..')
) {

    http_response_code(404);

    die('Project not found.');

}


/*
|--------------------------------------------------------------------------
| Project information
|--------------------------------------------------------------------------
*/

$data =
    $projectData[$projectName]
    ?? [];

$title =
    $data['title']
    ?? ucwords(
        str_replace(
            ['-', '_'],
            ' ',
            $projectName
        )
    );

$description =
    $data['description']
    ?? 'A project created during my Software Development studies.';

$category =
    $data['category']
    ?? 'Web Development';

$technologies =
    $data['technologies']
    ?? [];


/*
|--------------------------------------------------------------------------
| Find image
|--------------------------------------------------------------------------
*/

$image = '';

foreach (
    ['jpg', 'jpeg', 'png', 'gif', 'webp']
    as $extension
) {

    $images =
        glob(
            $projectPath .
            '/*.' .
            $extension
        );

    if ($images) {

        $image =
            'school-projects/' .
            rawurlencode($projectName) .
            '/' .
            rawurlencode(
                basename($images[0])
            );

        break;

    }

}


/*
|--------------------------------------------------------------------------
| Find project homepage
|--------------------------------------------------------------------------
*/

$projectUrl =
    'school-projects/' .
    rawurlencode($projectName) .
    '/';

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title><?= htmlspecialchars($title) ?></title>


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

    background: #f5f5f5;

    color: #222;

}

.container {

    max-width: 1000px;

    margin: auto;

    padding: 60px 20px;

}


/* BACK */

.back {

    display: inline-block;

    margin-bottom: 30px;

    color: #007bff;

    text-decoration: none;

}


/* IMAGE */

.project-hero {

    width: 100%;

    height: 450px;

    background: #ddd;

    border-radius: 18px;

    overflow: hidden;

    margin-bottom: 35px;

}

.project-hero img {

    width: 100%;

    height: 100%;

    object-fit: cover;

}


/* CONTENT */

.category {

    color: #007bff;

    font-weight: 600;

    margin-bottom: 10px;

}

h1 {

    font-size: 44px;

    margin-bottom: 20px;

}

.description {

    font-size: 17px;

    line-height: 1.7;

    color: #666;

    max-width: 800px;

    margin-bottom: 30px;

}


/* TECH */

.technologies {

    display: flex;

    flex-wrap: wrap;

    gap: 10px;

    margin-bottom: 35px;

}

.tech {

    background: white;

    padding: 8px 14px;

    border-radius: 20px;

    box-shadow:
        0 2px 8px
        rgba(0,0,0,0.08);

    font-size: 13px;

}


/* BUTTON */

.visit {

    display: inline-block;

    background: #007bff;

    color: white;

    padding: 13px 20px;

    border-radius: 8px;

    text-decoration: none;

    transition: 0.2s;

}

.visit:hover {

    background: #0056b3;

}


@media (max-width: 600px) {

    h1 {

        font-size: 32px;

    }

    .project-hero {

        height: 250px;

    }

}

</style>

</head>


<body>

<div class="container">

    <a
        href="projects.php"
        class="back"
    >
        ← Back to Projects
    </a>


    <?php if ($image): ?>

        <div class="project-hero">

            <img
                src="<?= htmlspecialchars($image) ?>"
                alt="<?= htmlspecialchars($title) ?>"
            >

        </div>

    <?php endif; ?>


    <div class="category">

        <?= htmlspecialchars($category) ?>

    </div>


    <h1>

        <?= htmlspecialchars($title) ?>

    </h1>


    <p class="description">

        <?= htmlspecialchars($description) ?>

    </p>


    <div class="technologies">

        <?php foreach ($technologies as $technology): ?>

            <span class="tech">

                <?= htmlspecialchars($technology) ?>

            </span>

        <?php endforeach; ?>

    </div>


    <a
        href="<?= htmlspecialchars($projectUrl) ?>"
        class="visit"
    >

        Visit Project →

    </a>

</div>

</body>

</html>