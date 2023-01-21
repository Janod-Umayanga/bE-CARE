const formContainerElement = document.getElementById('form-container')
const statusElement = document.getElementById('form-status')
const nextButtonElement = document.getElementById('next-button-status')
const previousButtonElement = document.getElementById('previous-button-status')
let currentIndex = 0
const forms = [
    {
        text: 'Patient',
        element: document.getElementById('patient-form')
    },
    {
        text: 'Doctor',
        element: document.getElementById('doctor-form')
    },
    {
        text: 'Counsellor',
        element: document.getElementById('counsellor-form')
    },
    {
        text: 'Meditation Instructor',
        element: document.getElementById('meditation-instructor-form')
    },
    {
        text: 'Nutritionist',
        element: document.getElementById('nutritionist-form')
    },
    {
        text: 'Pharmacist',
        element: document.getElementById('pharmacist-form')
    }
]
let setFormElement = forms

/* Multiple login page process starts */

nextButtonElement.addEventListener('click', () => {
    currentIndex = currentIndex + 1
    setForm()
})

previousButtonElement.addEventListener('click', () => {
    currentIndex = currentIndex - 1
    setForm()
})

function setForm() {
    resetState()
    if (setFormElement.length < currentIndex + 1) {
        currentIndex = 0
        showForm(setFormElement[currentIndex])
    } else if(currentIndex < 0) {
        currentIndex = setFormElement.length - 1
        showForm(setFormElement[currentIndex])
    } else {
        showForm(setFormElement[currentIndex])
    }
}

function resetState() {
    forms.forEach((elements) => {
        elements.element.style.display = "none"
    })
}

function showForm(form) {
    statusElement.innerHTML = form.text
    form.element.style.display = 'flex'
}

/* Multiple login page process ends */