# Equalize Digital oEmbed Cleaner

**Contributors:** Equalize Digital  
**Tags:** oEmbed, cache, scheduled posts, WordPress  
**Requires at least:** 5.0  
**Tested up to:** 6.6  
**Stable tag:** 1.0.0  
**License:** GPLv2 or later  
**License URI:** [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html)  

## Description

Equalize Digital oEmbed Cleaner is a lightweight WordPress plugin that automatically removes invalid oEmbed cache entries when posts transition from **scheduled** to **published**. This ensures that broken or outdated embed previews do not persist on your site.

## Features

- Cleans up `_oembed_*` post meta with `{{unknown}}` values.  
- Runs automatically when a scheduled post gets published.  
- Helps prevent outdated or broken oEmbed caches.  
- Simple, efficient, and does not add overhead to your site.  

## Installation

1. Download the plugin ZIP or clone the repository.  
2. Upload the extracted folder to `/wp-content/plugins/equalize-digital-oembed-cleaner/`.  
3. Activate the plugin via **Plugins > Installed Plugins** in your WordPress dashboard.  

## How It Works

The plugin hooks into WordPress’s `transition_post_status` action and:  

- Detects when a post status changes from **scheduled** (`future`) to **published**.  
- Removes `_oembed_*` cache entries with `{{unknown}}` values in the postmeta table.  

## Changelog

### 1.0.0  
- Initial release.  

## License

This plugin is licensed under the **GPL-2.0+**.  
