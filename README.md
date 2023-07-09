# [![|Solid](https://jcemslider.jcem.pro/assets/favicon/favicon-32x32.png)](https://lab.jeancarloem.com/jcemslider) JCEM-Slider

JCEM-Slider é um slider responsivo feito em puro CSS e opensource, com recursos adicionais em puro javascript, sem dependências.
Confira online documentação e a **[DEMONSTRAÇÃO](http://jcemslider.jcem.pro)**.

## Recursos

- Puro CSS (Sass);
- Animação de transição de rolamento;
- Animação de transição fade;
- Exibição de imagem em 3 modos diferentes (padrão, fitheight e cover);
- Exibição com ou sem miniaturas;
- Habilitado para até 100 imagens;
- Transição automática com javascript puro (opicional);
- Opensource sob licença [Mozilla Public License](https://choosealicense.com/licenses/mpl-2.0/).

## Uso e DEMO

Inclua o css:

```html
<link href="src/jcemslider.css" rel="stylesheet" />
```

Opcionalmente inclua javascript de rolagem autmatizada:

```html
<script type="text/javascript" src="src/jcemslider.js"></script>
```

Crie o HTML. Exemplo de estrutura padrão com as imagens e conteúdos:

```html
<div
  class="slider_default jcemslider"
  data-slider="jcem_slider_uid"
>
  <input
    type="radio"
    id="jcemslider_input_uid0"
    class="sldtxt"
    name="jcem_slider_uid"
    ndc="0"
    checked=""
  />
  <input
    type="radio"
    id="jcemslider_input_uid1"
    class="sldtxt"
    name="jcem_slider_uid"
    ndc="1"
  />
  <div class="mgs">
    <a class="qdr" ndc="0">
      <div
        class="mgi"
        style="background-image: url('path/to/img0.jpg') !important;"
      >
        <img src="path/to/img0.jpg" />
      </div>
      <div class="cnt">
        <div class="ttl">My Photo 1</div>
        <div class="text">This text 1.</div>
      </div>
    </a>
    <a class="qdr" ndc="1">
      <div
        class="mgi"
        style="background-image: url('path/to/img1.jpg') !important;"
      >
        <img src="path/to/img1.jpg" />
      </div>
      <div class="cnt">
        <div class="ttl">My Photo 2</div>
        <div class="text">This text 2.</div>
      </div>
    </a>
    <nav class="pvnt">
      <label for="jcemslider_input_uid0" class="pvnt fas" ndc="0"></label>
      <label for="jcemslider_input_uid1" class="pvnt fas" ndc="1"></label>
    </nav>
    <nav class="seletor"></nav>
  </div>
</div>
```

## License

O código é licenciado sob [Mozilla Public License]('https://choosealicense.com/licenses/mpl-2.0/).
