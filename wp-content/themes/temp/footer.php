<?php get_template_part( 'template-parts/form' ); ?>
<?php get_template_part( 'template-parts/footer' ); ?>
<script>
    const isStaticViewport = navigator.platform === 'iPhone' && navigator.userAgent.includes(" GSA/")
    document.body.classList.toggle('static-viewport-height', isStaticViewport)
    document.body.style.setProperty("--static-viewport-height", window.innerHeight + 'px');
    window.addEventListener('load', () => setTimeout(() =>
        document.querySelectorAll('img[loading="lazy"]').forEach(img => img.removeAttribute('loading')), 1))
</script>
<script src="https://unpkg.com/@webcomponents/webcomponentsjs/webcomponents-loader.js"></script>
<?php wp_footer(); ?>
<script>
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
</script>
<!-- MoreCRM -->
<script type="text/javascript">
    (function (d, w, k) {
        w.morecrm_callback = function () {
            try {
                w.MI = new MorecrmIntegration(k);
            } catch (e) {
                console.log(e)
            }
        };

        var n = d.getElementsByTagName("script")[0],
            e = d.createElement("script");

        e.type = "text/javascript";
        e.async = true;
        e.src = "https://morecrm.ru/integration/site/" + k + ".js";
        n.parentNode.insertBefore(e, n);
    })(document, window, '9bf31c7ff062936a96d3c8bd1f8f2ff3');
</script>
<!-- /MoreCRM -->
<!-- MoreKit -->
<script type="text/javascript">
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
</script>
<!-- /MoreKit -->
</body>
</html>