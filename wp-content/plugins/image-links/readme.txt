=== Image Links ===
Contributors: Mill Hill Automation
Requires at least: 3.0.1
Tested up to: 6.0
Stable tag: 1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Contributors: patabugen
Requires PHP: 5.3

Outputs links which are images, with floting-over captions and changing images.
Easily lets you disable the styles (and Scripts) so you can write your own styles.

== Description ==

Outputs links which are images, with floting-over captions and changing images.
Easily lets you disable the styles (and Scripts) so you can write your own styles.

Note there are no screens added to your dashboard - all the settings/information
is in this readme.txt file.

== Installation ==

1. Upload the plugin directory `image-links` to the `/wp-content/plugins/` directory or install it directly from the Wordpress plugin directory.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Add some [mha_image_link] shortcodes to your pages/site using the settings below.

=== Example ===
Here's an example of a bunch of image links wrapped in an image link grid. The grid is optional and just makes the image links sit in columns instead of always being  full width.

Be careful when using image_link_grid that there is no other markup included - watch out for text-editor line breaks being turned into paragraph or line-break tags. You're probably best editing the shortcode data in Text and not Visual view.

<code>
[mha_image_link_grid columns_xs=2 columns_md=2]
  [mha_image_link attachment=100 link="/contact-us" text="Contact Us!" subtext="Get in touch now!"]
  [mha_image_link attachment=101 link="https://www.example.com" text="Checkout Example"]
  [mha_image_link attachment=102 link="/some-page" text="This is some page"]
  [mha_image_link attachment=102 link="/some-page" text="This is some page" style="full"]
  [mha_image_link image="/path-to/image.png" link="/another_page" text="This is another page"]
  [mha_image_link image="https://www.example.com/remote-image.png" link="/another_page"]
[/mha_image_link_grid] 
</code>

=== Documentation ===
No screens or options are added to your Dashboard. All customising needs to be done in your theme's CSS file.

=== Image links Javascript ===
The JavaScript enables multiple images on each image link. If you're not using that functionlaity, or want to implement it yourself - you can stop the JavaScript file being included with:
<code>
<?php
	add_filter( 'mha_image_link_include_scripts', '__return_false' );
?>
</code>

The handle of the script is `mha-image-links`.

=== Image links CSS ===
To stop the plugin including it's default CSS file use this filter:
<code>
<?php
	add_filter( 'mha_image_link_include_styles', '__return_false' );
?>
</code>

The handle of the styles is `mha-image-links`

=== [mha_image_link_grid] shortcode settings ===

* **columns_xs** *Default: 2*
 Specify hwo many columns should display on extra small devices.  By default that's anything up to 768px. Valid values are 1, 2, 3 or 4 unless you add more code based on the source in <code>image-links.scss</code>

* **columns_sm** *Default: none*
 The same as columns_xs but for small screens (above 768px).  If not set then this will default to the value of columns_xs

* **columns_md** *Default: none*
 The same as columns_sm but for small screens (above 992px).  If not set then this will default to the value of columns_sm

* **columns_lg** *Default: none*
 The same as columns_md but for large screens (above 1200px). If not set then this will default to the value of columns_md.

=== [mha_image_link] shortcode settings ===

* **image** *Default: ''**
 Specify the URL to an image. It's better to use attachment if you can.

* **text** *Default: ''**
 The big text to display on the image

* **subtext** *Default: false**
 The smaller text to show on the image link

* **link** *Default: ''**
 The link this image should direct to. Can be anything href="" takes.

* **attachment** *Default: false**
 The attachment ID of the image you want to use or the image. If  you specify this instead of <code>image</code> then you'll get  a properly sized image and everything will be excellent.
 To get the attachment ID find the attachment in your Dashbaord -> media screen, click the one you want and look in your browsers address bar for the Item number. For example in this address <code>upload.php?item=400</code> the attachment ID is 400.

* **style** *Default: half**
 By default the caption covers half the image - you can set style to <code>full</code> to make it cover the whole image. You can also enter anything you like here and the <code>.mha-image-link</code> element will be given it as an extra class. See the bottom of <code>image-link.scss</code> for an example of styling it.

== Screenshots ==
1. Preview at 480px wide screen
2. Preview at 768px wide screen
3. Preview at 1024px wide screen

== Frequently Asked Questions ==

= How do I change the output styles =
You can customise the look and feel of the image links by writing your own CSS. You can use the included .scss file 

You can either include the scss file in your own SCSS and override it, or you can edit a copy of the scss file and compile it, then auto-prefix it, using these online services. Store the output in your child-theme template and include it using wp_enqueue_style inside a wp_enqueue_style hook.

* http://beautifytools.com/scss-compiler.php
* https://autoprefixer.github.io/

== Changelog ==

= 1.4 =
Tested with WordPress 6.0

= 1.3 =
Tested with WordPress 5.1

= 1.2 =
Reduced font-sizes on large screens.

= 1.1 =
Fixed JavaScript - which wasn't running at all. Also made the slidehosw delay be random rather than always 7 seconds.

= 1 =
Initial release
