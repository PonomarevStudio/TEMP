class Offers {
    constructor({url = 'api/offers.php', groupBy = 'rooms', fields = ['price', 'rooms']} = {}) {
        this.options = {url, groupBy, fields}
        this.selectors = {price: 'price value'}
        this.loading = this.loadOffers().then(() => this)
    }

    async loadOffers(url = this.options.url) {
        if (sessionStorage.getItem('offers')) return this.loadCache()
        this.xml = await fetch(url, {mode: 'cors'}).then(r => r.text())
            .then(str => new window.DOMParser().parseFromString(str, "text/xml"))
        this.list = [...offers.xml.querySelectorAll('offer')].map(this.fetchOfferFields.bind(this))
        this.groups = Object.fromEntries(Object.entries(this.groupOffers()).map(([name, group]) =>
            [name, {price: Math.min(...group.prices), ...group}]))
        return this.saveCache()
    }

    fetchOfferFields(offer) {
        return Object.fromEntries(this.options.fields.map(field =>
            [field, parseInt(offer.querySelector(this.getSelector(field)).textContent)]))
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

    saveCache() {
        const {list, groups} = this
        sessionStorage.setItem('offers', JSON.stringify({list, groups}))
    }

    loadCache() {
        Object.assign(this, JSON.parse(sessionStorage.getItem('offers')))
    }

    getSelector(field) {
        return this.selectors[field] || field
    }

    async get(group) {
        await this.loading
        return this.groups[group]
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