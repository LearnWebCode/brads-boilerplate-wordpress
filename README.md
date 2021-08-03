# Brad&rsquo;s Boilerplate

This repo contains one folder that is an example theme, and another folder that is an example block-type plugin. Both folders use the official [@wordpress/scripts](https://www.npmjs.com/package/@wordpress/scripts) package to power the JS(X) and SCSS bundling.

This repo is part of [one of my YouTube videos, check it out for a more detailed walkthrough](https://www.youtube.com/watch?v=NKqogVcqDHA).

After placing one of the folders in your WordPress **themes** or **plugins** folders, you then:

1. Point your terminal towards the new example folder.
1. Run `npm install`
1. Run `npm run start` and the package will now be watching for any saved changes to your JS or SCSS files.

Alternatively, you can run `npm run preview` and that will **both** start the watch task **and** start a proxy server running on `localhost:3000` that will automatically refresh the browser anytime you save a change. In order for this feature to work you will need to change the domain in `package.json` on **line #8**. In my file it mentions `myexample.local` but obviously you will have a different local dev domain that you want to proxy.

Enjoy!
