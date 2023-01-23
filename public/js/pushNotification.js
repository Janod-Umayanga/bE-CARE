const notificationContainer = document.getElementById('notification-container')
let loggedInMessage = document.getElementById('isPatientLoggedIn')

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