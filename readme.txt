=== Very Simple Event List ===
Contributors: Guido07111975
Version: 1.3
License: GNU General Public License v3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Requires at least: 3.7
Tested up to: 4.2
Stable tag: trunk
Tags: simple, upcoming, event, events, list, custom, post, type, datepicker


== Changelog == 
Version 1.3
- file vsel.php: changed URL validation from sanitize_text_field into esc_url
- file vsel_shortcode.php: changed display of URL in frontend
- updated language files

Version 1.2
- request: add field for event URL (link)
- updated FAQ
- updated language files

Version 1.1
- added featured image
- added pagination
- several small adjustments
- updated FAQ

Version 1.0
- first stable release


== DESCRIPTION ==
This is a very simple plugin to add a list of your upcoming events in your WordPress blog. 

Besides the default title and description it contains event date, event time, event location, event URL and featured image. So no event categories or event tags. That's it.

Use shortcode [vsel] to display your upcoming events on a page.

= Translation =
Dutch translation included. More translations are very welcome! Please contact me via my website.

= CREDITS =
Without the WordPress codex and help from the WordPress community I was not able to develop this plugin, so: thank you!

I have used this tutorial for developing the Very Simple Event List plugin:

http://code.tutsplus.com/tutorials/creating-upcoming-events-plugin-in-wordpress-custom-post-type-and-the-dashboard--wp-35404

This script is released under the GNU General Public License v3 or later.

Enjoy,
Guido


== INSTALLATION == 
After installation go to Events and start adding your events. On right side you can set event date, event time, event URL, event location and featured image. 

Use shortcode [vsel] to display your upcoming events on a page.


== Frequently Asked Questions ==
= How can I change date format in US format? =
VSEL plugin uses the European date format in frontend and backend (day/month/year).
You can change this for frontend in file 'vsel_shortcode.php' by changing 'j F Y' into 'Y F j' (year/month/day).

= How can I set number of events on a page? =
VSEL plugin uses the number set in WP dashboard Settings > Reading.

= Can I leave event time, event location and event URL blank?  =
Yes, event time, event location, event URL and featured image are not required fields.

= How do I enter an event website URL (link)? =
Enter domain like this: www.wordpress.org or wordpress.org (this part will be auto added if missing: http://)

= Where are my past events? =
VSEL only lists upcoming (and today's) events in frontend. But past events are still listed in backend.

= Other question or comment? =
Please open a topic in plugin forum or send me a message via my website.


== Screenshots == 
1. Very Simple Event List in frontend (using Twenty Fifteen theme).
2. Very Simple Event List in dashboard.