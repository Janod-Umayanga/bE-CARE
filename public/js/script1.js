const changeThemeButtonElement = document.getElementById('button-themechange')
const navigationElement = document.getElementById('navigation')
const contentContainerOfNavigationElement = document.getElementById('content-container')
const navigationLink = document.querySelectorAll("[id='navigation-link']")
const sideMenuThreeLine = document.querySelectorAll("[id='line']")
const sideMenuContainer = document.querySelector('.aside-menu')
const asideContainerElement = document.querySelector('.links-container')
const servicesContainerElement = document.getElementById('card-container-forservices')
const iconForServiceView = document.getElementById('icon-more-orless')
const mainServiceContainerElement = document.getElementById('our-services-container')


sideMenuContainer.addEventListener('click', () => { /* Side menu process starts here */
    sideMenuContainer.classList.toggle('active')
    asideContainerElement.classList.toggle('active')
})

document.querySelectorAll('.navigation-link').forEach(n => n.addEventListener('click', () => {
    sideMenuContainer.classList.remove('active')
    asideContainerElement.classList.remove('active')
}))

/* Side menu process ends here */

const prepareForDarkTheme = [ /* Dark theme process starts here */
    navigationElement,
    contentContainerOfNavigationElement,
    navigationLink,
    sideMenuThreeLine,
    mainServiceContainerElement
]

function changeTheme() {
    if (changeThemeButtonElement.className == "fa-solid fa-moon") {
        changeThemeButtonElement.className = "fa-solid fa-sun"
        prepareForDarkTheme.forEach((element) => {
            if (element.length > 1) {
                setClass(element, true)
            } else {
                setClass(element, false)
            }
        })
    } else {
        changeThemeButtonElement.className = "fa-solid fa-moon"
        prepareForDarkTheme.forEach((element) => {
            if (element.length > 1) {
                removeClass(element, true)
            } else {
                removeClass(element, false)
            }
        })
    }
}

function setClass(element, isTrue) {
    if (isTrue) {
        element.forEach((index) => {
            index.classList.add('dark')
        })
        return
    }
    element.classList.add('dark')
}

function removeClass(element, isTrue) {
    if (isTrue) {
        element.forEach((index) => {
            index.classList.remove('dark')
        })
        return
    }
    element.classList.remove('dark')
}

/* Dark theme process ends here */

function showMore() {
    if (iconForServiceView.className == "fa-solid fa-angle-down") {
        servicesContainerElement.classList.add('active')
        iconForServiceView.className = "fa-solid fa-angle-up"
        document.getElementById('show-text').innerText = 'Show Less'
    } else {
        servicesContainerElement.classList.remove('active')
        iconForServiceView.className = "fa-solid fa-angle-down"
        document.getElementById('show-text').innerText = 'Show More'
    }
}