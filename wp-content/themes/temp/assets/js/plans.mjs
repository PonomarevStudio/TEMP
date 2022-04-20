const switcher = document.getElementById('plans-switcher'),
    switcherOptions = switcher.querySelectorAll('option[value]'),
    firstSwitcherOption = switcher.querySelector('option[value]').value,
    updateHash = (e, value = switcher.value) => location.hash = value,
    preventScroll = state => document.body.classList.toggle('scroll-targets-to-top', state),
    getHashValue = () => location.hash ? decodeURI(location.hash).substring(1) : undefined,
    isOption = value => [...switcherOptions].map(({value}) => value).includes(value),
    updateSwitcher = (e, value = getHashValue()) => updateHash(null, isOption(value) ? (switcher.value = value) : firstSwitcherOption)

window.addEventListener('load', () => {
    setTimeout(() => {
        preventScroll(true)
        updateSwitcher()
        setTimeout(() => {
            preventScroll(false)
            switcher.addEventListener('change', updateHash)
            window.addEventListener('hashchange', updateSwitcher)
        }, 100)
    }, 100)
})