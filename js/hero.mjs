window.customElements.define('hero-slider', class HeroSlider extends HTMLElement {
    constructor() {
        super();
        this.slides = [];
        this.currentSlide = 0;
        this.dataURL = 'data/index.hero.json';
        this.loadingChain = this.loadSlides();
    }

    async connectedCallback() {
        this.text = this.querySelector('[data-slider="text"]')
        this.img = this.querySelector('[data-slider="img"]')
        this.prevButton = this.querySelector('.navigation>button:first-of-type')
        this.nextButton = this.querySelector('.navigation>button:last-of-type')

        await this.loadingChain.then(this.appendInitialSlide.bind(this))

        this.prevButton.addEventListener('click', this.prevSlide.bind(this))
        this.nextButton.addEventListener('click', this.nextSlide.bind(this))
    }

    disconnectedCallback() {
        this.prevButton.removeEventListener('click', this.prevSlide.bind(this))
        this.nextButton.removeEventListener('click', this.nextSlide.bind(this))
    }

    prevSlide() {
        if (this.currentSlide === 0) this.currentSlide = this.slides.length - 1; else this.currentSlide--
        return this.renderSlide()
    }

    nextSlide() {
        if (this.currentSlide === this.slides.length - 1) this.currentSlide = 0; else this.currentSlide++
        return this.renderSlide()
    }

    renderSlide(slide = this.currentSlide) {
        const data = this.slides[slide]
        this.text.innerText = data.text;
        this.img.src = data.img;
    }

    async loadSlides() {
        return this.slides = (await fetch(this.dataURL).then(r => r.json())) || []
    }

    appendInitialSlide() {
        return this.slides.unshift({text: this.text.innerText, img: this.img.src})
    }
})