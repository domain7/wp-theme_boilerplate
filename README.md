# WordPress boilerplate theme

A boilerplate theme for WordPress with an emphasis on simplicity and reuse. By default, all pages except the homepage are rendered with archive.php. Use front-page.php for your homepage, then you can use index.php for everything else. If it gets weird, refer to [The Flowchart Of Template Witchcraft and Wizardry](http://codex.wordpress.org/File:wp-template-hierarchy.jpg) to determine which template file to add.

Less is more. Only create as many custom templates as you need. Think modularly.

This is most definitely a work in progress and opportunities for improvement exist. Feel free to make pull requests.

A few notes/philosophy about this:

1. This theme has no images, no styles, and just bare js files (it does enque jQuery properly from the CDN and a local fallback should that fail though). There's barely any markup too. The idea is, this should be just enough to function as a WordPress theme and nothing more. It's designed to let you just jump in with your own markup and do your thing.
2. Except for the homepage, every single page is rendered with index.php. Using front-page.php for your homepage lets you do this. Archives, search results, pages, posts... they're all rendered with index.php, with the loop partial displaying the actual content. This is done to suggest a build style where you use as few templates as possible, and reuse as much as possible. Use the template flow chart to figure out what to add if you need to, but I feel really strongly about reuse being something with huge productivity gains, as well as end result consistency gains. You'll likely add several new template files, but I wanted to create a theme that worked with as few templates as possible to encourage reuse.
3. This theme defines no custom post types or custom taxonomies. It shouldn't contain any non-presentational logic at all. This should all be custom plugins.


## Setting up wp-theme_boilerplate with Sassyplate, Gruntyplate, and the wp-plugin_boilerplate

Follow these steps to set up a shiney new Wordpress theme, complete with sassyplate, gruntyplate, and the D7 plugin boilerplate.

##### WP Theme Boilerplate

* Clone the wp theme boilerplate into the themes directory of your wp install ( git@bitbucket.org:domain7/wp-theme_boilerplate.git )
* Rename wp-theme_boilerplate directory to the name of your new theme
* In your new theme directory, delete .git directory and .gitignore file
* Open the style.css file in the root of the theme, and customize with information for your new project.

##### Mix In some Sass

* Clone sassyplate into the new theme ( git@bitbucket.org:domain7/sassyplate.git )
* After cloning sassyplate into your theme, move the contents of /sassyplate into the theme (except the .git directory, .gitignore and readme.md files).
* Replace the existing images directory with the one from sassyplate. Delete the sassyplate directory and what's left in it (git directory, .gitignore file, readme.md).

##### Grunt for awhile (to do: use better pun here)

* Clone gruntyplate into the theme ( git@bitbucket.org:domain7/gruntyplate.git )
* After cloning gruntyplate into your theme, move contents of /gruntyplate into the theme (except the .git directory, .gitignore and readme.md files). Replace existing js directory of the theme with the one from gruntyplate. Delete the gruntyplate directory and what's left in it (git directory, .gitignore file, readme.md).
* Go into package.json and customize the top area with project specific information. The name you enter will be the name of your compiled js file in /js/build/
* Open the includes/scripts.php file, and on line 40, change the location of jQuery script (in gruntyplate its js/src/vendor/jquery-2.0.0.min.js)
* Also in includes/scripts.php, and on line 85, change the reference to /js/main.js to the project script file (in this case, /js/build/enterpriseonline.min.js)
* In terminal, navigate to the theme directory and run `npm install`.
* In terminal, run `grunt` to generate compiled js and css files (Gruntyplate will compile SASS files, no need to run Compass watch. Thanks Reuben)

##### Activate Theme
In wordpress admin, go to appearance / themes and activate your new wordpress theme.

##### Plug In some Awesome stuff

The plugin boilerplate contains custom post types, taxonomies, and ACF field files. The purpose of containing these in a plugin, instead of in the theme, is to allow the separation of data from style.

* Navigate to plugins folder of your WP install and clone in the wp plugin boilerplate ( git@bitbucket.org:domain7/wp-plugin_boilerplate.git )
* Delete the .git directory and .gitignore file
* Rename the wp-plugin_boilerplate directory to the same name as your theme.
* Rename sitename.php file to the same name as your theme.
* Open sitename.php file and replace all instances of `SITE NAME` and `sitename` with the same name as your theme.
* In wordpress admin, go to plugins, and activate the plugin.
