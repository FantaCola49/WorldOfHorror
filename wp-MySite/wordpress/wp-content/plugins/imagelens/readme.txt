=== Plugin Name ===
Contributors: webdevmattcrom
Donate link: http://mattcromwell.com
Tags: jquery, image lens, images, image effects
Requires at least: 3.0.0
Tested up to: 4.5
Stable tag: 2.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple WordPress plug-in with one dramatic effect: ImageLens Magnify! 

== Description ==
A simple WordPress plug-in with one dramatic effect: ImageLens Magnify!

This plugin allow you to selectively enable an "ImageLens" effect on your posts and pages. You can enable it for the entire content area of that page/post, or you can choose to enable it per image. See the FAQ and Screenshot tabs for those details.

If you like ImageLens, you might also want to checkout [ZOOM!](http://wordpress.org/plugins/foogallery-zoom-template), which is a template for [FooGallery](http://wordpress.org/plugins/foogallery). It has a very similar effect, but also so additional image filtering features you might enjoy.

Also read about [how this plugin was developed, and how you can stand in solidarity with women developers everywhere](http://www.mattcromwell.com/no-women-were-objectified-while-making-this-plugin/).

**NOTE:** This plugin and have now updated it. Previously, it did not function at all, but now it's been totally refactored and rebuilt from the ground up. It's now totally current with the latest bleed-edge version of WordPress and uses modern coding standards and works really reliably.

With that in mind, if you just downloaded this, please leave a really kind review and click on that "It works!" button. If you have a bug, please DON'T leave a review, just notify me in the support tab so you can experience my stellar support and leave me a revivew AFTER I fix the bug.

== Installation ==
###In the Admin###
1. Search for "Image Lens"
2. Click "install"
3. Upon success notification click "Activate Plugin"
4. Enjoy!
###Manual Install###
1. Click "Download Version 1.0.0"
2. Go to your WordPress site, to "Plugins > Add New"
3. Click on "Upload"
4. Click on the "Choose File" button and find the zip you just downloaded
5. Click on the "Install Now" button
6. Upon success message, click "Activate Plugin"
7. Enjoy!

== Frequently Asked Questions == 

= How does this thing work? =

Once ImageLens is enabled, you'll notice a box below your post and page editor that says: "Enable ImageLens for this Content Area?" That is where all the magic is. Once you check that checkbox, you'll be given choices to customize the look and functionality of ImageLens for that specific post/page. Here's a quick summary of your options:
- *ALL IMAGES*: With this option you can enable all the images you place into this post or page to have the ImageLens effect, even galleries.
- *PER IMAGE*: If you prefer to have choose specific images in your post/page that have the ImageLens effect, choose this option. Then when you go to add your image, make sure to choose "Yes" in the "Enable ImageLens" selector.
			
= Why isn't ImageLens working on my images after I activate the plugin? =
			 
ImageLens hooks to your images with a custom class. That means that only images you have inserted after you activated ImageLens will work with the selective method. You can choose "All Images" and that will work for that page no problem. But if you want individual images, you'll have to re-insert them into the page in order for the right class name to be added to that image.

= The lens appears, but my it's not really zoomed well. What's the deal!? =
			 
The way ImageLens works, you have to insert a large image and have is resized smaller on the page in order to get a good magnification effect. It's best to insert the full image size, then manually drag the image smaller in the editor after you insert it. The smaller the image is compared to the original, the higher the magnification.

= It doesn't seem to be working on my CPT's or on WooCommerce images. =
			 
That's right. Currently ImageLens only works on Posts and Pages. I plan to implement it for CPT's and e-commerce product pages in the future.

= I'd like to use this in a sidebar widget. How do I do that? =
			 
For now, you can enable the "Selective" option on the page where you're widget will appear, then on the image you want to use add the class "imagelens-single", and it'll work just dandy. I plan to add a custom image widget in the future as well.

= This is JUST want I needed? How can I ever thank you!? =
			 
Hey, that's what I'm here for. But if you'd really like to thank me, check out my <a href="http://mattcromwell.com" target="_blank">website</a>, subscribe to my newsletter, tweet about how much you like the plugin, or feel free to donate here.

= Known Issues =

Currently, this doesn't handle multiple images on the same page very well. I have a fix, but it'll take a serious re-working, so it'll take a little time. Be patient, but it's on the horizon for sure. Thanks!

== Upgrade Notice == 
Bugfix: Enable all images fixed.

== Screenshots ==
1. ImageLens effect with strong border and drop-shadow
2. ImageLens effect with no border and inset shadow
3. Editor Settings

== Changelog ==
= 2.0.1 =
* Bugfix for shortcodes not rendering in content correctly. Thanks [kove](http://wordpress.org/support/topic/gallery-images-do-not-display-after-activation-of-the-plugin?replies=3) for the heads up.

= 2.0.0 =
* Just re-released, totally refactored by [webdevmattcrom](http://profiles.wordpress.org/webdevmattcrom/). 
* Now can be enabled per page/post and per image.
* Border styles
* Border sizes
* Drop shadow and inset effect

= 1.0.0 =
* First version (by [ramoonus](http://profiles.wordpress.org/ramoonus/))