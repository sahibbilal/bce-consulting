# BCE Consulting

## Overview

This project uses Gulp to automate various development tasks, including but not limited to compiling SASS to CSS, concatenating and minifying JS and CSS files. This `README.md` file provides documentation for the `gulpfile.js` included in the project.

### Prerequisites

- Node.js (Version 16.14.0)
- npm
- Gulp CLI

### Installation 

After cloning the repo, run

```
npm install
```

### Available Gulp Tasks

```
gulp
```
Builds the project and watches for changes.

```
gulp help
``` 
Lists the available gulp tasks.

```
gulp default
```
Runs css, sass, and js tasks in series.

```
gulp prod
```
Runs css:prod and js:prod tasks in series for a production-ready build.

```
gulp watch
```
Watches for file changes in the assets/css, assets/sass, and assets/js directories and runs the corresponding task to rebuild the affected files..

```
gulp js:prod
```
- Purpose: Builds the JavaScript files for production.
- Source: Defined in project.json
- Destination: Defined in project.json
- Additional features: Uglification

```
gulp css:prod
```
- Purpose: Builds the client app CSS for production.
- Source: Defined in project.json
- Destination: Defined in project.json
- Additional features: Minification

```
gulp js
```
- Purpose: Builds the JavaScript files for development.
- Source: Defined in project.json
- Destination: Defined in project.json
- Additional features: Source maps

```
gulp sass
```
- Purpose: Compiles SASS to CSS.
- Source: Defined in project.json
- Destination: Defined in project.json
- Additional features: Source maps

```
gulp css
```
- Purpose: Builds the client app CSS for development.
- Source: Defined in project.json
- Destination: Defined in project.json
- Additional features: Source maps