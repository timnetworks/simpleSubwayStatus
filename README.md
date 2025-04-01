# simpleSubwayStatus

Simple MTA status alerts for your line of choice.

![MTA Status Page Screenshot](screenshot.png)

## Simple Features

- Pulls alerts from MTA Subway Alerts
- Filter by line
- Mobile and Desktop Viewports
- Solarized whether you like it or not

## Simple Prerequisites

- Web server with PHP support (Apache, Nginx, etc.)
- PHP 7.0 or higher

## Installation

1. Clone this repository or download the files to your web server's document root
2. Ensure the web server has permission to execute the PHP file
5. Access the page through your web browser

## File Structure

```
.
├── index.html    # Main HTML page
├── status.php    # PHP proxy for MTA API requests
├── style.css     # CSS styles
└── mtalogo.png   # MTA logo image
```

## Usage

### Viewing Alerts

- All alerts are shown on page load
- Press a line's icon to show only alerts on that line
- Click on any alert to expand and view more details
- Scheduled alerts show as posts from the fuuuuutuuuuuuure
- Click "Show All" to reset filters and display all alerts

### Refreshing Data

- Click the refresh button in the top right corner to fetch the latest alerts



## Technical Details

### PHP Proxy

The application uses a PHP proxy (`status.php`) to fetch data from the MTA API.

### Data Structure

The MTA API returns data in a JSON format that includes:
- `entity` - Array of alert entities
- `alert` - Contains header, description, informed entities, and active periods
- `informed_entity` - Contains affected route IDs (subway lines)
- `active_period` - Contains timestamps for when the alert is active

### Line Color Mapping

The application uses official MTA colors for subway line badges:
- Blue (A, C, E)
- Orange (B, D, F, M)
- Green (G)
- Brown (J, Z)
- Gray (L, S)
- Yellow (N, Q, R, W)
- Red (1, 2, 3)
- Dark Green (4, 5, 6)
- Purple (7)

## License & Credits

©2025 timnetworks all rights reserved. Made with claude.ai.
