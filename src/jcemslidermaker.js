String.prototype.parseRegex = function (regex, items, ukn) {
  if ((typeof items !== "object") && (typeof items !== "string")) return;

  return this.replace(regex, (m, ctt, oset, input_string) => {
    if (items.hasOwnProperty(ctt)) {
      if (typeof items[ctt] === "function") return items[ctt]() + "";
      if ((typeof items[ctt] === "string") || (isFinite(items[ctt]))) return items[ctt] + "";
    }

    return (typeof ctt === "string") ? ctt : ((typeof ctt === "function") ? ukn(ctt) + "" : m);
  });
};

String.prototype.parseProps = function (items, ukn) {
  return this.parseRegex(/\$\{([^\{\}\$\s]+)\}/g, items, ukn);
};

function jcemSliderMaker(obj, items, clss, args, size, div_size) {
  let mitem = '<a class="qdr" ndc="${index}"><div class="mgi" style="background-image: url(\'${url}\') !important;"><img src="${url}" /></div><div class="cnt"><div class="ttl">${title}</div><div class="text">${descri}</div></div></a>';
  let miitem = '<input type="radio" id="${i_id}" class="sldtxt" name="${slider_id}" ndc="${index}"${checked}/>';
  let navp = " <label for='${i_id}' class='pvnt fas' ndc='${index}'></label>";
  let nav_mini = "<label for='${i_id}' ndc='0' style='background-image: url(\'${url}\');'><img src='${url}' /></label>";

  let cls = (Array.isArray(clss) ? clss : []).join(' ');

  size = typeof size === 'string' && size ? " style='height: " + size + " !important;'" : '';
  div_size = typeof div_size === 'string' && div_size ? " style='height: " + div_size + " !important;'" : '';

  let props = '';
  if (typeof args === "object") {
    if (div_size) {
      args.style = (args.hasOwnProperty('style') ? args.style : '') + div_size;
    }

    let kargs = Object.keys(args);

    for (let i = 0; i < kargs.length; i++) {
      props += " " + kargs[i] + "='" + args[kargs[i]] + "'";
      obj.setAttribute(kargs[i], args[kargs[i]]);
    }
  }

  let uid = () => {
    return 'ixxxxxxxxxxxx4xxyxxxxxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
      var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
      return v.toString(16);
    });
  };

  let jid = "jcemslider_" + uid();

  obj.setAttribute("data-slider", jid);
  obj.className += " jcemslider " + cls;

  var hitem = '';
  var hiitem = '';
  var lbls = '';
  var hnav_mini = '';

  var iids = [];

  var data = {
    "slider_id": jid
  };

  for (let i = 0; i < items.length; i++) {
    iids.push("jcemslider_" + uid());

    let dt = Object.assign(data, {
      "index": i,
      "title": items[i].title,
      "checked": i === 0 ? " checked" : "",
      "url": items[i].url,
      "i_id": iids[iids.length - 1],
      "descri": items[i].descri
    });

    hitem += mitem.parseProps(dt);
    hiitem += miitem.parseProps(dt);
    lbls += navp.parseProps(dt);
    hnav_mini += nav_mini.parseProps(dt);
  }

  obj.innerHTML = hiitem + "<div class='mgs'" + size + ">" + hitem + "</div><nav class='pvnt'>" + lbls + "</nav><nav class='seletor'>" + hnav_mini + "</nav>";
}