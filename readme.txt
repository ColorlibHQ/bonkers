=== Bonkers ===
Contributors: Colorlib
Requires at least: 6.1
Tested up to: 7.1
Requires PHP: 7.4
Version: 1.1.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.en.html
Tags: blog, portfolio, photography, two-columns, custom-background, custom-colors, custom-header, custom-logo, custom-menu, editor-style, featured-images, footer-widgets, full-width-template, block-patterns, block-styles, wide-blocks, sticky-post, theme-options, threaded-comments, translation-ready

== Description ==

Bonkers is a one-page WordPress theme for studios and freelancers who would rather show work than describe it: a front page assembled from widget sections, a filterable portfolio, and post layouts built for reading.

It needs no page builder and no companion plugin. The front page sections, the widgets that fill them and the colour and typography options are all part of the theme.

Bonkers also supports the block editor. A theme.json carries the palette, the fluid type scale and the content and wide widths, so blocks look the same while you edit them as they do once published. Eight block patterns rebuild the front page sections out of core blocks, and nine block styles offer the theme's own looks to core blocks: outline buttons, rounded, framed and tile-cropped images, cards, plain quotations, short rules and checklists.

= Create a Front Page =

Create a new page and select "Front Page" as template.
Then you can make this page your home page by going to Settings > Reading > Front page displays, and selecting your new page under "Front page" option.

== Installation ==
	
1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Copyright ==

Bonkers WordPress Theme, Copyright 2017-2026 Colorlib
Bonkers is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

Bonkers WordPress Theme bundles or use the following third-party resources:

Underscores 
(C) 2012-2015 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
Source: http://underscores.me/

Bootstrap 3.3.7, by @mdo and @fat
Portions of its base styles are adapted in assets/css/base.css.
Code licensed under MIT
Source: https://getbootstrap.com

48 Bubbles Iconset by Umar Irshad
License: Open Source
Source: https://dribbble.com/shots/1569128-Freebie-48-Bubbles-Iconset

Flickity by Metafizzy | GPLv3
License: https://flickity.metafizzy.co/license.html
Source: https://flickity.metafizzy.co/

Pace
License: https://raw.githubusercontent.com/HubSpot/pace/master/LICENSE
Source: http://github.hubspot.com/pace/docs/welcome/

PT Sans
Copyright (c) ParaType Ltd
License: SIL Open Font License, Version 1.1
https://scripts.sil.org/OFL
Bundled in assets/fonts and declared in assets/css/fonts.css.

Font Awesome 4.6.3 by @davegandy
Font files: SIL OF License 1.1 - http://scripts.sil.org/OFL
Code: MIT License - http://opensource.org/licenses/mit-license.html
http://fontawesome.io

Images from StockSnap.io
License: https://stocksnap.io/license
https://stocksnap.io/photo/1A3MXAT0M6
https://stocksnap.io/photo/JBW2PXDOL6
https://stocksnap.io/photo/R7GVMRJWW9
https://stocksnap.io/photo/woman-model-TJHZP9PY4F
https://stocksnap.io/photo/confident-business-TMACJ6VLZH

Icons
03.Office.png - https://dribbble.com/shots/1569128-Freebie-48-Bubbles-Iconset
30.User.png - https://dribbble.com/shots/1569128-Freebie-48-Bubbles-Iconset
48.Dashboard.png - https://dribbble.com/shots/1569128-Freebie-48-Bubbles-Iconset

The WordPress logo belongs to Automattic.
Any other image included & distributed with the theme has been licensed under the GPL and is the creative work of Colorlib.com.

== Changelog ==
=1.1.0=
- Added block editor support: theme.json with the theme's palette, fluid type scale and layout widths
- Added eight block patterns rebuilding the front page sections out of core blocks
- Added nine block styles: outline buttons, rounded, framed and tile-cropped images, cards, plain quotations, short rules and checklists
- Added wide and full alignment, responsive embeds and editor styles
- Added a Full width page template
- Fixed the editor loading a stylesheet that no longer ships with the theme
- Dropped Bootstrap; the grid the theme actually used is now a 4 KB stylesheet
- Folded the front page widgets into the theme, so no companion plugin is needed
- Added a Front Page Sections panel to the Customizer, with controls for every section
- Added work, testimonials and numbers sections, and widgets for them
- Added footer widget areas and styling, and the footer now skips empty columns
- Raised the accent and the team social icons to AA contrast
- Replaced the phone mockup with a current handset drawn as vector
- Bundled PT Sans with the theme; no font is fetched from Google on any page load
- Removed the Google-font subsets option, which no longer had an API to subset
- Trimmed the bundled icon font to woff2 and woff, from six formats
- Removed the hardcoded Google Maps key; the address falls back to plain text
- Fixed section icons disappearing when the Bonkers Addons plugin is also active; the theme's widgets now take precedence
- Fixed the clients and image sections following another section's on/off switch
- Fixed the contact form's submit label sitting off-centre
- Fixed the PHP version check, which still enforced 5.4 against a stated 7.4
- Regenerated the translation template, and documented every placeholder for translators
- Licensed the theme GPLv3 or later throughout, which the bundled Flickity requires

=1.0.9=
- Updated colorlibHQ/bonkers from WPChill/bonkers
- version bump

=1.0.8=
- Small Typo Fix

=1.0.7=
- Compatibility with jquery 3.0
- Fixed front page template

=1.0.6=
- Small fixes
- Security fix

= 1.0.5 =
* Released: October 18, 2019
- Security Fix

= 1.0.2 =
* Released: January 31, 2018
- Prefixed js function
- Formatted readme.txt

= 1.0.1 =
* Released: January 22, 2018
- Added subject tags - WordPress Review

= 1.0.1 =
* Released: October 16, 2017
- Initial Release