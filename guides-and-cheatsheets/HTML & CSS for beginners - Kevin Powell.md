# HTML & CSS for beginners - Kevin Powell

[Link to Playlist](https://www.youtube.com/playlist?list=PL4-IK0AVhVjM0xE0K2uZRvsM7LkIhsPT-)

## Video 1 (24-Oct-2023)
- ...

## Video 2 (24-Oct-2023)
- atom, brackets, etc. as text editor
- index.html
```HTML
<!DOCTYPE html>
<html>
    <head>
        <title>My First Website</title>
    </head>

    <body>
    </body>
</html>
```

## Video 3 (24-Oct-2023)
```HTML
<h1>Heading 1</h1>
<h2>Heading 2</h2>
<h3>Heading 3</h3>
<h4>Heading 4</h4>
<h5>Heading 5</h5>
<h6>Heading 6</h6>

<p>Paragraph</p>
```

## Video 4 (24-Oct-2023)
```HTML
<strong>Bold Text</strong>
<em>Italic Text</em>

<!-- This is a comment -->
<!-- Do not use <b> and <i> tags -->
```

## Video 5 (24-Oct-2023)
```HTML
<!-- Absolute link/path -->
<a href="http://www.google.com">Some Text</a>

<!-- Relative link/path -->
<a href="pagetwo.html">Some Text</a>
```

## Video 6 (24-Oct-2023)
```HTML
<!-- Absolute path -->
<img src="https://random-image.com"> <!-- THIS IS NOT AN ACTUAL IMAGE -->

<!-- Relative path -->
<img src="something.jpg">

<!-- Alternative Text (alt) - Used to describe the image - Shows up when the image fails to load -->
<img src="something.jpg" alt="this is a picture">
```

## Video 7 (24-Oct-2023)
- Use only lowercase letters to name files and folders. Do not use uppercase, numbers, spaces, or symbols.
- To indicate spaces use hyphens.
```HTML
<!-- Linking to an image in another folder (not the folder where index.html is at) -->
<img src="images/something.jpg" alt="this is a picture">
```

## Video 8 (24-Oct-2023)
```HTML
<!-- CSS or Cascading Style Sheets is used to style the website -->
<body style="background-color: black; color: #FFFFFF; font-size: 21px; font-family: sans-serif;">
<p style="color: blue;">THIS TEXT IS BLUE</p>
```

## Video 9 (24-Oct-2023)
```HTML
<link rel="stylesheet" href="css/style.css">
```
```CSS
body {
    background-color: black;
    color: #FFFFFF;
    font-size: 21px;
    font-family: sans-serif;
}
p {
    color: pink;
}
```

## Video 10 (24-Oct-2023)
**Divs and spans:** The difference between them is that div is a block-level element while span is an inline-level element.

```HTML
<!-- Division (div) -->
<div>
    <p>This is a div</p>
</div>
<div>
    <p>This is another div</p>
</div>
<!-- Use spans inside div tags as they can be used inline unlike divs or paragraphs -->
<div>
    <p>This is another div. <span>This is a span</span></p>
</div>
```
```CSS
div {
    background-color: pink;
    width: 500px;
    height: 200px;
}
```

## Video 11 (1-Nov-2023)
- class vs id (id are unique identifiers whereas the same class can be used for multiple elements)
- Avoid id unless necessary
```HTML
<div class="box">
    <p class="first-line">THIS IS A PARAGRAPH</p>
    <p id="special-line">THIS IS A SPECIAL LINE</p>
</div>
```
```CSS
.box {
    background: pink;
}
.first-line {
    font-size: 30px;
}
#special-line {
    color: red;
}
```

## Video 12 (1-Nov-2023)
- The CSS Box Model
    - Margin
    - Border
    - Padding
```HTML
<div class="box">
    <p>
        THIS IS A PARAGRAPH.
        THIS IS A PARAGRAPH.
        THIS IS A PARAGRAPH.
    </p>
</div>
```
```CSS
/* THIS IS A CSS COMMENT */
.box {
    background: pink;
    width: 200px;
    
    /* margin */
    margin: 50px; /* Can also use margin-left/right/top/bottom */
    
    /* Alternative method */
    margin: 50px 100px; /* top-bottom left-right */
    margin: 50px 0 30px; /* top left-right bottom */

    /* border */
    /* similar to margin we can use border-left/right/top/bottom-width/color/style */
    /* border-style is mandatory for the border to show up */
    border-width: 30px;
    border-color: red;
    border-style: solid;
    
    /* Alternative method */
    border-right: 15px solid blue; /* will be overridden by the next line */
    border: 10px solid green;
    border-left: 5px solid red;
    
    /* padding */
    padding: 30px; /* padding-left/right/top/bottom */
    
    /* Alternative method */
    padding: 30px 60px 90px 120px; /* top right bottom left (clockwise from top) */
    padding: 30px 60px; /* top-bottom left-right */
}
```

## Video 13 (1-Nov-2023)
- Using images as backgrounds of elements
```HTML
<div class="box">
    <p>
        THIS IS A PARAGRAPH.
        THIS IS A PARAGRAPH.
        THIS IS A PARAGRAPH.
    </p>
</div>
```
```CSS
.box {
    margin: 50px;
    padding: 50px;

    background-image: url(../images/abc.jpg); /* Here, ../ is used to go back one folder from the current directory */
    background-repeat: no-repeat; /* can also use repeat, repeat-x, repeat-y */
    background-size: auto; /* can also use 
        - contain - fills up the div - but also repeats
        - cover - fills up the div - but does not repeat - full image might not show up */
    background-position: center; /* can also use 
        - top, right, left, bottom, top left, right bottom, etc.
}
```

## Video 14 (1-Nov-2023)
```HTML
```

CSS Fonts: [Link](https://www.cssfontstack.com/)

```CSS
body {
    font-family: Calibri; /* The computer might not have this font.
        To fix this issue, you can use the font stack and use the website linked above */
    /* From the website copy the font stack like the line below */
    font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; /*
        use single or double quotation marks for font names with more than 1 word */
}

h1 {
    font-family: Rockwell, "Courier Bold", Courier, Georgia, Times, "Times New Roman", serif;
    margin-bottom: 0px;
}

h2 {
    margin-top: 0px;
}

p {
    margin-top: 0px;
    margin-bottom: 10px;
    
    line-height: 40px;
    /* Alternative method */
    line-height: 1; /* can also use line-height: 2, 1.5, 1.25, etc. 
        This method is better as the spacing is automatically adjusted if font size is changed. */
    
    font-size: 25px;
    font-style: normal; /* can also use font-style: italic/oblique */
    font-weight: normal; /* can also use
        - bold: makes the font bold
        - light: makes the font light
        - bolder: makes the font one level bolder (if light, then normal, not bold)
        - lighter: makes the font one level lighter (if bold, then normal, not light) */
    text-align: left; /* can also use 
        - center
        - right
        - justify (don't use this as it does not look very good) */
    text-decoration: none; /* can also use
        - underline
        - line-through 
        - overline */
    text-transform: none; /* can also use
        - uppercase
        - lowercase
        - capitalize (uppercase first letter of every word - like title() method in python) */
}
```

## Video 15 (1-Nov-2023)
- Styling links
    - Using states (order matters)
        1. link
        2. visited
        3. hover
        4. focus
        5. active
```HTML
```
```CSS
/* can use either a or a:link state */
a:link {
    color: green;
    text-decoration: none;
}

a:visited {
    color: violet;
}

/* same css snippet shared by a:hover and a:focus
    which means if the state is either hover or focus
    they will get the same CSS style */
a:hover, a:focus {
    color: red;
    font-size: 30px;
    font-family: sans-serif;
}

a:active {
    color: blue;
}
```

## Video 16 (1-Nov-2023)
- The bottom or lower elements always get highest priority
```HTML
```
```CSS
p, h1 /* target both p and h1 elements */
{
    color: blue;
}

.body-text {
    backgroound-color: #4287f5;
    padding: 50px;
}

.body-text p /* target all p elements inside body-text class */
{
    font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
    color: white;
}

.body-text a /* target all a elements inside body-text class */
{
    color: violet !important; /* !important is used to make the CSS code the most important
        and override the other CSS codes */
    color: red; /* will have no effect due to the previous line (probably) */
}

.body-text a:hover /* target all a elements (state = hover) inside body-text class */
{
    color: pink;
}

```

## Video 17 (1-Nov-2023)
- Lists
    - Ordered Lists
    - Unordered Lists
```HTML
<ol> <!-- This is an ordered list -->
    <li>Item 1</li>
    <li>Item 2</li>
    <li>Item 3</li>
    <li>Item 4</li>
</ol>

<ul> <!-- This is an unordered list -->
    <li>Item 1</li>
    <li>Item 2</li>
    <li>Item 3</li>
    <li>Item 4</li>
</ul>
```
```CSS
ol {
    list-style-type: circle; /* will make the style circle, i.e., it will become unordered 
        can also use:
        - upper-roman - will make the style uppercase roman numerals
        - lower-roman - will make the style lowercase roman numerals
        - upper-alpha - will make the style uppercase english alphabets
        - lower-alpha - will make the style lowercase english alphabets */

    list-style-position: inside; /* can also be outside (default in chrome - probably) 
        this is specially useful when text-alignment is center/right */
}

ul {
    background-color: pink;
    padding: 50px;

    list-style-type: none; /* will remove the style of the bullet-points/numbers
        can also use:
        - disk: will make the style disk (default)
        - square: will make the style square */
    
    list-style-image: url(../images/icon1.png); /* must make sure the image is small 
        as it uses the same size as the image for the bullet-point */
}

ul li /* li elements inside the ul element */
{
    background-color: white;
    margin: 5px;
}

ol li {
    color: white;
    background-color: blue;
    margin-bottom: 10px;
}
```

## Video 18 (2-Nov-2023)
- float and clear
```HTML
```
```CSS
.box {
    float: left/right/none;
    clear: left/right/both/none;
}
```

## Video 19 (2-Nov-2023)
- CSS colors
    - hex
    - rgb
    - hsl
- transparency or opacity
```HTML
```
```CSS
.box {
    background: #FF0000; /* hex: red color */
    background: #FF0000FF; /* hex: red color, last 2 FF stands for 100% opacity */
    background: rgb(255, 0, 0); /* rgb: red color */
    background: rgba(255, 0, 0, 0.3); /* rgba: red color, 30% opacity or 70% transparent */
    background: rgba(255, 0, 0, 1); /* rgba: red color, 100% opacity or 0% transparent */
    background: hsl(360, 100%, 50%); /* hsl stands for hue, saturation, and lightness.
        - hue - select the color on the color wheel - 360 for red */
        - saturation - 100% - full color, 0% - no color (gray)
        - lightness - 100% - full brightness (white), 0% - black, 50% - neutral */
    background: hsla(150, 100%, 25%, 0.5); /* a in hsla is the same as a in rgba */
    
    opacity: 0.25; /* similar to the 4th argument of rgba, the value can be from 0 to 1,
        but the difference is that it makes everything in the element including the text transparent,
        whereas rgba in background-color makes only the background transparent not the text (or anything else) */
}
```

## Video 20 (2-Nov-2023)
- Centering a div
```HTML
```
```CSS
.container {
    background: white;
    width: 70%;
    max-width: 1000px;
    
    margin: 0 auto; /* equates to:
        - margin-top: 0;
        - margin-bottom: 0;
        - margin-left: auto;
        - margin-right: auto; */
}
```

## Video 21 (2-Nov-2023)
- Do it yourself (HTML) - Later
```HTML
```
```CSS
```

## Video 22 (2-Nov-2023)
- Do it yourself (CSS) - Later
```HTML
```
```CSS
```

## FINAL VIDEO: Beginner’s guide to styling text with CSS (2-Nov-2023)
```HTML
```
```CSS
body {
    font-family: system-ui;
    font-size: 1.125rem; /* use instead of px (such as 18px), 
        can also use em, but rem is most commonly used */
    font-weight: 400; /* can also use regular, bold, light, etc.
        but it's better to use number values (100-900)
        - 400 - regular
        - 700 - bold
        - other values - more, less, or in between */
    font-style: normal;
    color: #333;
    line-height: 1.5; /* best practice: unit-less property */
}

a {
    color: green;
}
```
