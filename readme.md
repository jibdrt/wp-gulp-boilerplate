This theme skeleton is made to work with the ACF plugin.

Easily rename the theme using:
> find . -type f -exec sed -i '' 's/*sitename*/*yourthemename*/g' {} +
and replace *yourthemename* with your actual theme name.

npm install gulp gulp-plumber gulp-sass gulp-uglify gulp-concat --save-dev and use gulp watch to launch js minification and scss compilation