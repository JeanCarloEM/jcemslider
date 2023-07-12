# [![|Solid](https://jcemslider.jcem.pro/assets/favicon/32x32.png)](https://jscemslider.jcem.pro) JCEM-Slider

JCEM-Slider is a responsive slider made in pure CSS and opensource, with additional features in pure javascript, without dependencies.
Check the online documentation and **[DEMO](http://jcemslider.jcem.pro)**.

## Features

- Pure CSS (Sass);
- Rolling transition animation;
- Fade transition animation;
- Image display in 3 different modes (standard, fitheight and cover);
- Display with or without thumbnails;
- Enabled for up to 100 images;
- Auto transition with optional pure javascript (client-side);
- Dynamic creation with optional pure javascript (client side);
- Open source under license [Mozilla Public License](https://choosealicense.com/licenses/mpl-2.0/).

## Usage

Include the css (engine):

```html
<link href="src/jcemslider.css" rel="stylesheet" />
```

Optionally include automated scrolling javascript:

```html
<script type="text/javascript" src="src/jcemslider.js"></script>
```

Optionally include dynamic creation javascript (client-side):

```html
<script type="text/javascript" src="src/jcemslidermaker.js"></script>
```

Summary HTML structure:

```html
<div class="jcemslider" data-slider="jcemlider_uid">
  <!-- navigation balls -->
  <div class="mgs">
    <!-- Items/Images -->
  </div>
  <nav class="pvnt">
    <!-- "Previous" and "next" navigation arrow. -->
  </nav>
  <nav class="seletor">
    <!-- Thumbnails -->
  </nav>
</div>
```

For complete information, see documentation/online **[demo](http://jcemslider.jcem.pro)**.

## License

Code is licensed under [Mozilla Public License]('https://choosealicense.com/licenses/mpl-2.0/).
