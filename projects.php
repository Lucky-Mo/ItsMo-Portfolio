<?php
$projects = [
	[
		'id' => 1,
		'title' => 'E-Commerce Platform',
		'description' => 'A full-featured online store with payment integration',
		'technologies' => ['PHP', 'MySQL', 'JavaScript'],
		'image' => 'project1.jpg',
		'link' => '#'
	],
	[
		'id' => 2,
		'title' => 'Task Management App',
		'description' => 'Collaborative task tracker with real-time updates',
		'technologies' => ['PHP', 'Laravel', 'Vue.js'],
		'image' => 'project2.jpg',
		'link' => '#'
	],
	[
		'id' => 3,
		'title' => 'Blog Platform',
		'description' => 'Content management system with user authentication',
		'technologies' => ['PHP', 'PostgreSQL', 'Bootstrap'],
		'image' => 'project3.jpg',
		'link' => '#'
	]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Projects</title>
	<style>
		* { margin: 0; padding: 0; box-sizing: border-box; }
		body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f5f5; }
		.container { max-width: 1200px; margin: 0 auto; padding: 40px 20px; }
		h1 { text-align: center; margin-bottom: 40px; color: #333; }
		.projects-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
		.project-card { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s; }
		.project-card:hover { transform: translateY(-5px); }
		.project-image { width: 100%; height: 200px; background: #ddd; display: flex; align-items: center; justify-content: center; }
		.project-content { padding: 20px; }
		.project-title { font-size: 20px; font-weight: bold; margin-bottom: 10px; color: #333; }
		.project-desc { color: #666; margin-bottom: 15px; font-size: 14px; }
		.tech-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 15px; }
		.tech-tag { background: #e0e0e0; padding: 4px 10px; border-radius: 20px; font-size: 12px; color: #333; }
		.project-link { display: inline-block; background: #007bff; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; transition: background 0.3s; }
		.project-link:hover { background: #0056b3; }
	</style>
</head>
<body>
	<div class="container">
		<h1>My Projects</h1>
		<div class="projects-grid">
			<?php foreach ($projects as $project): ?>
				<div class="project-card">
					<div class="project-image"><?php echo $project['image']; ?></div>
					<div class="project-content">
						<h2 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h2>
						<p class="project-desc"><?php echo htmlspecialchars($project['description']); ?></p>
						<div class="tech-tags">
							<?php foreach ($project['technologies'] as $tech): ?>
								<span class="tech-tag"><?php echo htmlspecialchars($tech); ?></span>
							<?php endforeach; ?>
						</div>
						<a href="<?php echo $project['link']; ?>" class="project-link">View Project</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>