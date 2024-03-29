(function ($, w) {
  w.rand = function (max) {
    var r = Math.floor((1 + Math.random()) * 0x10000);
    return ((isFinite(max) && !isNaN(max)) && max > 0) ? r % (max + 1) : r;
  };

  w.guid = function () {
    function s4() {
      return w.rand()
        .toString(16)
        .substring(1);
    }
    return String.fromCharCode((w.rand(1) === 1) ? 65 : 97) + w.rand(26) + s4() + s4() + '-' + s4() + '-' + s4() + '-' +
      s4() + '-' + s4() + s4() + s4();
  };

  Node.prototype.getId = function () {
    var id = $(this).attr('id');

    if (!id) {
      id = w.guid();
      $(this).attr('id', id);
    }

    return id;
  };

  w.downmenu = function () {
    w.downmenuFEITO = false;

    var iconHeader = $("section.body > header");
    var header = $("section.body > nav.second");
    var bar = $("section.body > nav.second ul");

    if (bar.length > 0) {
      bar.addClass("forcaroculto");

      w.setTimeout(function () {
        var resopen = header.hasClass('open');

        header.removeClass('estouro');
        header.removeClass('open');

        if (bar[0].scrollWidth > bar.width()) {
          iconHeader.addClass('estourosecond');
          header.addClass('estouro');

          if (resopen) {
            header.addClass('open');
          } else {
            w.fecharMenu($('body').attr('menuopen'));
          }
        } else {
          iconHeader.removeClass('estourosecond');
          header.removeClass('estouro');

          w.fecharMenu($('body').attr('menuopen'));
        }

        w.setTimeout(function () {
          $("section.body > header.first ul").removeClass('forcaroculto');
        }, 500);
      }, 1);
    }
  };

  w.masterheader = function () {
    w.masterheaderFEITO = false;

    var header = $("section.body > header.first");
    var bar = $("section.body > header.first ul");

    if (bar.length > 0) {
      bar.addClass("forcaroculto");

      w.setTimeout(function () {
        var resopen = bar.hasClass('open');

        bar.removeClass('estouro');
        bar.removeClass('open');

        if (bar[0].scrollWidth > bar.width()) {
          bar.addClass('estouro');
          header.addClass('estouroico');

          if (resopen) {
            bar.addClass('open');
          } else {
            w.fecharMenu($('body').attr('menuopen'));
          }
        } else {
          header.removeClass('estouroico');
          bar.removeClass('estouro');

          w.fecharMenu($('body').attr('menuopen'));
        }

        w.setTimeout(function () {
          $("section.body > header.first ul").removeClass('forcaroculto');
        }, 500);
      }, 1);
    }
  };

  w.primarymenu = function () {
    w.primarymenuFEITO = false;

    var secundario = $("section.body > nav.second ul");
    var bar = $("section.body > div.wrapper header.third nav.navmenu ul");

    if (bar.length > 0) {
      bar.addClass("forcaroculto");

      w.setTimeout(function () {
        bar.removeClass('estouro');

        if (bar[0].scrollWidth > bar.width()) {
          bar.addClass('estouro');
          secundario.addClass('show_outro_menu');
        } else {
          bar.removeClass('estouro');
          secundario.removeClass('show_outro_menu');
        }

        w.setTimeout(function () {
          $("section.body > div.wrapper header.third nav.navmenu ul").removeClass('forcaroculto');
        }, 500);
      }, 1);
    }
  };

  w.exibirEscuro = function (exibir) {
    var escuro = $(".body > .escuro");

    if (escuro.length <= 0) {
      escuro = $($(".body").prepend('<div class="escuro ocultar"></div>'));
      var escuro = $(".body > .escuro");

      $(document).on('click', function () {
        if ($('body')[0].hasAttribute('menuopen')) {
          w.toogleMenu($('body').attr('menuopen'));
        }
      });
    }

    if (exibir === true) {
      escuro.css('display', 'block');
      escuro.removeClass('ocultar');
      escuro.addClass('exibir');
    } else {
      escuro.addClass('ocultar');
      escuro.removeClass('exibir');

      w.setTimeout(function () {
        $(".body > .escuro").css('display', 'none');
      }, 400);
    }
  };

  w.fecharMenu = function (menu) {
    var e = $('#' + menu);
    e.removeClass('open');

    w.exibirEscuro();

    $("[menuid=" + menu + "]").each(function (i, item) {
      $(item).removeClass('open');
    });
  };

  w.abrirMenu = function (menu) {
    var e = $('#' + menu);
    e.addClass('open');

    e.css('display', 'block !important');

    w.exibirEscuro(true);

    $("[menuid=" + menu + "]").each(function (i, item) {
      $(item).addClass('open');
    });

    w.setTimeout(function () {
      $('body').attr('menuopen', menu);
    }, 10);
  };

  w.toogleMenu = function (id) {
    var e = $("#" + id);

    if (!e.hasClass('open')) {
      w.setTimeout(function () {
        w.abrirMenu(id);
      }, 350);
    } else {
      w.fecharMenu(id);
      $('body').removeAttr('menuopen');
    }
  };

  w.menuHandle = function (dest) {
    var menuid = $(this).attr('menuid');

    if (!menuid && dest) {
      menuid = $(dest)[0].getId();
      $(this).attr('menuid', menuid);
    }

    if (menuid) {
      w.toogleMenu(menuid);
    }
  };

  w.makeiItems = (items) => {
    let itms = [
      jcemSliderMaker($("div.show_sld_default")[0], items),
      jcemSliderMaker($("div.show_sld_fixed_height")[0], items, [], { 'height': '' }, '240px'),
      jcemSliderMaker($("div.show_sld_cover")[0], items, ['cover'], { 'height': '' }, '240px'),

      jcemSliderMaker($("div.show_sld_miniatura")[0], items, ['miniatura']),
      jcemSliderMaker($("div.show_sld_fixed_height_miniatura")[0], items, ['miniatura'], { 'height': '' }, '240px'),
      jcemSliderMaker($("div.show_sld_cover_miniatura")[0], items, ['cover', 'miniatura'], { 'height': '' }, '240px'),

      jcemSliderMaker($("div.show_sld_cover_fade")[0], items, ['cover', 'fade'], { 'height': '' }, '240px'),
      jcemSliderMaker($("div.show_sld_cover_topnav")[0], items, ['cover', 'topnav'], { 'height': '' }, '240px'),

      jcemSliderMaker($("div.show_sld_cover_mini_left")[0], items, ['cover', 'topnav', 'miniatura', 'leftnav'], { 'height': '' }, null, '240px'),
      jcemSliderMaker($("div.show_sld_cover_mini_right")[0], items, ['cover', 'topnav', 'miniatura', 'rightnav'], { 'height': '' }, null, '240px'),

      jcemSliderMaker($("div.show_sld_cover_righttext")[0], items, ['righttext', 'cover'], { 'height': '' }, null, '240px'),
      jcemSliderMaker($("div.show_sld_cover_lefttext")[0], items, ['lefttext', 'cover', 'topnav'], { 'height': '' }, null, '240px'),

      jcemSliderMaker($("div.show_sld_cover_lefttext2")[0], items, ['miniatura', 'lefttext', 'cover', 'topnav'], { 'height': '' }, '240px'),

      jcemSliderMaker($("div.show_sld_cover_auto")[0], items, ['cover'], { "js": true, "height": '' }, '240px'),
    ];

    w.setTimeout(() => {
      var zero = false;

      for (let i = 0; i < itms.length; i++) {
        let id = '#' + itms[i].id + " + " + "pre > code";

        if (i === 0) {
          id = 'pre.full > code';
        }

        let otml = itms[i].outerHTML;

        itms[i] = otml
          .replace(/\<([^>\/"']+) ndc=("|')(\d)("|') (for|id)=("|')[^"']+("|')/gi, function (a, b, c, d, e, f) {
            return "<" + b + " ndc='" + d + "' " + f + "='input_id_" + d + "'";
          })
          .replace(otml.match(/data\-slider=("|')([^"']+)("|')/i)[2], 'jcemlider_uid')
          .replace(new RegExp("id=(\"|')" + itms[i].id + "(\"|')"), '')
          .replace(/name=("|')jcemslider_i[^"'>]+("|')/ig, 'name="jcemslider_uid"');

        $(id).html(
          (() => {
            itms[i] = itms[i]
              .replace(/<img([^<]+)<\/div/gi, function (a, b, c) {
                return "<img" + b + " />\n\t\t\t&lt;/div";
              })
              .replace(/\.\s*<\/div>\s*<\/div>\s*<\/a>(\s*<\/div>)?/gi, function (a, b) {
                return ".\n\t\t\t\t&lt;/div>\n\t\t\t&lt;/div>\n\t\t&lt;/a>" + (b ? "\n\t&lt;/div>" : "");
              })
              .replace(/\</ig, "\n<")
              .replace(/^<label/gmi, "\t\t<label")
              .replace(/^<input /gmi, "\t<input ")
              .replace(/^<div class=("|')mgs("|')/gmi, "\t<div class='mgs'")
              .replace(/^<a ndc=/gmi, "\t\t<a ndc=")
              .replace(/^<div class=("|')mgi("|')/gmi, "\t\t\t<div class='mgi'")
              .replace(/^<img/gmi, "\t\t\t\t<img")
              .replace(/src=("|')[^u][^"']+("|')/gmi, "src='uri/to/image'")
              .replace(/\:\s*url\(("|')[^"'\)]+("|')/gmi, (a, b) => {
                return ": url(" + b + "uri/to/image" + b;
              })
              .replace(/^<div class=("|')cnt("|')/gmi, "\t\t\t<div class='cnt'")
              .replace(/^<div class=("|')ttl("|')/gmi, "\t\t\t\t<div class='ttl'")
              .replace(/^<\/div>\s*<div class=("|')text("|')/gmi, "\n\t\t\t\t&lt;/div>\n\t\t\t\t&lt;div class='text'")
              .replace(/^<nav/gmi, "\t<nav")
              .replace(/^<\/nav/gmi, "\t</nav")
              .replace(/^<\/label/gmi, "\t\t</label");


            if (i > 0 || !zero) {
              let tmp = (itms[i] + "")
                .replace(/((<input[^><]*>[\s\n]*)+)/i, "...INPUTs...\n\t")
                .replace(/<a .+<nav class=("|')pvnt/is, "...ITEMs...\n\t</div>\n\t<nav class='pvnt'")
                .replace(/<label .+<nav class=("|')seletor/is, "...NAVIGATOR...\n\t</nav>\n\t<nav class='seletor'")
                .replace(/<label .+<\/nav/is, "...MINIATURES...\n\t</nav");

              if (!zero && i === 0) {
                zero = tmp
                  .replace(/\</ig, "&lt;")
                  .replace(/\>/ig, "&gt;")
                  .replace(/\n\n/ig, "\n")
                  .split("\n");
              }

              if (i > 0) {
                itms[i] = tmp;
              }
            }

            itms[i] = itms[i]
              .replace(/\</ig, "&lt;")
              .replace(/\>/ig, "&gt;")
              .replace(/\n\n/ig, "\n")
              .split("\n");

            let r = [];

            if (i > 0) {
              for (let j = 0; j < itms[i].length; j++) {
                itms[i][j] = itms[i][j].replace(/show_sld_[^"'\s]+ ?/ig, '');
                if ((itms[i][j] != zero[j]) || (itms[i][j].match(/\.\.\./))) {
                  r.push(itms[i][j]);
                }
              }
            } else {
              r = itms[i];
            }

            return r.join("\n");
          })()
        );
      }

      hljs.highlightAll();
    }, 50);
  };

  $(document).ready(function ($) {
    w.masterheaderFEITO = false;
    w.downmenuFEITO = false;
    w.primarymenuFEITO = false;

    w.makeiItems(function () {
      text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean hendrerit condimentum odio et porttitor. Integer congue arcu sed sagittis sodales. Praesent nec tincidunt velit. Ut finibus pellentesque velit, quis eleifend nisi venenatis et. Praesent non magna a tellus vehicula condimentum vel non sem. Sed non eleifend massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tellus tortor, facilisis quis mauris vel, facilisis bibendum justo. Aenean quis malesuada nibh. ";
      return [
        {
          "url": 'assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOllvc2VtaXRlX25hdGlvbmFsX3BhcmtfbGFrZV9yb2Nrc19tb3VudGFpbnNfYXV0dW1uX25hdHVyZS5qcGc=.jpg',
          "title": 'My Photo 1',
          "descri": "This text 1. " + text
        },
        {
          "url": 'assets/img/aHR0cHM6Ly9jb21tb25zLndpa2ltZWRpYS5vcmcvd2lraS9GaWxlOk5hdHVyZS1WaWV3LmpwZw==.jpg',
          "title": "My Photo 2",
          "descri": "This text 2. " + text
        },
        {
          "url": 'assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy81LzVkL1BpY2tldHQtYXJjaC1sYWtlLXRuMS5qcGc=.jpg',
          "title": 'My Photo 3',
          "descri": "This text 3. " + text
        },
        {
          "url": 'assets/img/aHR0cHM6Ly91cGxvYWQud2lraW1lZGlhLm9yZy93aWtpcGVkaWEvY29tbW9ucy8zLzNhL0VsX1BhcnJpc2FsXy1fcGFub3JhbWlvLmpwZw==.jpg',
          "title": "My Photo 4",
          "descri": "This text 4. " + text
        },
      ];
    }());

    $(w).resize(function () {
      if (!w.masterheaderFEITO) {
        w.masterheaderFEITO = true;
        w.setTimeout("window.masterheader();", 1000);
      }

      if (!w.primarymenuFEITO) {
        w.primarymenuFEITO = true;
        w.setTimeout("window.primarymenu();", 1000);
      }

      if (!w.downmenuFEITO) {
        w.downmenuFEITO = true;
        w.setTimeout("window.downmenu();", 1000);
      }
    });

    $("section.body > header div.ico.menu").on('click', function () {
      w.menuHandle.bind(this)("section.body > nav.second");
    });

    $("section.body > header div.ico.follow").on('click', function () {
      w.menuHandle.bind(this)("section.body > header.first ul");
    });

    $("section.body > nav .lupa").on('click', function () {
      $("section.body > nav.search").toggleClass('open');
    });

    $(w).scroll(function () {
      if ($(w).scrollTop() >= ($("header.first.fixed").height() * 0.1)) {
        $("header.first").addClass('sombra');
      } else {
        $("header.first").removeClass('sombra');
      }

      if ($(w).scrollTop() >= ($("section.body").height() * 0.35)) {
        $("header.first div.topo").css('display', 'block');
      } else {
        $("header.first div.topo").css('display', 'none');
      }
    });

    w.setTimeout(function () {
      $('#carregandoPagina').hide();
      $('body > .pagebody').show(500);
      $(w).resize();

      if ($('#wpadminbar').length > 0) {
        $(['ul', 'nav', 'header', 'section']).each(function (i, item) {
          $(item).addClass('wpadminbar');
        });
      }

      if ($('.body.imagem_macro.thumb_overload').length > 0) {
        $('.body > header').addClass('thumb_overload');
        $('.body > nav').addClass('thumb_overload');
      }

      if ($('.body.imagem_macro').length > 0) {
        $('.body > header').addClass('imagem_macro');
        $('.body > nav').addClass('imagem_macro');
      }

      if ($('.body.iasd').length > 0) {
        $('.body > header').addClass('iasdbar');
        $('.body > nav').addClass('iasdbar');
        $('.body > * ul.social').addClass('iasdbar');
      }

      w.setTimeout('jQuery(window).resize();', 550);
    }, 700);
  });
})(jQuery, window);