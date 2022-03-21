window.customElements.define('drag-scroll', class DragScroll extends HTMLElement {
    constructor() {
        super();
        this.startX;
        this.velX = 0;
        this.speed = 1; //scroll-fast
        this.momentumID;
        this._scrollLeft;
        this.isScrolling;
        this.targetScroll;
        this.isDown = false;
        this.mediaQuery = "(min-width: 1024px)"
    }

    connectedCallback() {
        this.addEventListener('mouseup', this.mouseup);
        this.addEventListener('mousemove', this.mousemove);
        this.addEventListener('mousedown', this.mousedown);
        this.addEventListener('mouseleave', this.mouseleave);
        this.addEventListener('wheel', this.cancelMomentumTracking);
        this.addEventListener('scroll', this.scroll, {passive: true});

        this.childItem = this.querySelector('.card')
        this.prevButton = this.querySelector('.scroll-button[data-scroll="prev"]')
        this.nextButton = this.querySelector('.scroll-button[data-scroll="next"]')

        if (this.prevButton) {
            this.prevButton.addEventListener('click', this.scrollToPrevNode.bind(this))
            this.prevButton.addEventListener('mouseleave', this.cancelEvent)
            this.prevButton.addEventListener('mousedown', this.cancelEvent)
            this.prevButton.addEventListener('mouseup', this.leaveEvent.bind(this))
        }
        if (this.nextButton) {
            this.nextButton.addEventListener('click', this.scrollToNextNode.bind(this))
            this.nextButton.addEventListener('mouseleave', this.cancelEvent)
            this.nextButton.addEventListener('mousedown', this.cancelEvent)
            this.nextButton.addEventListener('mouseup', this.leaveEvent.bind(this))
        }

        this.scroll()
    }

    disconnectedCallback() {
        this.removeEventListener('mouseup', this.mouseup);
        this.removeEventListener('mousedown', this.mousedown);
        this.removeEventListener('mousemove', this.mousemove);
        this.removeEventListener('mouseleave', this.mouseleave);
        this.removeEventListener('wheel', this.cancelMomentumTracking);
    }

    mousedown(e) {
        if (window.matchMedia(this.mediaQuery).matches) {
            this.isDown = true;
            this.classList.toggle('active', true);
            this.startX = e.pageX - this.offsetLeft;
            this._scrollLeft = this.scrollLeft;
            this.cancelMomentumTracking();
        }
    }

    mouseleave(e) {
        this.isDown = false;
        this.classList.toggle('active', false);
    }

    mouseup(e) {
        this.isDown = false;
        this.classList.toggle('animation', true);
        this.classList.toggle('active', false);
        this.beginMomentumTracking();
    }

    mousemove(e) {
        if (!this.isDown) return;
        e.preventDefault();
        const x = e.pageX - this.offsetLeft;
        const walk = (x - this.startX) * this.speed;
        var prevScrollLeft = this.scrollLeft;
        this.scrollLeft = this._scrollLeft - walk;
        this.velX = this.scrollLeft - prevScrollLeft;
    }

    beginMomentumTracking() {
        this.cancelMomentumTracking();
        this.momentumID = requestAnimationFrame(this.momentumLoop.bind(this));
    }

    cancelMomentumTracking() {
        cancelAnimationFrame(this.momentumID);
    }

    momentumLoop() {
        this.scrollLeft += this.velX;
        this.velX *= 0.95;
        if (Math.abs(this.velX) > 0.5) {
            this.momentumID = requestAnimationFrame(this.momentumLoop.bind(this));
        } else this.classList.toggle('animation', false);
    }

    getScrollWidth() {
        return this.childItem ? (this.childItem.clientWidth + parseInt(window.getComputedStyle(this.childItem).marginRight)) : 0
    }

    scrollToPrevNode() {
        this.targetScroll = (this.targetScroll || this.scrollLeft) - this.getScrollWidth()
        this.scrollTo({left: this.targetScroll, behavior: 'smooth'})
    }

    scrollToNextNode() {
        this.targetScroll = (this.targetScroll || this.scrollLeft) + this.getScrollWidth()
        this.scrollTo({left: this.targetScroll, behavior: 'smooth'})
    }

    scroll() {
        if (this.scrollLeft <= 0) {
            if (!this.prevButton.classList.contains('transparent')) this.prevButton.classList.toggle('transparent', true)
        } else if (this.prevButton.classList.contains('transparent')) this.prevButton.classList.toggle('transparent', false)
        if (this.scrollWidth - this.clientWidth - this.scrollLeft <= 0) {
            if (!this.nextButton.classList.contains('transparent')) this.nextButton.classList.toggle('transparent', true)
        } else if (this.nextButton.classList.contains('transparent')) this.nextButton.classList.toggle('transparent', false)
        clearTimeout(this.isScrolling);
        this.isScrolling = setTimeout(() => this.targetScroll = null, 66);
    }

    leaveEvent(e) {
        this.cancelEvent(e);
        this.isDown = false;
        this.classList.toggle('active', false);
    }

    cancelEvent(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    }
})