try {
    (function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start':
                new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-W7GGMPJ');
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