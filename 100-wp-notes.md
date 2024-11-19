### Overviews:

### FSE Block Theme:
- using `Create Block Theme` plugin | fast, secure & *any-layout
- dummy collection by wp https://github.com/codersantosh/wp-block-theme-boilerplate
- default theme
- tailwindcss + block theme | try and decide

### Classic Theme:
- underscores
- tailwindcss + underscores | try and decide

### Hybrid Theme:
- FSE + Classic | Dig Deep

### Deep Research:
- tailwindcss + wordpress theme (youtube videos) | start here | block, classic and hybrid all
- wp-env, wp-now, local 

### Target to achieve:
- Don't go so much deeper into applying complex practice | build some 4 page wordpress websites about photography in FSE, Hybrid and Classic
- understand FSE, Classic & Hybrid (all with Tailwindcss)
- custom post type integration with all those themes
- custom db query implementation from block theme (and others)
- New Block Or Extending Block plugin development
- Restricting Options after development | FSE, Gutenberg Block, restrict of changing theme and plugins, etc
- dashboard settings page implementation with React
- React + Php (Dynamic Block)
- Performance Check hybrid theme vs FSE only theme

### Watch List
- wordpress tailwindcss hybrid theme by wp
- wordpress classic theme with tailwind css by 
- wordpress block theme with tailwind css (find target)
- wordpress block plugin (find target)
- change block editor's & the user generated content's `.css` files or define them with tailwindCSS. 
- Also check how to remove all style definitions form the bocks and add new styles. If inline styles are injected, then see how to inject custom styles or how to convert the tailwind classes to inline styles, or how to add just those tailwind classes to html and only add the style sheets

- custom block https://youtu.be/Wjvcvlxv2ng?si=hdr0fU6w00tbEYMK
- figma to wp theme hybrid https://youtu.be/_N3ZB-BUaBU?si=FqaT2GR5oFSHHmV9
- 1st React In WordPress Boilerplate (Both Gutenberg Block Types & Front-End) https://youtu.be/NKqogVcqDHA?si=PplphcRsKiZzyvzW
- 2nd Tailwind CSS + WordPress Theme & Block Type Boilerplate https://youtu.be/OP9ZxbqNe38?si=_c2pc18qGUPp4hWZ
- 3rd Interactivity API Tutorial https://youtu.be/49_XlQJYztA?si=eeoyNyR5rKt_wnf-

### Take

### Hybrid vs Classic Theme:
Both are PHP baaed, But Hybrid will include `theme.json` file and other FSE feature.

### Hybrid Theme + TailwindCSS:
- get the `_tw` boilerplate theme
    - `npn install` && `npm run watch`
- tailwind/typography for user's content styling

### FSE Block Theme + TailwindCSS:

### WordPress Data modeling:
- Custom Post Types (CPTs) | Creates new post types with the existing defaults types (pages, posts, media)
    - Create Content
- Taxonomies (terms, tag, categories) | Group content
    - terms/tags are free floating grouping option and `non-hierarchy`
    - category for hierarchy (parent child relationship) grouping. Categories can have sub category
- Custom (post meta) fields | Attach (extra) fields to the content

### Plugin AFC (Advanced Custom Fields) | Extend the default WP data types using gui:


### AFC Free vs Pro:


### Ongoing:
- setup media and mysql db sync across machines via git repository pull
- block development https://developer.wordpress.org/block-editor/getting-started/fundamentals/file-structure-of-a-block/ (add block support)