# WordPress boilerplate theme

A boilerplate theme for WordPress with an emphasis on simplicity and reuse. By default, all pages except the homepage are rendered with archive.php. Use front-page.php for your homepage, then you can use index.php for everything else. If it gets weird, refer to [The Flowchart Of Template Witchcraft and Wizardry](http://codex.wordpress.org/File:wp-template-hierarchy.jpg) to determine which template file to add; probably archive-{post_type}.php or single-{post_type}.php

For a guide to how the index.php structure works, refer to this template guide: https://dl.dropboxusercontent.com/u/12609261/WordPress%20Template%20Guide.pdf

Less is more. Only create as many custom templates as you need. Think modularly.

This is most definitely a work in progress and opportunities for improvement exist. Feel free to make pull requests.

A few notes/philosophy about this:

1. This theme has no images, no styles, and just bare js files (it does enque jQuery properly from the CDN and a local fallback should that fail though). There's barely any markup too. The idea is, this should be just enough to function as a WordPress theme and nothing more. It's designed to let you just jump in with your own markup and do your thing.
2. Except for the homepage, every single page is rendered with index.php. Using front-page.php for your homepage lets you do this. Archives, search results, pages, posts... they're all rendered with index.php, with the loop partial displaying the actual content. This is done to suggest a build style where you use as few templates as possible, and reuse as much as possible. Use the template flow chart to figure out what to add if you need to, but I feel really strongly about reuse being something with huge productivity gains, as well as end result consistency gains. You'll likely add several new template files, but I wanted to create a theme that worked with as few templates as possible to encourage reuse.
3. This theme defines no custom post types or custom taxonomies. It shouldn't contain any non-presentational logic at all. This should all be custom plugins. A site plugin should be set up for post types and taxonomies.

## Function reference
Please refer to this project's function reference documentation: http://domain7.github.io/wp-theme_boilerplate

## Companion site plugin repo

Since post types and core site functionality shouldn't be defined in the theme but rather a plugin, Domain7 has site plugin boilerplate repo as a companion to this one: https://github.com/domain7/wp-plugin_boilerplate.

## Tweaks & features

### Open Graph and Twitter card tags

Basic open graph and Twitter card tags are printed in `partials/share_meta.php`. You may want to tweak these as needed. For example, you may want to provide a check for a custom field image to be used as an `og:image`. You may also want to specify a Twitter card type per post type, and provide a @username.

For more info:
* [Open Graph](http://ogp.me/)
* [Twitter Cards](https://dev.twitter.com/cards/overview)

### wp_get_archives

We've added the ability to pass a post type slug, or array of post type slugs, into `wp_get_archives()`. The archive page
linked to will also be filtered by that post type.

Example:

	echo wp_get_archives(array(
		'post_type' => 'car'
	));

or

	echo wp_get_archives(array(
		'post_type' => array('car', 'board')
	));

## Setting up wp-theme_boilerplate with Sassyplate, Gruntyplate, and the wp-plugin_boilerplate

Follow these steps to set up a shiney new Wordpress theme, complete with sassyplate, gruntyplate, and the D7 plugin boilerplate.

### WP Theme Boilerplate

* Clone the wp theme boilerplate into the themes directory of your wp install ( https://github.com/domain7/wp-theme_boilerplate.git )
* Rename wp-theme_boilerplate directory to the name of your new theme
* In your new theme directory, delete .git directory and .gitignore file
* Open the style.css file in the root of the theme, and customize with information for your new project.

### Mix In some Sass

* Clone sassyplate into the new theme ( https://github.com/domain7/sassyplate.git )
* After cloning sassyplate into your theme, move the contents of /sassyplate into the theme (except the .git directory, .gitignore and readme.md files).
* Replace the existing images directory with the one from sassyplate. Delete the sassyplate directory and what's left in it (git directory, .gitignore file, readme.md).

### Activate Theme
In wordpress admin, go to appearance / themes and activate your new wordpress theme.

### Plug In some Awesome stuff

The plugin boilerplate contains custom post types, taxonomies, and ACF field files. The purpose of containing these in a plugin, instead of in the theme, is to allow the separation of data from style.

* Navigate to plugins folder of your WP install and clone in the wp plugin boilerplate ( https://github.com/domain7/wp-plugin_boilerplate.git )
* Delete the .git directory and .gitignore file
* Rename the wp-plugin_boilerplate directory to the same name as your theme.
* Rename sitename.php file to the same name as your theme.
* Open sitename.php file and replace all instances of `SITE NAME` and `sitename` with the same name as your theme.
* In wordpress admin, go to plugins, and activate the plugin.

## Login screen

`includes/login_page.php` has been added to customize the login. A logo is assumed in `images/sprites/common-1x/logo.png` since this is our SASS structure.
This can be customized, and a template for adding more custom login css/js in also in `login_page.php`.

## Extra - Install plugins like a boss with WP CLI

If you're like me, you probably have some handy plugins you use on every project. If you have WP CLI installed, you can install those plugins quickly through the command line:

```
wp plugin install advanced-custom-fields --activate
wp plugin install regenerate-thumbnails --activate
```
