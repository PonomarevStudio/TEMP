window.customElements.define('drag-scroll', class DragScroll extends HTMLElement {
    constructor() {
        super();
        this.startX;
        this.velX = 0;
        this.speed = 1; //scroll-fast
        this.momentumID;
        this._scrollLeft;
        this.isDown = false;
        this.mediaQuery = "(min-width: 1024px)"
    }

    connectedCallback() {
        this.addEventListener('mouseup', this.mouseup);
        this.addEventListener('mousemove', this.mousemove);
        this.addEventListener('mousedown', this.mousedown);
        this.addEventListener('mouseleave', this.mouseleave);
        this.addEventListener('wheel', this.cancelMomentumTracking);
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
})