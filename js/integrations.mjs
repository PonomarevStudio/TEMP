try {
    !function (e, t) {
        var i = e.getElementsByTagName("script")[0];
        n = e.createElement("script"), n.src = "https://pb418.profitbase.ru/assets/js/sw.js", n.async = !0, n.onload = function () {
            t.pb_front_widget.init("https://pb418.profitbase.ru/api/v2/json/sitewidget/widget", {
                pb_api_key: "f59275cdd33f1c2b2dcf74fb4cfa868c",
                show_button: false
            })
        }, i.parentNode.insertBefore(n, i)
    }(document, window);
} catch (e) {
    console.error(e)
}
try {
    (function (w, d, s, h, id) {
        w.roistatProjectId = id;
        w.roistatHost = h;
        var p = d.location.protocol == "https:" ? "https://" : "http://";
        var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/" + id + "/init?referrer=" + encodeURIComponent(d.location.href);
        var js = d.createElement(s);
        js.charset = "UTF-8";
        js.async = 1;
        js.src = p + h + u;
        var js2 = d.getElementsByTagName(s)[0];
        js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com', '8420d8a36ef1e7439d1879178dbd1db2');
} catch (e) {
    console.error(e)
}
try {
    (function (d, w, k) {
        w.morekit_callback = function () {
            try {
                w.MK = new MorekitIntegration(k);
            } catch (e) {
                console.log(e)
            }
        };
        var n = d.getElementsByTagName("script")[0],
            e = d.createElement("script");
        e.type = "text/javascript";
        e.async = true;
        e.src = "https://mc.morekit.io/static/site/" + k + ".js";
        n.parentNode.insertBefore(e, n);
    })(document, window, "f3efed5309ce2df9cdadfda09b9c9849");
} catch (e) {
    console.error(e)
}