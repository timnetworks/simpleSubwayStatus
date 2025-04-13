# simpleSubwayStatus

Simple MTA status alerts for your line of choice, with filtering and display options.

![MTA Status Page Screenshot](https://github.com/timnetworks/simpleSubwayStatus/blob/main/screenshot.jpg?raw=true)

## Simple Features

- Pulls real-time alerts from MTA Subway Alerts feed.
- **Filter by Line Group:** Easily filter alerts by standard MTA line groupings (e.g., 1/2/3, A/C/E, B/D/F/M, etc.) including Shuttles and SIR.
- **Toggle Future Alerts:** Choose to show or hide alerts scheduled for a future date/time.
- **Clear "No Alerts" Indication:** Displays a message and graphic when no alerts match your current filter settings.
- **Expandable Details:** Click any alert summary to view the full description.
- **Relative Timestamps:** See how long ago an alert was issued or when a future alert is scheduled to start.
- **Mobile and Desktop Viewports:** Responsive design for various screen sizes.
- **Fixed Controls:** Refresh, Show All, and Future Alert toggle are always accessible at the bottom.
- Solarized whether you like it or not.

## Simple Prerequisites

- Web server with PHP support (PHP 7.0 or higher recommended, cURL extension recommended for better reliability).
- A modern web browser.

## Installation

1.  Clone this repository or download the files to your web server's document root (or a subdirectory).
2.  Ensure the web server has read permissions for all files (`index.html`, `style.css`, `mtalogo.png`, `no_alerts.png`) and execute permissions for `status.php`.
3.  **Add Image:** Place an image named `no_alerts.png` in the same directory. This will be displayed when no alerts are found.
4.  **(Optional) MTA API Key:** If you have an MTA API key, edit `status.php` and add it to the cURL or `file_get_contents` request headers for potentially better rate limits or access.
5.  Access the `index.html` page through your web browser via the web server.

## File Structure
Use code with caution.
Markdown
.
├── index.html # Main HTML page structure and JavaScript logic
├── style.css # CSS styles (Solarized Light theme, layout)
├── status.php # PHP proxy script to fetch data from MTA API
├── mtalogo.png # MTA logo image used in the header
├── no_alerts.png # Image displayed when no alerts match filters
└── README.md # This file
*(Add manifest.json and icon files if listing completely)*

## Usage

### Viewing Alerts

-   All current and future alerts are shown by default on page load.
-   Use the filter buttons at the top to show alerts only for specific line groups (e.g., clicking the 'ACE' button shows alerts affecting A, C, or E lines). Shuttles and SIR are filtered individually.
-   Click on an alert summary (the card itself) to expand and view the detailed description. Click again to collapse.
-   Alerts show when they were issued or when they are scheduled to start.

### Controls (Bottom Bar)

-   **Refresh:** Click the circular arrow button to fetch the latest alerts immediately.
-   **Show All:** Click this button to clear any active line filters and display all alerts (respecting the Future Alerts toggle).
-   **Show Future Toggle:** Use the switch to include or exclude alerts that are scheduled to begin at a future time.

## Technical Details

### PHP Proxy (`status.php`)

-   Acts as a simple backend to fetch data from the official MTA alert feed (`https://api-endpoint.mta.info/Dataservice/mtagtfsfeeds/camsys%2Fsubway-alerts.json`).
-   This avoids potential CORS (Cross-Origin Resource Sharing) issues that would occur if the browser tried to fetch directly from `mta.info`.
-   Includes basic error handling and timeout settings. Recommends using the cURL extension if available.
-   Sets `Cache-Control` headers to discourage aggressive caching of the status data.

### Data Structure & Filtering

-   The application parses the JSON response from the MTA feed.
-   JavaScript handles filtering based on:
    -   Selected line groups stored in `activeFilters`.
    -   The state of the "Show Future Alerts" toggle (`activeFilters.showFuture`).
    -   The `active_period[0].start` timestamp of each alert.
-   The "No Alerts" message is shown dynamically when the filtering results in zero visible alert cards.

### Line Grouping and Colors

-   Lines are grouped and ordered based on common MTA conventions:
    -   `1, 2, 3` (Red)
    -   `4, 5, 6` (Green)
    -   `7` (Purple)
    -   `A, C, E` (Blue)
    -   `G` (Lime Green)
    -   `B, D, F, M` (Orange)
    -   `N, Q, R, W` (Yellow)
    -   `J, Z` (Brown)
    -   `L` (Gray)
    -   `S` (42nd St Shuttle - Gray)
    -   `H` / `sR` (Rockaway Shuttle - Gray)
    -   `FS` / `sF` (Franklin Ave Shuttle - Gray)
    -   `SI` (Staten Island Railroad - Blue)
-   Colors used are based on official MTA branding. Filtering applies to all lines within a clicked group (except for individual shuttles/SIR).

## License & Credits

©2025 timnetworks corporation, all rights reserved. Made with assistance from Claude AI. Code provided as-is. Refer to MTA for official service status.
