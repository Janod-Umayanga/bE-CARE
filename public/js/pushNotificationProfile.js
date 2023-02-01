const notificationContainer = document.getElementById('notification-container')
let updatedMessage = document.getElementById('isUpdated')
let updatedPasswordMessage = document.getElementById('isUpdatedPassword')


// Successfully updated profile for Admin
if (updatedMessage.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.classList.add('success')
    notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> User account is updated successfully'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    updatedMessage.innerText = ""
}


// Successfully updated password for Admin
if (updatedPasswordMessage.innerText) {
    const notification = document.createElement('div')
    notification.classList.add('notification')
    notification.classList.add('success')
    notification.innerHTML = '<i class="fa-solid fa-circle-check"></i> You are succesfully changed Password!'
    notificationContainer.appendChild(notification)
    setTimeout(() => {
        notification.remove()
    }, 6000)
    updatedPasswordMessage.innerText = ""
}

