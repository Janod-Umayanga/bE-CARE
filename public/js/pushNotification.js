const notificationContainer = document.getElementById('notification-container')
let loggedInMessage = document.getElementById('isPatientLoggedIn')
let orderSentMessage = document.getElementById('isOrderSent')

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

// Order sent for patient
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