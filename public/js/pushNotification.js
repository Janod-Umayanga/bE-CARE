const notificationContainer = document.getElementById('notification-container')
let loggedInMessage = document.getElementById('isPatientLoggedIn')
let orderSentMessage = document.getElementById('isOrderSent')
let paidForOrderMessage = document.getElementById('isPaidForOrder')
let channelCreatedMessage = document.getElementById('isChannelCreated')
let loggedOutMessage = document.getElementById('isLoggedOut')
let detailsUpdatedMessage = document.getElementById('isDetailsUpdated')
let passwordUpdatedMessage = document.getElementById('isPasswordUpdated')

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

// Paid for order notification for patient
if (paidForOrderMessage.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> Paid for order successfully'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    orderSentMessage.innerText = ""
}

// Channel created notification for patient
if (channelCreatedMessage.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> Appointment made successfully'
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

// Details updated notification for patient
if (detailsUpdatedMessage.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> Account details updated successfully'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    detailsUpdatedMessage.innerText = ""
}

// Password updated notification for patient
if (passwordUpdatedMessage.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> Password updated successfully'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    passwordUpdatedMessage.innerText = ""
}

