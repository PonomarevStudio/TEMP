const switcher = document.getElementById('plans-switcher'),
    updateHash = () => location.hash = switcher.value,
    preventScroll = state => document.body.classList.toggle('scroll-targets-to-top', state),
    getHashValue = () => location.hash ? location.hash.substring(1) : undefined,
    isOption = value => [...switcher.options].map(({value}) => value).includes(value),
    updateSwitcher = (e, value = getHashValue()) => updateHash(isOption(value) ? switcher.value = value : null)

document.addEventListener("DOMContentLoaded", () => {
    preventScroll(true)
    updateSwitcher()
    preventScroll(false)
    switcher.addEventListener('change', updateHash)
    window.addEventListener('hashchange', updateSwitcher)
})