window.customElements.define('hero-slider', class HeroSlider extends HTMLElement {
    constructor() {
        super();
        this.slides = [];
        this.currentSlide = 0;
        this.autoplayInterval = 5000;
        this.dataURL = '/new/wp-content/themes/temp/data/index.hero.json';
        this.loadingChain = this.loadSlides();
    }

    async connectedCallback() {
        this.img = this.querySelector('[data-slider="img"]')
        this.text = this.querySelector('[data-slider="text"]')
        this.imgMobile = this.querySelector('[data-slider="img_mobile"]')
        this.nextButton = this.querySelector('.navigation>button:last-of-type')
        this.prevButton = this.querySelector('.navigation>button:first-of-type')
        this.querySelectorAll('.transparent').forEach(node =>
            node.classList.toggle('transparent', false))

        await this.loadingChain.then(this.appendInitialSlide.bind(this))

        this.prevButton.addEventListener('click', this.prevSlide.bind(this, true))
        this.nextButton.addEventListener('click', this.nextSlide.bind(this, true))

        this.play()
        this.preloadImages()
    }

    disconnectedCallback() {
        this.pause()
        this.prevButton.removeEventListener('click', this.prevSlide.bind(this, true))
        this.nextButton.removeEventListener('click', this.nextSlide.bind(this, true))
    }

    prevSlide(resetInterval) {
        if (resetInterval) this.play()
        if (this.currentSlide === 0) this.currentSlide = this.slides.length - 1; else this.currentSlide--
        return this.renderSlide()
    }

    nextSlide(resetInterval) {
        if (resetInterval) this.play()
        if (this.currentSlide === this.slides.length - 1) this.currentSlide = 0; else this.currentSlide++
        return this.renderSlide()
    }

    renderSlide(slide = this.currentSlide) {
        const data = this.slides[slide];
        if (this.imgMobile) this.imgMobile.srcset = data.imgMobile || '';
        if (this.text) this.text.innerText = data.text || '';
        if (this.img) this.img.src = data.img || '';
        return data;
    }

    play(interval = this.autoplayInterval) {
        this.pause();
        return this.autoplay = setInterval(this.nextSlide.bind(this), interval)
    }

    pause() {
        if (!this.autoplay) return;
        clearInterval(this.autoplay)
        delete this.autoplay
        return true;
    }

    async loadSlides(url = this.dataURL) {
        return this.slides = (await fetch(url).then(r => r.json().catch())) || []
    }

    preloadImages() {
        this.slides.flatMap(({img, imgMobile}) => [img, imgMobile]).filter(Boolean)
            .forEach(img => new Image().src = img)
    }

    appendInitialSlide() {
        const data = {}
        if (this.img && this.img.src) data.img = this.img.src
        if (this.text && this.text.innerText) data.text = this.text.innerText
        if (this.imgMobile && this.imgMobile.srcset) data.imgMobile = this.imgMobile.srcset
        return this.slides.unshift(data)
    }
})