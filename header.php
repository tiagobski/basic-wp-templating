<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?= get_bloginfo('description') ?>">
	<meta name="author" content="">

	<title><?= get_bloginfo('name') ?></title>

    <!-- Stylesheets -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= get_bloginfo( 'template_directory' ) ?>/blog.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<?php wp_head();?>
</head>

<body>

	<div class="blog-masthead">
		<div class="container">
			<nav class="blog-nav">
				<a class="blog-nav-item active" href="#">Home</a>
				<?php wp_list_pages( '&title_li=' ); ?>
			</nav>
		</div>
	</div>
	
	<div class="container">
		<div class="blog-header">
			<a href="<?= get_bloginfo('wpurl') ?>">
                <h1 class="blog-title"><?= get_bloginfo('name') ?></h1>
            </a>

			<p class="lead blog-description">
                <?= get_bloginfo('description') ?>
            </p>
		</div>