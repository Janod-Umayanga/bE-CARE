const changeThemeButtonElement = document.getElementById('button-themechange')
const sideMenuContainer = document.querySelector('.aside-menu')
const asideContainerElement = document.querySelector('.links-container')
const toBeShowMore = document.getElementById('to-be-show-more')
const iconForServiceView = document.getElementById('icon-more-orless')
const darkThemeElements = document.querySelectorAll('.theme')


sideMenuContainer.addEventListener('click', () => { /* Side menu process starts here */
    sideMenuContainer.classList.toggle('active')
    asideContainerElement.classList.toggle('active')
})

document.querySelectorAll('.navigation-link').forEach(n => n.addEventListener('click', () => {
    sideMenuContainer.classList.remove('active')
    asideContainerElement.classList.remove('active')
}))

/* Side menu process ends here */

function changeTheme() {
    if (changeThemeButtonElement.className == "fa-solid fa-moon") {
        changeThemeButtonElement.className = "fa-solid fa-sun"
        darkThemeElements.forEach((element) => {
            element.classList.add('dark')
        })
        sessionStorage.setItem('theme', 'dark')
    } else {
        changeThemeButtonElement.className = "fa-solid fa-moon"
        darkThemeElements.forEach((element) => {
            element.classList.remove('dark')
        })
        sessionStorage.setItem('theme', 'light')
    }
}

const theme = sessionStorage.getItem('theme')
if (theme == 'dark') {
    changeThemeButtonElement.className = "fa-solid fa-sun"
    darkThemeElements.forEach((element) => {
        element.classList.add('dark')
    })
}

/* Dark theme process ends here */

/* show more button process starts */

function showMore() {
    if (iconForServiceView.className == "fa-solid fa-angle-down") {
        toBeShowMore.classList.add('active')
        iconForServiceView.className = "fa-solid fa-angle-up"
        document.getElementById('show-text').innerText = 'Show Less'
    } else {
        toBeShowMore.classList.remove('active')
        iconForServiceView.className = "fa-solid fa-angle-down"
        document.getElementById('show-text').innerText = 'Show More'
    }
}

/* show more button process ends */































