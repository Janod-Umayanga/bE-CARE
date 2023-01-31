const notificationContainer = document.getElementById('notification-container')
let loggedInMessageAdmin = document.getElementById('isAdminLoggedIn')



// Logged in notification for Admin
if (loggedInMessageAdmin.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> Successfully logged in'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    loggedInMessageAdmin.innerText = ""
}


