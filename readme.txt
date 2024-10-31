=== Redirect anonymous users ===
Contributors: manuelrazzari
Tags: redirect, launch, membership
Requires at least: 3.0
Tested up to: 4.5.3
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Z9RS9S2FK8Q3Y
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Users who are not logged-in are redirected to a specific URL.

== Description ==

Users who are not logged-in will be `302` redirected to an absolute URL specified by the admin.

Any user who can log in, from admins to subscribers, will be able to access the site.

To turn off this redirection, clear the redirect URL field, or simply disable this plugin.

= Use cases =

This is a very **minimal** plugin for very simple use cases, when you want to avoid the bloat of a full-on redirection plugin. 

* **Site launch**. Redirect to some static coming soon page. Then disable the plugin to launch the site!
* **Staff-only site**. Only members of your staff can log in.
* **Membership**. If your needs are very simple, this plugin might work.


== Installation ==

1. Upload `redirect_anon` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu.
1. In your Network admin, go to Settings > Redirect Anonymous.

== Screenshots ==

1. **Settings screen.** This is all there is to it.

== Changelog ==

= 0.1.0 =
* Initial version, used to launch a client's site.

== Upgrade Notice ==

= 0.1.0 =
* Initial version.