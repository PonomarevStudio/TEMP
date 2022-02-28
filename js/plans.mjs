const switcher = document.getElementById('plans-switcher'),
    updateHash = () => location.hash = switcher.value,
    getHashValue = () => location.hash ? location.hash.substring(1) : undefined,
    isOption = value => [...switcher.options].map(({value}) => value).includes(value),
    updateSwitcher = (value = getHashValue()) => isOption(value) ? switcher.value = value : null

window.addEventListener("load", () => {
    updateSwitcher()
    updateHash()
    switcher.addEventListener('change', updateHash)
    window.addEventListener('hashchange', updateSwitcher)
})