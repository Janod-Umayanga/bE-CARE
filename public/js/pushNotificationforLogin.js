const notificationContainer = document.getElementById('notification-container')
let needLoginMessage = document.getElementById('needLogin')
let signedUpMessage = document.getElementById('isSignedUp')

// Need access as a patient patient
if (needLoginMessage.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.classList.add('warning')
    notification.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> You need to login to proceed further'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    needLoginMessage.innerText = ""
}

// Signed Up notification for patient
if (signedUpMessage.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> Successfully Signed up'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    signedUpMessage.innerText = ""
}