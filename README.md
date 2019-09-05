# WordPress templates. From scratch.

This write-up is based on [this article](https://www.taniarascia.com/developing-a-wordpress-theme-from-scratch/).

## Basis

The minimal base of a WordPress template appears to lie in a folder, placed in the `/wp-content/themes/` directory, containing 2 files:

* index.php
* style.css

The second file, `style.css`, needs a specifically formatted comment on top, containing certain fields, which will identify the template in the backend (Appearance > Themes).

```
/*
Theme Name: SuperCarros Template
Author: tiagomartins.eu
Description: Custom template developed for the SuperCarros.pt website.
Version: 0.0.1
Tags: bootstrap, supercarros
*/
```

Additional files commonly included in most templates that utilize WordPress's capabilities are:

* header.php
* content.php
* footer.php
* sidebar.php
* page.php

## Stylesheet / Script linkage

TODO

* template_directory
* functions.php hooks

## Obtaining blog information

`get_bloginfo('string')`

This is the main function used to obtain a piece of information that is typically configured in the backend. Some valid parameters are:

* name
* description
* wpurl
* template_directory

## Obtaining posts (The Loop)

TODO

Both *Posts* and *Pages* are similar in that they use the loop

* have_posts()
* the_post()
  * the_title()
  * the_date()
  * the_author()
  * the_content()
  * [the_post_thumbnail()](https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/)
* get_template_part( 'content', get_post_format() )

## Obtaining other information (making the sidebar dynamic)

* wp_get_archives( 'type=monthly' )
* the_author_meta( 'description' )
* wp_list_pages( '&title_li=' )

## 'Post' page

* [Custom Single Posts](https://www.wpbeginner.com/wp-themes/create-custom-single-post-templates-for-specific-posts-or-sections-in-wordpress/): We can create multiple templates (Posts, Pages, ...), and templates loaded based on the category of posts.

In order to create a custom template, we create a new file on our theme's directory, for example `single-post.php`. The *"Model name"* shown on the right side of the post editing menu is defined by the comment on top of this file:

```php
<?php
/*
 * Template Name: Gallery article
 * Template Post Type: post, article
 */
```

From this point on, we have a custom template that will load based on the selection performed at the post editing menu.

**If we want a specific template to be loaded based on the post category**, we can use the following code (included in the `functions.php` file at our template's root folder), which will look for a file named `single-cat-$catname` at the folder named `single`, in our template's root folder.

```php
define('SINGLE_PATH', get_template_directory() . '/single');	// Define a constant path to our single template folder
add_filter('single_template', 'my_single_template');

function my_single_template($single) {
	global $wp_query, $post;

	foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php') ) {
			return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
		} else if ( file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php') ) {
			return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
		}
	}
}
```

For example, if we want a specific template for posts with the category `gallery`, we add a file named `single-cat-gallery.php` to the `single` folder.

