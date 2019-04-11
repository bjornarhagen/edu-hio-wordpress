# edu-hio-wordpress

## Install

1. Install dependencies: `npm install`
2. Compile JS and SASS (minified): `npm run prod`
3. Add `havnehotellet-i-halden.local` to your hosts file

## Develop

1. Compile JS and SASS (not minified): `npm run dev`
2. Start PHP server: `php server`
3. Run BrowserSync: `npm run watch`

NB: When using `php server` instead of running Apache/Nginx you might get an error when accessing the admin pages. Make sure your URL ends with a `/` when visiting `wp-admin`, like so: `havnehotellet-i-halden.local/wp-admin/`
