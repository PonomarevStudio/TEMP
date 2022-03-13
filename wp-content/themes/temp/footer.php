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
</body>
</html>