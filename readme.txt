=== Plugin Name ===
Contributors: djleven
Donate link: https://e-leven.net/my-movie-database
Tags: movie, tv, actor, tmdb, content, mmdb, cast, crew
Requires at least: 3.7
Tested up to: 4.8.2
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

My Movie Database allows you to add detailed information about movies, tv shows and people you choose. The data comes from the Movie Database (TMDb).

== Description ==

The My Movie Database plugin compliments your content by adding information about the movies, the television shows and the people in the industry. You can use it via shortcodes or the standard posts method. This plugin was developed to enrich your movie or tvshow critique / review by 'automatically' adding the related information and allowing you to focus on your writing instead. The data comes from Movie Database (TMDb), the leading crowdsourced movie industry information community. 

== Installation ==

**Download a copy of the plugin and save it to your computer.** <br>
Then you can install it using the wordpress admin interface or by manually uploading it.
#### From the wordpress admin
<ol>
1. Log into your WordPress site and navigate to the admin area.
2. Go to: **Plugins &gt; Add New**.
3. Select **"Upload Plugin"** from the top of the page. 
4. Click on **"browse"** and locate the plugin you downloaded on your hard drive.
5. Select **"Install Now"**
6. After the installation success message, select **"Activate"** and you’re ready to go.

#### Manual upload

1. Manually upload the plugin to your wordpress plugins folder.
2. Extract the zip file
3. Navigate to your Wordpress admin area
4. Locate the plugin and select **"Activate"**

## How to use the plugin

The My-Movie-Database (mmdb) plugin can be used via shortcodes or inside wordpress posts (and post types).

After installing the plugin three custom post types are created in wordpress: Movies, TvShows and Persons.

You can disable any one of them (or all of them if you want to use this plugin <em>only</em> via shortcode) by going into the Advanced options tab of the Movie Database options and selecting "No" for the post types you don't want.

The shortcode method will always be available for all resource types (Movies, TvShows, etc) regardless of the state of the mmdb options for each post type.

Below is an outline of the two methods: Wordpress posts and shortcodes


### Using the plugin with Wordpress posts

So as was mentioned above, by default the MMDB plugin will create three custom post types in wordpress: Movies, TvShows and Persons.

These custom post types behave just like your regular wordpress post type except that they have an mmdb section to configure.

##### Adding a New Movie (or editing a Movie post):
Below the content textarea of your Movie post you will find the mmdb search for a movie field.

1. Enter the title of the movie you are looking for and click on search.

2. You will then be presented with the search results. Click on the desired movie.

<img src="/assets/movie_selection" alt="movie-selection" />

3. A pop up will appear asking you to confirm your selection or to return to the previous page.

<img src="/assets/movie_selection-confirm.png" alt="movie-selection-confirmation" />

4. Once you have confirmed your selection you must save the post.

Now if you navigate to the url of your post (front-end), the movie information will be displayed.

##### Configuration and customization of display

From the plugin option page you can configure:

1. which template will be used to display your resource
2. if this should appear before or after the post content
3. select from a predermined set of width combinations for multiple column arrangements as seen on sections like cast and crew.
4. which sections to display/hide
5. the header and body colors for the available templates

See the configuration documentation page for more info.

>All the of the above apply for TvShows and Persons as well.

### **Using the plugin with shortcodes

The plugin shortcode is [my_movie_db] . The parameters that can be set are <span>id</span>, <span>type</span>, <span>template</span> and <span>size</span>.

##### 1-) id
The most important parameter is the id of the movie, tvshow or person info you wish to display.  This parameter corresponds to the unique id of the resource at the <a href="https://www.themoviedb.org">TMDb website</a>.

You can find the id by searching for the movie, tvshow or person at the TMDb website or in the respective custom post type edit screen in your wordpress backend.

- Searching at the TMDb website

- Searching at your custom post type edit screen

Once you find the desired id you use it as in the following example:

[my_mοvie_db id=yοur_id]

If you don't specify an id the id of 655 will be used.

##### 2-) type
The type parameter corresponds to the type of resource you are looking for. Possible acceptable values are **movie**, **tvshow** or **person**

So for example if you are looking to display a tvshow your shortcode should look like this:

[my-mοvie-db id=yοur_id type=tvshow]

The default type value is "movie" so if you don't specify the type, the movie type will be used.

##### 3-) template

The template parameter defines the mmdb template you wish to use to display your resource.

<ul>
 	<li>The template files are located inside the "mmdb_templates" folder of the 'my_movie_database" plugin. 
 	<li>The template file parameter should be the name of the file without the ".php" (the extension).</li>
 	<li>Current templates available that ship with the plugin  are **tabs** and **accordion.**</li>
</ul>

>	It is recommended to copy the "mmdb_templates" folder inside your active theme folder. This way any changes you make to your template  	>	files will not be overwritten by a plugin update.

So if for example you want to use the accordion.php template file your shortcode will look like this:

[my-mοvie-db id=your_id type=yοur_type template=accordion]

This will use the file in the folder path /mmdb_templates/yourtype/accordion.php ("your_type" can be movie, tvshow or person).

The default template value is "tabs" so if you don't specify the template, the tabs template will be used.

Of course you can also use your own template. Make sure you place it in the correct subfolder.

##### 4-) sizes

Depending on the width setup/style of your target page, you can select from a predermined set of width combinations for a best fit. This setting only affects bootsrap multiple column arrangements as seen on sections like cast and crew.

For example, if you have a full-width  area with a no sidebar layout you would choose ‘large‘, ‘medium‘ if you have one sidebar and ‘small‘ for a two sidebar area. The default value is ‘medium’.

The width options again and an ex of class rendered for multiple column arrangements in cast and crew like sections:
large => for Full-width => renders ‘col-lg-3 col-md-3 col-sm-6’
medium => for one sidebar =>renders ‘col-lg-3 col-md-4 col-sm-6’
small => ‘for two sidebars =>renders  ‘col-lg-4 col-md-6 col-sm-6’

##### Shortcode examples

See the demo shortcode examples on the plugin site page for more info.

##### Configuration and customization of display

From the plugin options page you can select some  display options such as:

1. which sections to display/hide, as well as
2. the header and body colors for the available templates

See the configuration documentation page for more info.


== Changelog ==

= 1.1.0 =
* First release.


