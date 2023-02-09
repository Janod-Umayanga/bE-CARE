const notificationContainer = document.getElementById('notification-container')
let loggedInMessageMedInstr = document.getElementById('isMedInstrLoggedIn')



// Logged in notification for Meditation Instructor
if (loggedInMessageMedInstr.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> Successfully logged in'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    loggedInMessageMedInstr.innerText = ""
}


