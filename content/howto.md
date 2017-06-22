---
Title: HOWTO guide
Description: A guide to adding content to the Stairwell Carollers website
Language: en
pid: howto
Page_Ignore: true
Position: 0
Hiding: 1
---
# How To Put Pages on the Stairwell Carollers' (new) website

This page is intended to set out how to prepare pages to be put on the new website:
* How to write them
* Where to put images, music, PDFs, etc.
* How to "tag" them so that they show up in menus where you want them and so the English and the French match up.

## Adding a page to the site

You don't have to write in HTML. Write your page in [markdown](https://daringfireball.net/projects/markdown/syntax). This is easy using an editor such as [mou](http://25.io/mou/). Put key information about what the page is and how and where it should be displayed at the top of the file using the tags described below. (This site in fact uses a slightly broader version of markdown called [markdown extra](https://michelf.ca/projects/php-markdown/concepts/). For most purposes, you can just write plain markdown.)

Upload your page to the `contents` directory of the server. Where possible, use a short, easy-to-understand filename, lowercase only, which relates to the title of the page or makes it clear what the page is about. The filename will become part of the url, and may be something someone types in.

If you have images, mp3s, PDFs which you want to use, put them in the `assets` directory of the server.

## File layout

In the diagram below, remember that you want to put images, music files, PDFs into `assets`. Your markdown files which will be the pages of the site go into `content`, in some cases in sub-folders. Remember that the `index.md` file is "magic" for folders - it's the default file which will be shown (including for the site as a whole - `content/index.md` is the front page of the site) and contains special codes which tell the website about the other files in the same directory. (See [Tags for Categories](#categories) below.)
```sh
.
├── assets
|   ├── APPLICATION FORM-en.pdf
|   ├── APPLICATION FORM-fr.pdf
|   ├── Arche Agape.jpg
|   ├── AuditeNova-cover.jpg
|   ├── Away.mp3
|   ├── Cabergers.mp3
|   ├── CantateDomino-cover.jpg
|   ├── CantateDomino.mp3
|   ├── ChoirPortrait.jpg
|   |   { ... }
|   ├── pretty.mp3
|   └── ubi.mp3
├── config
|   └── config.php
├── content
|   ├── index.md
|   ├── accueil.md
|   ├── CDs
|   |   ├── accueil.md
|   |   ├── audite-nova-en.md
|   |   ├── audite-nova-fr.md
|   |   ├── audite-nova-lyrics.md
|   |   { ... }
|   |   ├── index.md
|   |   ├── laudemus-cum-armonia-en.md
|   |   ├── laudemus-cum-armonia-fr.md
|   |   ├── laudemus-cum-armonia-lyrics.md
|   |   { ... }
|   |   ├── qui-creavit-celum-en.md
|   |   ├── qui-creavit-celum-fr.md
|   |   └── qui-creavit-celum-lyrics.md
|   ├── Concerts
|   |   ├── Christmas.md
|   |   ├── Noel.md
|   |   └── index.md
├── themes
|   ├── default
|   |   └── { Default pico theme }
|   └── stairwell
|       └── { Stairwell Carollers theme }
├── lib
|   └── { Internal pico files }
├── plugins
|   └── { Plugin files }
├── vendor
|   └── { Internal pico files }
└── index.php
```

## Style guide

The website will do nearly all of the formatting for you. Use the basic formatting commands which markdown gives you for **bold**, _italic_ and headers.

The website has useful defaults for including images. Upload your images to the `assets` directory of the site before trying to refer to them in the file in your editor, so your editor can find them online ahead of time. Do not create new `assets` folders - these will not be used.

Do not try to change fonts or font sizes - this will break how the pages appear on a screen different from your own (an iPhone, an iPad, a widescreen monitor, ...)

## Making it multilingual

The easiest way to do this is to prepare a page with all of the information (including the tags described below), then make a copy under a new name. Choose the new name according to the same rules.

If you used `index.md` in English, perhaps use `accueil.md` in French. (`index.md` is the default page loaded in a directory if no other page is specified.)

Where the English and the French filename would be the same (e.g. `auditions`), append `-en` to the English and `-fr` to the French.

Once this is done, switch the `Language` tag (see below) and replace the original content with its translation.

## Architecture of the site
Structure of how things are put together:

| Item | Description |
|------|-------------|
| Apache webserver | Provided by the hosting service.|
| PHP interpreter | Provided by the hosting service, this lets us extend the webserver to make it responsive.|
|[Pico CMS](picocms.org)|Open source software written in PHP, a language which the web server interprets |
| [PicoMultiLanguage](https://github.com/RichardMN/pico_multilanguage) | A plug-in which makes pico multilingual |
|[Pico-Categorized-Pages](https://github.com/RichardMN/Pico-Categorized-Pages)| A plug-in which generates drop-down menus for categories multilingually|
|[Pico Menu Hiding](https://github.com/ufgum/Pico-Hide)| A plug-in which makes it possible to hide pages from  menu generation|
|[Stairwell Theme](https://github.com/canoe-drew/stairwell-theme)|A theme developed specifically for our site. Any pico website has to have a theme, but the basic theme is very basic. Ours is based on [bootstrap](getbootstrap.com) which is a standard framework for building responsive websites. The theme has a special HTML file which acts as a template and some CSS to change the fonts, set the colours, tell it how to draw icons, and draw the carousel. The theme also has some JavaScript. All of the HTML, the CSS and the Javascript are interpreted by the browser.|
|The `markdown` content | All of the pages on the site are written in `markdown` and saved in the `content` folder (or  folders within it). These files are converted into HTML and provided by the webserver to user's browser software.|

## The process
Content files get transformed by pico by being converted from [markdown](https://daringfireball.net/projects/markdown/syntax) into HTML, then pushed into the middle of the template. They may refer to assets (images, music, PDFs,...) which pico will serve without modifying.

The template HTML file (which is part of the theme, not part of the content) takes information from the header of the file and uses it as it writes the top and bottom of the HTML data which gets sent to a browser. It makes the header (including the menus) and footer, and calls on the CSS which we use to style the text, images, and so on.

## Tags for pages

Every page needs to have at least `Title`, `pid` and `Language` set.

`Description`, `Position`, are `Hiding` nice to have, but not absolutely necessary. (You probably want to have `Hiding` set to `1`.)

|Tag Name| Content and usage |
|:-------|:------------------|
|`Title` | This goes into the `<title>` tag - most browsers will put it into the window title or the tab title. The tag actually currently gets the title, followed by "The Stairwell Carollers" or "Les Chanteurs Stairwell".|
|`Description`| Description is not used by browsers. It will be used by robots, and may be used by some search engines as a summary of the page.|
|`Position`|Numeric position of the page within a menu listing (Generally not used.)|
|`Hiding`|If `Hiding` is `0`, the page will appear in the menu at the top of the screen; if it is `1` (a safe default) it will not appear in the menu (but may appear in a drop down menu).|
|`pid`| "Page id". This is used as a "tag" to tie together pages which are in different languages but which have the same content. The English and French versions of a page should both have the same `pid`; no other page should have that `pid`.|
|`Language`| `en` or `fr`, for English or French. This tells the website if the page is English or French, which determines what title it uses and which menus it displays. |

### Example

```
Title: Auditions
Description: How to join the Stairwell Carollers
Keywords: auditions, join us 
Position: 0 
Page ignore: false
Language: en 
pid: auditions
```

## Tags for Categories {#categories}

A category is a folder under `content` which contains a set of related pages. The contents of the folder will automatically be made into a drop-down menu. Information about the category itself (in particular, its English and French titles) go in the `index.md` file in the folder.

|Tag Name| Content and usage |
|:-------|:------------------|
|`Category_Position`|This is a number which sets ordering of categories in the menu bar.|
|`Category_Ignore`|This indicates if the category should be ignored - `true` to have no menu generated for this category.|
|`Category_Title`|  This gives the title for the category.
|`Category_Titles` | Sets the titles in different languages for the category. |

### Example
```
Category_Title:  Recordings
Category_Titles:
  en: Recordings
  fr: Enregistrements
Category_Position: 1 
Category_Ignore: false 
```

## How Menus are made

Every time a page is loaded from the site, Pico and the plugins installed work in the context of the template we provide to generate the menus of the site, making links between all the different elements of the site so it is easy to navigate and making it easy to find the English and French versions of the same content.

This requires the tags for pages and categories to be set up in a particular way, but once they're set, the generation and updating of menus is very simple.

1. **Any** file which is not Hiding is added to the menu. This includes files inside folders and includes the `index.md` inside a folder. Currently, there is only one file which doesn't have `Hiding` set to 0, and that's Auditions. These files are sorted according to the `Position` field.
2. Then the template looks at the folders. It sorts folders (categories) by `Category_Position` (so you could shuffle Recordings and Concerts and Charity). For each folder, it gets information about the folder from the `index.md` file in the folder. Then it looks at all the files in the folder to put together the list which goes into the drop down menu. It will only list the pages which have the same `Language` as the page which is currently being displayed.  
  
  These are two separate loops. There is no way to have a menu item, a drop down menu, then another stand alone menu item. You could have a drop down menu with only one entry, or no entries, but this latter would not behave well on some browsers.
3. Finally, if there is a version of the page in the other language, it provides a link to that page (Français/English).
