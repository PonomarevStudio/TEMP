class Offers {
    constructor({url = 'api/offers.php', groupBy = 'rooms'} = {}) {
        this.options = {url, groupBy}
        this.loading = this.loadOffers().then(() => this)
    }

    async loadOffers(url = this.options.url) {
        this.xml = await fetch(url, {mode: 'cors'}).then(r => r.text())
            .then(str => new window.DOMParser().parseFromString(str, "text/xml"))
        this.list = [...offers.xml.querySelectorAll('offer')].map(offer => ({
            price: parseInt(offer.querySelector('price value').textContent),
            rooms: parseInt(offer.querySelector('rooms').textContent)
        }))
        this[this.options.groupBy] = Object.fromEntries(Object.entries(this.groupOffers()).map(([name, group]) =>
            [name, {price: Math.min(...group.prices), ...group}]))
    }

    groupOffers(offers = this.list, groupBy = this.options.groupBy) {
        const groups = {}
        offers.forEach(offer => {
            const id = offer[groupBy]
            const group = groups[id] || (groups[id] = {count: 0, prices: []})
            group.prices.push(offer.price)
            group.count++
        })
        return groups;
    }

    async get(group) {
        await this.loading
        return this[this.options.groupBy][group]
    }
}

window.offers = new Offers({url: 'https://domtemp.life/new/api/offers.php'})

window.customElements.define('offers-count', class OffersCount extends HTMLElement {
    async connectedCallback() {
        await offers.loading
        this.innerText = offers.list.length
    }
})

window.customElements.define('offer-data', class OfferData extends HTMLElement {
    async connectedCallback() {
        const key = this.dataset.key
        const data = await offers.get(this.dataset.group)
        this.innerText = this.dataset.round ? (data[key] / parseInt(this.dataset.round)) : data[key]
    }
})