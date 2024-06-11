# Brad&rsquo;s Boilerplate

This repo contains different theme and plugin boilerplate folders. Here's a quick summary of what makes each one unique.

### Themes

**brads-boilerplate-theme:** This is a traditional / classic (not block theme) that uses SCSS and WordPress's copy of React for public-front end JS instead of the modern Interactivity API.

**brads-boilerplate-theme-tailwind:** The same as above; only it uses Tailwind CSS instead of SCSS.

**brads-fse-hybrid-theme:** This is a block or Full Site Editing (FSE) theme. However, instead of using default/core WP blocks; it uses blocks that we've created as a developer and so we are in 100% control of the HTML / CSS / JS that they output. It also uses PHP for output so the blocks are dynamic.

### Block Plugins

**interactivity-block:** This uses the new Interactivity API in WordPress. However, the official WP example doesn't show how to work with attributes or anything useful that you'd actually spend the next hour or two trying to figure out how to do. This block showcases the basics that I feel most devs will be looking to learn about.

**interactivity-block-tailwind:** The same as above; only it uses Tailwind CSS instead of SCSS.

**brads-boilerplate-block-plugin:** A block but it does **not** use the Interactivity API: it uses WordPress's copy of Reaact for public visitor JS behavior.

**brads-boilerplate-block-plugin-tailwind:** The same above; only it uses Tailwind CSS instead of SCSS.

# Instructions

After placing one of the folders in your WordPress **themes** or **plugins** folders, you then:

1. Point your terminal towards the new example folder.
1. Run `npm install`
1. Run `npm run start` and the package will now be watching for any saved changes to your JS or SCSS files.
1. Please note; for the **brads-fse-hybrid-theme** folder in particular; you'll need to run `npm run start` in one terminal and then open a 2nd terminal and run `npm run blocks` - go ahead and leave both running. The "start" task processes your global CSS and JS while the "blocks" task processes all of your block sub-folders. The two run in perfect harmony. I've tried to use NPM packages to automatically run both tasks at the same time, but I've found that short of having two phsyically separate terminal tabs they don't play together nicely.

Alternatively, you can run `npm run preview` and that will **both** start the watch task **and** start a proxy server running on `localhost:3000` that will automatically refresh the browser anytime you save a change. In order for this feature to work you will need to change the domain in `package.json` on **line #8**. In my file it mentions `myexample.local` but obviously you will have a different local dev domain that you want to proxy.

Enjoy!
