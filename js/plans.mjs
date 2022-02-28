const switcher = document.getElementById('plans-switcher'),
    updateHash = () => location.hash = switcher.value,
    isOption = value => [...switcher.options].map(({value}) => value).includes(value),
    updateSwitcher = (plan = location.hash ? location.hash.substring(1) : null) =>
        updateHash(isOption(plan) ? switcher.value = plan : null)
document.addEventListener("DOMContentLoaded", updateSwitcher)
window.addEventListener('hashchange', updateSwitcher)
switcher.addEventListener('change', updateHash)
