Wordpress theme for [womanowned.wine](https://womanowned.wine/)
===

Not included in this repo is the `style.css` Wordpress requires to operate. If this repo is used to reinstall this theme, the `style.css` will need to be generated by `sass` 

Install with [brew](https://sass-lang.com/install):

`brew install sass/sass/sass`

From `./scss` compile with:

`sass --watch styles.scss:../style.css --style compressed`