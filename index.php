<?php
$text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean hendrerit condimentum odio et porttitor. Integer congue arcu sed sagittis sodales. Praesent nec tincidunt velit. Ut finibus pellentesque velit, quis eleifend nisi venenatis et. Praesent non magna a tellus vehicula condimentum vel non sem. Sed non eleifend massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tellus tortor, facilisis quis mauris vel, facilisis bibendum justo. Aenean quis malesuada nibh. ";

$items = [
    [
        "url" => 'assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOk5hdHVyZS1WaWV3LmpwZw==.jpg',
        "title" => 'My Photo 1',
        "content_html" => $text
    ],
    [
        "url" => 'assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOllvc2VtaXRlX25hdGlvbmFsX3BhcmtfbGFrZV9yb2Nrc19tb3VudGFpbnNfYXV0dW1uX25hdHVyZS5qcGc=.jpg',
        "title" => 'My Photo 2',
        "content_html" => $text
    ],
    [
        "url" => 'assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy8zLzNhL0VsX1BhcnJpc2FsXy1fcGFub3JhbWlvLmpwZw==.jpg',
        "title" => 'My Photo 3',
        "content_html" => $text
    ],
    [
        "url" => 'assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy81LzVkL1BpY2tldHQtYXJjaC1sYWtlLXRuMS5qcGc=.jpg',
        "title" => 'My Photo 4',
        "content_html" => $text
    ]
];

/*
 * CRIA O JCEM-SLIDER
 */

function jcemslider($entranda, array $class = [], array $args = [], $size = null, $div_size = null) {
  $inputs = '';
  $prev_next = '';
  $imgs = '';
  $miniaturas = '';

  $props = '';
  foreach ($args as $key => $value) {
    $props .= " $key='$value'";
  }

  $cls = \implode(' ', $class ?? []);


  /* NOME DO GRUPO DE INPUT RADIOS */
  $slider = 'jcemslider_' . strtolower(hash('sha1', \random_bytes(24)));

  foreach ($entranda[0] as $key => &$value) {
    /* ID DO INPUT */
    $input_id = 'jcemslider_' . strtolower(hash('sha1', \random_bytes(24)));

    /*
     * INPUTS
     */
    $inputs .= "<input type='radio' id='$input_id' class='sldtxt' name='$slider' ndc='$key'" . ($key === 0 ? ' checked ' : '') . "/>";

    /*
     * ARTIGOS / IMAGENS
     */
    $imgs .= <<<EOF
<!-- START :: ITEM SLIDER -->
<a class='qdr' ndc='$key'>
  <div class='mgi' style='background-image: url("{$value['url']}") !important;'>
    <img src='{$value['url']}' />
  </div>
  <div class='cnt'>
    <div class='ttl'>{$value['title']}</div>
    <div class='text'>{$value['content_html']}</div>
  </div>
</a>
<!-- END :: ITEM SLIDER -->
EOF;

    /*
     * BOTOES PREV E NEXT
     */
    $prev_next .= "<label for='$input_id' class='pvnt fas' ndc='$key'></label>";

    /*
     * SELETOR / MINIATURAS
     */
    $miniaturas .= <<<EOF
  <label for='$input_id' ndc='$key' style="background-image: url('{$value['url']}');">
    <img src='{$value['url']}' />
  </label>
EOF;
  }

  $size = $size ? " style='height: $size !important;'" : '';
  $div_size = $div_size ? " style='height: $div_size !important;'" : '';

  return <<<EOF



 <!-- START :: SLIDER -->

<div data-slider='slider1' class='jcemslider $cls' $props$div_size>

  <!-- START :: INPUTS -->
  $inputs
  <!-- END :: INPUTS -->

  <!-- START :: IMAGENS -->
  <div class='mgs'$size>
    $imgs
  </div>
  <!-- END :: IMAGENS -->

  <!-- START :: BTB PREV E NEXT -->
  <nav class='pvnt'>
    $prev_next
  </nav>
  <!-- END :: BTB PREV E NEXT -->

  <!-- START :: BTB PREV E NEXT -->
  <nav class='seletor'>
    $miniaturas
  </nav>
  <!-- END :: BTB PREV E NEXT -->

</div>

<!-- END :: SLIDER -->


EOF;
}
?><!DOCTYPE html>
<html lang="pt-BR" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" itemscope itemtype="http://schema.org/Blog">
  <head>
    <!-- START - Open Graph for Facebook, Google+ and Twitter Card Tags 2.2.4.2 -->
    <!-- Facebook / OG -->
    <meta property='og:title' content='JCEM Slider' />
    <meta property='og:url' content='https://blog.jeancarloem.com/jcemslider/' />
    <meta property='og:description' content='JCEM-Slider é um slider responsivo feito em puro CSS e opensource, com recursos adicionais em puro javascript.' />
    <meta property='og:site_name ' content='Jean Carlo EM' />
    <meta property='og:image' content='assets/img/banner.png' />
    <meta property='og:type' content='article' />
    <meta property='article:published_time' content='2014-04-16T00:55:57+00:00' />
    <meta property='article:modified_time' content='2019-02-10T23:18:21+00:00' />
    <meta property='article:tag' content='develop css javascript slide slider responsive' />
    <meta property='article:author' content='' />
    <!-- Google+ / Schema.org -->
    <meta itemprop='name' content='JCEM Slider' />
    <meta itemprop='headline' content='JCEM Slider' />
    <meta itemprop='url' content='https://lab.jeancarloem.com/jcemslider/' />
    <meta itemprop='description' content='JCEM-Slider é um slider responsivo feito em puro CSS e opensource, com recursos adicionais em puro javascript.' />
    <meta itemprop='image' content='assets/img/banner.png'/>
    <meta itemprop='datePublished' content='2014-04-16T00:55:57+00:00' />
    <meta itemprop='dateModified' content='2019-02-10T23:18:21+00:00' />
    <meta itemprop='author' content='' />
    <!--Twitter CARDs -->
    <meta name = 'twitter:title' content='JCEM Slider' />
    <meta name = 'twitter:url' content='https://blog.jeancarloem.com/jcemslider/' />
    <meta name = 'twitter:image' content='assets/img/banner.png' />
    <meta name = 'twitter:description' content='JCEM-Slider é um slider responsivo feito em puro CSS e opensource, com recursos adicionais em puro javascript.' />
    <meta name = 'twitter:card' content='summary_large_image' />
    <!-- SEO -->
    <meta name = 'description' content='JCEM-Slider é um slider responsivo feito em puro CSS e opensource, com recursos adicionais em puro javascript.' />
    <meta name = 'publisher' content='' />
    <meta name='author' content='' />
    <link rel='canonical' href='https://blog.jeancarloem.com/jcemslider/' />
    <!--END - Open Graph for Facebook, Google+ and Twitter Card Tags 2.2.4.2 -->

    <!-- START - ICONES -->
    <meta name='apple-mobile-web-app-title' content='Jean Carlo EM'>
    <meta name='application-name' content='Jean Carlo EM'>
    <meta name='msapplication-TileColor' content='#1d1d1d'>
    <meta name='theme-color' content='#1d1d1d'>
    <link rel='apple-touch-icon' sizes='180x180' href='assets/favicon/180x180.png'>
    <link rel='icon' type='image/png' sizes='512x512' href='assets/favicon/512x512.png'>
    <link rel='icon' type='image/png' sizes='256x256' href='assets/favicon/256x256.png'>
    <link rel='icon' type='image/png' sizes='32x32' href='assets/favicon/32x32.png'>
    <link rel='icon' type='image/png' sizes='16x16' href='assets/favicon/16x16.png'>
    <link rel='manifest' href='assets/favicon/site.webmanifest'>
    <link rel='mask-icon' href='assets/favicon/safari-pinned-tab.svg' color='#1d1d1d'>
    <meta name='msapplication-TileImage' content='assets/favicon/144x144.png'>
    <meta name='msapplication-config' content='assets/favicon/browserconfig.xml' />
    <!--[if IE]><link rel="shortcut icon" href="assets/favicon/favicon.ico"><![endif]-->

    <!-- END - ICONES -->
    <title>JCEM Slider | Jean Carlo EM</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSS PRINCIPAL -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css' crossorigin='anonymous' />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet" />
    <link href="https://blog.jeancarloem.com/wp-content/themes/STiny/assets/css/main.css" rel="stylesheet" />
    <link href="https://blog.jeancarloem.com/wp-content/themes/STiny/assets/css/header.css" rel="stylesheet" />
    <link href="src/jcemslider.css" rel="stylesheet" />

    <!-- JQUERY -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- SLIDER -->
    <script type="text/javascript" src="src/jcemslider.js"></script>

    <!-- CONTGROLES DO TEMA -->
    <script type="text/javascript" src="assets/js/main.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-49730626-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'UA-49730626-3');
    </script>

    <style>
      body > div.pagebody{
        display: none;
      }

      div > table tr > td{
        border-color: transparent !important;
      }

      article{
        background: transparent !important;
        padding: 0 !important;
        padding-top: 3.5em !important;
        border: none !important;
        box-shadow: none !important;
      }

      div.get{
        display: block;
        text-align: center !important;
        padding: 1em .5em;
      }

      div.get > a.get{
        padding: 1.5em 2em;
        display: inline-block;
        margin: .1em;
        background: #293a41;
        color: #fff;
        font-weight: bold;
        border-radius: .8em;
        text-decoration: none;
        text-shadow: 0 0 1.5em rgba(0,0,0,.3);
      }

      div > a.get:hover{
        background: #00f6ff;
        color: #111;
      }
    </style>
  </head>

  <body class="post-template-default single single-post postid-223 single-format-standard">
    <div id='carregandoPagina' class='carregandoPagina' style="display: block; width: 48px; height: 48px; padding: 0; margin: 0; position: fixed; top: 50%; left: 50%; margin-top: -24px; margin-left: -24px; background-image: url('data:image/gif;base64,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');"></div>

    <section class="body pagebody thumb_overload imagem_macro macro_fit" style='display: none;'>
      <header class="first fixed">
        <div class="colunabarra icon">

          <a class='nosimbol' href="https://blog.jeancarloem.com"><img src="http://jeancarloem.com/favicon/logo.png" alt="Logo" class="mainlogo" style='height: 5em; margin-top: -1em; max-height: initial !important;' /></a>

          <div class='ico menu'><div class='fa'></div></div>
          <div class="ico follow"><div class="fas fa-caret-down before"></div></div>
          <div class='ico topo'><a href="#topo" class="social fas fa-arrow-up topo"></a></div>
          <ul class="social">
            <li><a href='https://jeancarloem.com' target='_blank' class='social aboutme'><span>Aboutme</span></a></li>
            <li><a href='https://github.com/jeancarloem' target='_blank' class='social github'><span>Github</span></a></li>
          </ul>
        </div>
      </header>

      <nav class="search">
        <div class="colunabarra">
          <form method="get" action='https://blog.jeancarloem.com/' accept-charset='utf-8'>
            <div class="igroup">
              <input name="s" id='d' placeholder="Insira as palavras-chave aqui" type="text" />
              <span>
                <button type="submit">Buscar</button>
              </span>
            </div>
          </form>
        </div>
      </nav>

      <header class="third thumb fitheight" style='height: 45% !important;'><div class="thumbnail"><div class='thumb fitheight' style="background-image: url('assets/img/cover.png') !important;"></div>  </div></header>
      <div class="wrapper colunabarra">

        <section class="inner wrapper">      <section class='artigos'>
            <!-- ARTIGO INTEIRO -->
            <article class="post">
              <header></header>

              <!-- CONTEUDO -->
              <div class="content"><br />
                <strong>JCEM-Slider</strong> é um Slider Responsivo feito em puro CSS e opensource com recursos adicionais em puro javascript!
                <div class='get'><a class='get' href='https://github.com/JeanCarloEM/jcemslider' target='_blanck'>Baixe no github</a></div>
                <br />

                <h2>Recursos</h2>

                <ul style='margin-left: 2em;'>
                  <li>Puro CSS (Sass);</li>
                  <li>Animação de transição de rolamento;</li>
                  <li>Animação de transição fade;</li>
                  <li>Exibição de imagem em 3 modos diferentes <i>(padrão, fitheight e cover)</i>;</li>
                  <li>Exibição com ou sem miniaturas;</li>
                  <li>Habilitado para até 100 imagens;</li>
                  <li>Transição automática com javascript puro <i>(opicional)</i>;</li>
                  <li>Opensource sob licença <a href='https://choosealicense.com/licenses/mpl-2.0/' targe='_blanck'>Mozilla Public License</a>.</li>
                </ul>

                <h2>Cheio</h2>

                <p>A exibição "cheia", significa que as imagens ocuparão toda a largura ou toda a altura do slide. Existem 3 modos, sendos eles o <b>padrão</b>, em que a imagem é exibida na sua proporção original preenchendo a largura total; o <b>fitheight</b> em que as imagens são exibidas numa altura predeterminada, e sua largura é proporcional; e finalmente, o modo <b>cover</b> em que a imagem preenche todo o quadro, centralizada verticalmente e horizontalmente. Em alguns casos, pode ser imperceptível a diferença entre o cover e fitheight.</p>

                <h3>Padrão</h3>

                <?php
                echo jcemslider([$items]);
                ?>

                <br />
                <p>Neste modo as imagens são mostradas em seu tamanho proporcional, largura de 100% do espaço disponível e altura proporcional. Para este caso, utiliza o esquema HTML sem qualquer modificação.</p>



                <h3>Altura Fixa</h3>

                <?php
                echo jcemslider([$items], [], ['height' => ''], '240px');
                ?>

                <br />
                <p>Como já especificado, neste modelo, a imagem tem altura fixada e a sua largura é proporcionalmente mantida. Ideal para imagens largas, como a <a href='https://blog.jeancarloem.com/devaneios' target='blank'>desta página</a>.</p>

                <p>Para configurar desta maneira é necessário adicionar a propriedade <b>height</b> ao <i>div</i> principal e especificar a altura na propriedade subpropriedade <i>height</i> de <b><i>style</i></b>, da seguinde maneira:</p>
                <br />

                <!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1
2
3
4
5</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;div</span>  <span style="color: #0000CC">js=</span><span style="background-color: #fff0f0">&#39;true&#39;</span> <span style="color: #0000CC">data-slider=</span><span style="background-color: #fff0f0">&#39;slider3&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;jcemslider&#39;</span> <span style="color: #0000CC">height</span><span style="color: #007700">&gt;</span>
  <span style="color: #007700">&lt;input</span> <span style="color: #0000CC">type=</span><span style="background-color: #fff0f0">&#39;radio&#39;</span> <span style="color: #0000CC">id=</span><span style="background-color: #fff0f0">&#39;slider3_img1&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;sldtxt&#39;</span> <span style="color: #0000CC">name=</span><span style="background-color: #fff0f0">&#39;slider3&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;0&#39;</span> <span style="color: #0000CC">checked</span> <span style="color: #007700">/&gt;</span>
  <span style="color: #007700">&lt;input</span> <span style="color: #0000CC">type=</span><span style="background-color: #fff0f0">&#39;radio&#39;</span> <span style="color: #0000CC">id=</span><span style="background-color: #fff0f0">&#39;slider3_img2&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;sldtxt&#39;</span> <span style="color: #0000CC">name=</span><span style="background-color: #fff0f0">&#39;slider3&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;1&#39;</span> <span style="color: #007700">/&gt;</span>

  <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;mgs&#39;</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&#39;height: 240px !important;&#39;</span><span style="color: #007700">&gt;</span>
</pre></td></tr></table></div>


<br />



                  <h3>Cover</h3>
                <?php
                echo jcemslider([$items], ['cover'], ['height' => ''], '240px');
                ?>
<br />
                  <p>Neste tipo de slide, as imagens são mostradas em seu tamanho proporcional, porem ocupando todo o quadro, centralizada vertical e horizontalmente. A única diferença de configuração em relação ao modo <b>fitheight</b> é que o <i>div</i> principal deve possuir a classe <b>cover</b>. Todo o resto é igual, inclusive a definição do tamanho na propriedade <b>style</b>:</p><br />

<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1
2
3
4
5</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;div</span>  <span style="color: #0000CC">js=</span><span style="background-color: #fff0f0">&#39;true&#39;</span> <span style="color: #0000CC">data-slider=</span><span style="background-color: #fff0f0">&#39;slider3&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;jcemslider cover&#39;</span> <span style="color: #0000CC">height</span><span style="color: #007700">&gt;</span>
  <span style="color: #007700">&lt;input</span> <span style="color: #0000CC">type=</span><span style="background-color: #fff0f0">&#39;radio&#39;</span> <span style="color: #0000CC">id=</span><span style="background-color: #fff0f0">&#39;slider3_img1&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;sldtxt&#39;</span> <span style="color: #0000CC">name=</span><span style="background-color: #fff0f0">&#39;slider3&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;0&#39;</span> <span style="color: #0000CC">checked</span> <span style="color: #007700">/&gt;</span>
  <span style="color: #007700">&lt;input</span> <span style="color: #0000CC">type=</span><span style="background-color: #fff0f0">&#39;radio&#39;</span> <span style="color: #0000CC">id=</span><span style="background-color: #fff0f0">&#39;slider3_img2&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;sldtxt&#39;</span> <span style="color: #0000CC">name=</span><span style="background-color: #fff0f0">&#39;slider3&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;1&#39;</span> <span style="color: #007700">/&gt;</span>

  <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;mgs&#39;</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&#39;height: 240px !important;&#39;</span><span style="color: #007700">&gt;</span>
</pre></td></tr></table></div>

<br />

                  <h2>Com Miniaturas</h2>

                  <p>Também é possível as mesmas configurações anteriormente informadas, porém exibindo a miniatura. Neste caso, basta adicionar a classe <i>miniatura</i> ao div principal:</p>


                  <h3>Padrão com Miniatura</h3>
                  <br />
                <?php
                echo jcemslider([$items], ['miniatura']);
                ?>

                  <br />
                  <!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;div</span>  <span style="color: #0000CC">js=</span><span style="background-color: #fff0f0">&#39;true&#39;</span> <span style="color: #0000CC">data-slider=</span><span style="background-color: #fff0f0">&#39;slider2&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;jcemslider miniatura&#39;</span><span style="color: #007700">&gt;</span>
</pre></td></tr></table></div>
<br />



                  <h3>Altura Fixa com Miniatura</h3>
                  <!--
                  START :: SLIDER
                  TAMANHO PROPORTCIONAL MINIATURA
                  -->
                <?php
                echo jcemslider([$items], ['miniatura'], ['height' => ''], '240px');
                ?>

<br />

<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;div</span>  <span style="color: #0000CC">js=</span><span style="background-color: #fff0f0">&#39;true&#39;</span> <span style="color: #0000CC">data-slider=</span><span style="background-color: #fff0f0">&#39;slider4&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;jcemslider miniatura&#39;</span> <span style="color: #0000CC">height</span><span style="color: #007700">&gt;</span>
</pre></td></tr></table></div>


<br />




                  <h3>Cover com Miniatura</h3>
                  <br />
                <?php
                echo jcemslider([$items], ['miniatura', 'cover'], ['height' => ''], '240px');
                ?>

                  <br />

<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;div</span>  <span style="color: #0000CC">js=</span><span style="background-color: #fff0f0">&#39;true&#39;</span> <span style="color: #0000CC">data-slider=</span><span style="background-color: #fff0f0">&#39;slider6&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;jcemslider miniatura cover&#39;</span> <span style="color: #0000CC">height</span><span style="color: #007700">&gt;</span>
</pre></td></tr></table></div>

<br />


                  <h2>Efeito Fade</h2>
                <?php
                echo jcemslider([$items], ['cover', 'fade'], ['height' => ''], '240px');
                ?>


                  <br />
<p>Em qualquer dos modos acima, é possível optar pela transição fade, bastando para isso, adicionar a classse <b>fade</b> ao <i>div</i> principal, como se segue:</p>
<br />

<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #333333">&lt;</span>div js<span style="color: #333333">=</span><span style="background-color: #fff0f0">&#39;true&#39;</span> data<span style="color: #333333">-</span>slider<span style="color: #333333">=</span><span style="background-color: #fff0f0">&#39;slider5&#39;</span> <span style="color: #008800; font-weight: bold">class</span><span style="color: #333333">=</span><span style="background-color: #fff0f0">&#39;jcemslider cover fade&#39;</span> height<span style="color: #333333">&gt;</span>
</pre></td></tr></table></div>

<br />
                  <h2>Posição da Navegação</h2>
                <?php
                echo jcemslider([$items], ['cover', 'topnav'], ["height" => ''], '240px');
                ?>

                  <br />
<p>É possível exibir as bolinhas de navegação na parte superior adicionando a classe <b>topnav</b> ao <i>div</i> principal:</p>
<br />

<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;div</span> <span style="color: #0000CC">data-slider=</span><span style="background-color: #fff0f0">&#39;slider6a&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;jcemslider cover topnav&#39;</span> <span style="color: #0000CC">height</span><span style="color: #007700">&gt;</span>
</pre></td></tr></table></div>


<br />


                  <h2>Miniaturas Laterais</h2>
                <?php
                echo jcemslider([$items], ['miniatura', 'cover', 'topnav', 'leftnav'], ["height" => ''], null, '240px');
                ?>

<br />
<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;div</span> <span style="color: #0000CC">data-slider=</span><span style="background-color: #fff0f0">&#39;slider6b&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;jcemslider cover leftnav&#39;</span> <span style="color: #0000CC">height</span><span style="color: #007700">&gt;</span>
</pre></td></tr></table></div>
                  <br />


                <?php
                echo jcemslider([$items], ['miniatura', 'cover', 'topnav', 'rightnav'], ["height" => ''], null, '240px');
                ?>

                  <br />
<p>É possível exibir as miniaturas lateralmente, basta aplicar a classe <b>leftnav</b> ou <b>righttnav</b> ao <i>div</i> principal:</p>
<br />

<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;div</span> <span style="color: #0000CC">data-slider=</span><span style="background-color: #fff0f0">&#39;slider6c&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;jcemslider miniatura cover rightnav&#39;</span> <span style="color: #0000CC">height</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&#39;height: 240px !important;&#39;</span><span style="color: #007700">&gt;</span>
</pre></td></tr></table></div>
<br />
<p><strong>Importante</strong>: Neste caso, a subpropriedade <strong>height</strong> de <i>style</i> NÃO deve ser colocada no elemento <i>.mgs</i>, mas no elemento principal <i>div</i>.</p>

<br />


                  <h2>Automatização com Javascript</h2>
                <?php
                echo jcemslider([$items], ['cover'], ['js' => 'true', "height" => ''], '240px');
                ?>

                  <br />
<p>Junto com o pacote é incluso um pequeno e puro javascript, que permite a passagem automática das imagens. Para habilitar basta incluir o javascript e adicionar a propriedade <b>js</b> ao <i>div</i> principal, como se segue:</p>
<br />

<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1
2</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;script </span><span style="color: #0000CC">type=</span><span style="background-color: #fff0f0">&quot;text/javascript&quot;</span> <span style="color: #0000CC">src=</span><span style="background-color: #fff0f0">&quot;src/jcemslider.min.js&quot;</span><span style="color: #007700">&gt;&lt;/script&gt;</span>
<span style="color: #007700">&lt;div</span> <span style="color: #0000CC">js=</span><span style="background-color: #fff0f0">&#39;1&#39;</span> <span style="color: #0000CC">data-slider=</span><span style="background-color: #fff0f0">&#39;slider5&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;jcemslider cover&#39;</span> <span style="color: #0000CC">height</span><span style="color: #007700">&gt;</span>
</pre></td></tr></table></div>

<br />

<p>Também é possivel especificar na propriedade <b>js</b> os milisegundos da transição de imagens, bastando para isso colocar algum valor numérico, com exemplo abaixo:</p><br />

<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #333333">&lt;</span>div js<span style="color: #333333">=</span><span style="background-color: #fff0f0">&#39;3000&#39;</span> data<span style="color: #333333">-</span>slider<span style="color: #333333">=</span><span style="background-color: #fff0f0">&#39;slider5&#39;</span> <span style="color: #008800; font-weight: bold">class</span><span style="color: #333333">=</span><span style="background-color: #fff0f0">&#39;jcemslider cover&#39;</span> height<span style="color: #333333">&gt;</span>
</pre></td></tr></table></div>


<br />

<p>É possível também iniciar um slider manualmente via javascript, inclusive especificando o tempo de transição, conforme o seguinte código:</p><br />

<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1</pre></td><td><pre style="margin: 0; line-height: 125%">jcemslider(<span style="color: #007020">document</span>.querySelectorAll(<span style="background-color: #fff0f0">&#39;div.jcemslider[data-slider][js]&#39;</span>), <span style="color: #0000DD; font-weight: bold">3000</span>);
</pre></td></tr></table></div>

<br />

                  <h2>Código</h2>

                <br />
                <p>Basicamente todas as configurações são definidas no <strong>div</strong> principal:</p><br />

<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;div</span>  <span style="color: #0000CC">js=</span><span style="background-color: #fff0f0">&#39;true&#39;</span> <span style="color: #0000CC">data-slider=</span><span style="background-color: #fff0f0">&#39;slider1&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;jcemslider&#39;</span><span style="color: #007700">&gt;</span>
</pre></td></tr></table></div><br />

<p>Apenas a altura máxima, para os casos em que desejar que as imagens sejam exibidas em modo <i>cover</i> ou em <i>fitheight</i> será necessário especificar o tamanho no elemento <i>.mgs</i>:</p><br />

<!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%">1</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;mgs&#39;</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&#39;height: 240px !important;&#39;</span><span style="color: #007700">&gt;</span>
</pre></td></tr></table></div><br />

<p>Maiores informações podem ser obtidas olhando o código fonte disponível no <a href='https://github.com/JeanCarloEM/jcemslider' target='_blank'>github</a>.</p>

                  <h2>Esquema HTML</h2>

                  <div>
                    <!-- HTML generated using hilite.me --><div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><table><tr><td><pre style="margin: 0; line-height: 125%"> 1
 2
 3
 4
 5
 6
 7
 8
 9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79</pre></td><td><pre style="margin: 0; line-height: 125%"><span style="color: #007700">&lt;div</span>  <span style="color: #0000CC">js=</span><span style="background-color: #fff0f0">&#39;true&#39;</span> <span style="color: #0000CC">data-slider=</span><span style="background-color: #fff0f0">&#39;slider1&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;jcemslider&#39;</span><span style="color: #007700">&gt;</span>
  <span style="color: #007700">&lt;input</span> <span style="color: #0000CC">type=</span><span style="background-color: #fff0f0">&#39;radio&#39;</span> <span style="color: #0000CC">id=</span><span style="background-color: #fff0f0">&#39;slider1_img1&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;sldtxt&#39;</span> <span style="color: #0000CC">name=</span><span style="background-color: #fff0f0">&#39;slider1_slider1&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;0&#39;</span> <span style="color: #0000CC">checked</span> <span style="color: #007700">/&gt;</span>
  <span style="color: #007700">&lt;input</span> <span style="color: #0000CC">type=</span><span style="background-color: #fff0f0">&#39;radio&#39;</span> <span style="color: #0000CC">id=</span><span style="background-color: #fff0f0">&#39;slider1_img2&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;sldtxt&#39;</span> <span style="color: #0000CC">name=</span><span style="background-color: #fff0f0">&#39;slider1_slider1&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;1&#39;</span> <span style="color: #007700">/&gt;</span>
  <span style="color: #007700">&lt;input</span> <span style="color: #0000CC">type=</span><span style="background-color: #fff0f0">&#39;radio&#39;</span> <span style="color: #0000CC">id=</span><span style="background-color: #fff0f0">&#39;slider1_img3&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;sldtxt&#39;</span> <span style="color: #0000CC">name=</span><span style="background-color: #fff0f0">&#39;slider1_slider1&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;2&#39;</span> <span style="color: #007700">/&gt;</span>
  <span style="color: #007700">&lt;input</span> <span style="color: #0000CC">type=</span><span style="background-color: #fff0f0">&#39;radio&#39;</span> <span style="color: #0000CC">id=</span><span style="background-color: #fff0f0">&#39;slider1_img4&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;sldtxt&#39;</span> <span style="color: #0000CC">name=</span><span style="background-color: #fff0f0">&#39;slider1_slider1&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;3&#39;</span> <span style="color: #007700">/&gt;</span>

  <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;mgs&#39;</span><span style="color: #007700">&gt;</span>
    <span style="color: #007700">&lt;a</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;qdr&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;0&#39;</span><span style="color: #007700">&gt;</span>
      <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;mgi&#39;</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&#39;background-image: url(&quot;assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOk5hdHVyZS1WaWV3LmpwZw==.jpg&quot;) !important;&#39;</span><span style="color: #007700">&gt;</span>
        <span style="color: #007700">&lt;img</span> <span style="color: #0000CC">src=</span><span style="background-color: #fff0f0">&#39;assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOk5hdHVyZS1WaWV3LmpwZw==.jpg&#39;</span> <span style="color: #007700">/&gt;&lt;/div&gt;</span>
      <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;cnt&#39;</span><span style="color: #007700">&gt;</span>
        <span style="color: #007700">&lt;h3</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;ttl&#39;</span><span style="color: #007700">&gt;</span>My Photo 1<span style="color: #007700">&lt;/h3&gt;</span>
        <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;text&#39;</span><span style="color: #007700">&gt;</span>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...
        <span style="color: #007700">&lt;/div&gt;</span>

      <span style="color: #007700">&lt;/div&gt;</span>
    <span style="color: #007700">&lt;/a&gt;</span>

    <span style="color: #007700">&lt;a</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;qdr&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;1&#39;</span><span style="color: #007700">&gt;</span>
      <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;mgi&#39;</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&#39;background-image: url(&quot;assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOllvc2VtaXRlX25hdGlvbmFsX3BhcmtfbGFrZV9yb2Nrc19tb3VudGFpbnNfYXV0dW1uX25hdHVyZS5qcGc=.jpg&quot;) !important;&#39;</span><span style="color: #007700">&gt;</span>
        <span style="color: #007700">&lt;img</span> <span style="color: #0000CC">src=</span><span style="background-color: #fff0f0">&#39;assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOllvc2VtaXRlX25hdGlvbmFsX3BhcmtfbGFrZV9yb2Nrc19tb3VudGFpbnNfYXV0dW1uX25hdHVyZS5qcGc=.jpg&#39;</span> <span style="color: #007700">/&gt;&lt;/div&gt;</span>
      <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;cnt&#39;</span><span style="color: #007700">&gt;</span>
        <span style="color: #007700">&lt;h3</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;ttl&#39;</span><span style="color: #007700">&gt;</span>My Photo 2<span style="color: #007700">&lt;/h3&gt;</span>
        <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;text&#39;</span><span style="color: #007700">&gt;</span>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...
        <span style="color: #007700">&lt;/div&gt;</span>

      <span style="color: #007700">&lt;/div&gt;</span>
    <span style="color: #007700">&lt;/a&gt;</span>

    <span style="color: #007700">&lt;a</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;qdr&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;2&#39;</span><span style="color: #007700">&gt;</span>
      <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;mgi&#39;</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&#39;background-image: url(&quot;assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy8zLzNhL0VsX1BhcnJpc2FsXy1fcGFub3JhbWlvLmpwZw==.jpg&quot;) !important;&#39;</span><span style="color: #007700">&gt;</span>
        <span style="color: #007700">&lt;img</span> <span style="color: #0000CC">src=</span><span style="background-color: #fff0f0">&#39;assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy8zLzNhL0VsX1BhcnJpc2FsXy1fcGFub3JhbWlvLmpwZw==.jpg&#39;</span> <span style="color: #007700">/&gt;&lt;/div&gt;</span>
      <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;cnt&#39;</span><span style="color: #007700">&gt;</span>
        <span style="color: #007700">&lt;h3</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;ttl&#39;</span><span style="color: #007700">&gt;</span>My Photo 3<span style="color: #007700">&lt;/h3&gt;</span>
        <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;text&#39;</span><span style="color: #007700">&gt;</span>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...
        <span style="color: #007700">&lt;/div&gt;</span>

      <span style="color: #007700">&lt;/div&gt;</span>
    <span style="color: #007700">&lt;/a&gt;</span>

    <span style="color: #007700">&lt;a</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;qdr&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;3&#39;</span><span style="color: #007700">&gt;</span>
      <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;mgi&#39;</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&#39;background-image: url(&quot;assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy81LzVkL1BpY2tldHQtYXJjaC1sYWtlLXRuMS5qcGc=.jpg&quot;) !important;&#39;</span><span style="color: #007700">&gt;</span>
        <span style="color: #007700">&lt;img</span> <span style="color: #0000CC">src=</span><span style="background-color: #fff0f0">&#39;assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy81LzVkL1BpY2tldHQtYXJjaC1sYWtlLXRuMS5qcGc=.jpg&#39;</span> <span style="color: #007700">/&gt;&lt;/div&gt;</span>
      <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;cnt&#39;</span><span style="color: #007700">&gt;</span>
        <span style="color: #007700">&lt;h3</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;ttl&#39;</span><span style="color: #007700">&gt;</span>My Photo 4<span style="color: #007700">&lt;/h3&gt;</span>
        <span style="color: #007700">&lt;div</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;text&#39;</span><span style="color: #007700">&gt;</span>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...
        <span style="color: #007700">&lt;/div&gt;</span>

      <span style="color: #007700">&lt;/div&gt;</span>
    <span style="color: #007700">&lt;/a&gt;</span>

  <span style="color: #007700">&lt;/div&gt;</span>

  <span style="color: #007700">&lt;nav</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;pvnt&#39;</span><span style="color: #007700">&gt;</span>
    <span style="color: #007700">&lt;label</span> <span style="color: #0000CC">for=</span><span style="background-color: #fff0f0">&#39;slider1_img1&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;pvnt fas&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;0&#39;</span><span style="color: #007700">&gt;&lt;/label&gt;</span>
    <span style="color: #007700">&lt;label</span> <span style="color: #0000CC">for=</span><span style="background-color: #fff0f0">&#39;slider1_img2&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;pvnt fas&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;1&#39;</span><span style="color: #007700">&gt;&lt;/label&gt;</span>
    <span style="color: #007700">&lt;label</span> <span style="color: #0000CC">for=</span><span style="background-color: #fff0f0">&#39;slider1_img3&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;pvnt fas&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;2&#39;</span><span style="color: #007700">&gt;&lt;/label&gt;</span>
    <span style="color: #007700">&lt;label</span> <span style="color: #0000CC">for=</span><span style="background-color: #fff0f0">&#39;slider1_img4&#39;</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;pvnt fas&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;3&#39;</span><span style="color: #007700">&gt;&lt;/label&gt;</span>
  <span style="color: #007700">&lt;/nav&gt;</span>

  <span style="color: #007700">&lt;nav</span> <span style="color: #0000CC">class=</span><span style="background-color: #fff0f0">&#39;seletor&#39;</span><span style="color: #007700">&gt;</span>
    <span style="color: #007700">&lt;label</span> <span style="color: #0000CC">for=</span><span style="background-color: #fff0f0">&#39;slider1_img1&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;0&#39;</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&quot;background-image: url(&#39;assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOk5hdHVyZS1WaWV3LmpwZw==.jpg&#39;);&quot;</span><span style="color: #007700">&gt;</span>
      <span style="color: #007700">&lt;img</span> <span style="color: #0000CC">src=</span><span style="background-color: #fff0f0">&#39;assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOk5hdHVyZS1WaWV3LmpwZw==.jpg&#39;</span> <span style="color: #007700">/&gt;</span>
    <span style="color: #007700">&lt;/label&gt;</span>
    <span style="color: #007700">&lt;label</span> <span style="color: #0000CC">for=</span><span style="background-color: #fff0f0">&#39;slider1_img2&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;1&#39;</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&quot;background-image: url(&#39;assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOllvc2VtaXRlX25hdGlvbmFsX3BhcmtfbGFrZV9yb2Nrc19tb3VudGFpbnNfYXV0dW1uX25hdHVyZS5qcGc=.jpg&#39;);&quot;</span><span style="color: #007700">&gt;</span>
      <span style="color: #007700">&lt;img</span> <span style="color: #0000CC">src=</span><span style="background-color: #fff0f0">&#39;assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOllvc2VtaXRlX25hdGlvbmFsX3BhcmtfbGFrZV9yb2Nrc19tb3VudGFpbnNfYXV0dW1uX25hdHVyZS5qcGc=.jpg&#39;</span> <span style="color: #007700">/&gt;</span>
    <span style="color: #007700">&lt;/label&gt;</span>
    <span style="color: #007700">&lt;label</span> <span style="color: #0000CC">for=</span><span style="background-color: #fff0f0">&#39;slider1_img3&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;2&#39;</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&quot;background-image: url(&#39;assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy8zLzNhL0VsX1BhcnJpc2FsXy1fcGFub3JhbWlvLmpwZw==.jpg&#39;);&quot;</span><span style="color: #007700">&gt;</span>
      <span style="color: #007700">&lt;img</span> <span style="color: #0000CC">src=</span><span style="background-color: #fff0f0">&#39;assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy8zLzNhL0VsX1BhcnJpc2FsXy1fcGFub3JhbWlvLmpwZw==.jpg&#39;</span> <span style="color: #007700">/&gt;</span>
    <span style="color: #007700">&lt;/label&gt;</span>
    <span style="color: #007700">&lt;label</span> <span style="color: #0000CC">for=</span><span style="background-color: #fff0f0">&#39;slider1_img4&#39;</span> <span style="color: #0000CC">ndc=</span><span style="background-color: #fff0f0">&#39;3&#39;</span> <span style="color: #0000CC">style=</span><span style="background-color: #fff0f0">&quot;background-image: url(&#39;assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy81LzVkL1BpY2tldHQtYXJjaC1sYWtlLXRuMS5qcGc=.jpg&#39;);&quot;</span><span style="color: #007700">&gt;</span>
      <span style="color: #007700">&lt;img</span> <span style="color: #0000CC">src=</span><span style="background-color: #fff0f0">&#39;assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy81LzVkL1BpY2tldHQtYXJjaC1sYWtlLXRuMS5qcGc=.jpg&#39;</span> <span style="color: #007700">/&gt;</span>
    <span style="color: #007700">&lt;/label&gt;</span>
  <span style="color: #007700">&lt;/nav&gt;</span>
<span style="color: #007700">&lt;/div&gt;</span>
</pre></td></tr></table></div>

              </div>

</div>
<br />
<br />
            </article>
          </section></section>
      </div>

      <footer>
        <div class="inteiro p2">
          <div class="wrapper colunabarra">
            <side class="widget_text widget widget_custom_html">
              <div><p><big><b>ATENÇÃO</b></big>: <b>JCEM-Slider</b> está licenciado sob <big><a href='https://choosealicense.com/licenses/mpl-2.0/' target='_blanck'>Mozila Public License 2.0</a></big>. A licença padrão, linkada no rodapé deste, não se aplica aos códigos do projeto.</p><br /></div>
              <div class="textwidget custom-html-widget"><p><b>Importante:</b> Ao acessar este e qualquer site/blog presente no domínio e subdomínios de <b>jeancarloem.com</b>, você concorda de forma irretratável e irrevogável com a <a href='https://blog.jeancarloem.com/licenca/' target='_blanck'>Licença</a>, <a href='https://blog.jeancarloem.com/avisos-gerais/' target='_blank'>Avisos Gerais</a> e <a href='https://blog.jeancarloem.com/termosdeuso/' target='_blanck'>Condições de Uso</a>; declarando-se ciênte das mesmas e de que, caso não as aceite/concorde, NÃO usará, acessará, compartilhará e/ou replicará (mesmo que parcialmente) qualquer site/blog e informações de <b>jeancarloem.com</b> (e subdomínios) e ainda, abandonará (sairá) imediatamente e impreterivelmente de qualquer domínio e subdominios de jeancarloem.com.</p>
                <br />
                </div>
            </side>
          </div>
        </div>
        <div class="inteiro last">
          <div class="wrapper colunabarra colunas2">
            <div>
              ©1985 <a href='//jeancarloem.com'>Jean Carlo EM</a>      </div>
          </div>
        </div>
        <div class="inteiro pnultimo">
          <div class="wrapper colunabarra"><div class="menu-topo-container"><ul id="menu-topo-2" class="menu"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1871"><a href="http://jeancarloem.com">Sobre o Autor</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1869"><a href="https://blog.jeancarloem.com/termosdeuso/">Condições de Uso</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1875"><a href="https://blog.jeancarloem.com/avisos-gerais/">Avisos Gerais</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1872"><a title="Licenca" href="https://blog.jeancarloem.com/licenca/">Licença</a></li>
              </ul></div>      </div>
        </div>
      </footer>

      <script>
        jQuery(document).ready(function () {
          jQuery('section.body > nav.second ul').html(jQuery('section.body > nav.second ul').html() + "<hr class='menuseparator' /><li id='menu-item-1873' class='outro_menu menu-item menu-item-type-taxonomy menu-item-object-category current-post-ancestor current-menu-parent current-post-parent menu-item-1873'><a href='https://blog.jeancarloem.com/category/divagando/'>Divagando</a></li><li id='menu-item-1870' class='outro_menu menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1870'><a title='Programação' href='https://blog.jeancarloem.com/category/profissional/programcao/'>Programação</a></li><li id='menu-item-2302' class='outro_menu menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2302'><a href='https://blog.jeancarloem.com/category/maker/'>Maker</a></li><li id='menu-item-1874' class='outro_menu menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1874'><a href='https://blog.jeancarloem.com/category/profissional/investimento/'>Investimentos</a></li>");
        });
      </script>

    </section>
  </body>
</html>