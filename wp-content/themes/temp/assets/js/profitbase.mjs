!function (e, t) {
    var i = e.getElementsByTagName("script")[0];
    n = e.createElement("script"), n.src = "https://pb418.profitbase.ru/assets/js/sw.js", n.async = !0, n.onload = function () {
        t.pb_front_widget.init("https://pb418.profitbase.ru/api/v2/json/sitewidget/widget", {
            pb_api_key: "f59275cdd33f1c2b2dcf74fb4cfa868c",
            show_button: false
        })
    }, i.parentNode.insertBefore(n, i)
}(document, window);