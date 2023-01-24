const notificationContainer = document.getElementById('notification-container')
let loggedInMessage = document.getElementById('isPatientLoggedIn')
let orderSentMessage = document.getElementById('isOrderSent')
let loggedOutMessage = document.getElementById('isLoggedOut')

// Logged in notification for patient
if (loggedInMessage.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> Successfully logged in'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    loggedInMessage.innerText = ""
}

// Order sent notification for patient
if (orderSentMessage.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> Order sent to pharmacy'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    orderSentMessage.innerText = ""
}

// Logged out notification for patient
if (loggedOutMessage.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.classList.add('warning')
    notification.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Logged out from the system'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    loggedOutMessage.innerText = ""
}

