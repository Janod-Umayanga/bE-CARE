const formContainerElement = document.getElementById('form-container')
const statusElement = document.getElementById('form-status')
const nextButtonElement = document.getElementById('next-button-status')
const previousButtonElement = document.getElementById('previous-button-status')
const formNumber = document.getElementById('formNumber')
let currentIndex = 0

function setFormNumber() {
    if (formNumber){
        currentIndex = formNumber.innerText
        resetState()
        showForm(setFormElement[currentIndex])
    }
    
}

const forms = [
    {
        text: 'Patient',
        element: document.getElementById('patient-form'),
        headerText: 'Fill these details to signup as a patient',
        paragraphText: 'You will receive an email for the provided email address to complete the signup process. Then you can proceed to login with the relevant credentials.'
    },
    {
        text: 'Doctor',
        element: document.getElementById('doctor-form'),
        headerText: 'Fill these details to signup as a doctor',
        paragraphText: 'The qualification file should include MBBS degree certificates, license or registration certificates, specialization certificates, continuing education certificates, professional memberships and any other relevant documentation as per the requirements of the Be Care web application. You will receive an email for the provided email address with the credentials needed to login to the Be Care web application after your qualifications are verified by a professional panel.'
    },
    {
        text: 'Counsellor',
        element: document.getElementById('counsellor-form'),
        headerText: 'Fill these details to signup as a counsellor',
        paragraphText: 'The qualification file should include MBBS degree certificates, license or certification , specialization certificates, continuing education certificates, and proof of professional memberships , Additional relevant documents. You will receive an email for the provided email address with the credentials needed to login to the Be Care web application after your qualifications are verified by a professional panel.'
    },
    {
        text: 'Pharmacist',
        element: document.getElementById('pharmacist-form'),
        headerText: 'Fill these details to signup as a pharmacist',
        paragraphText: 'The qualification file should include pharmacist license, and relevant certificates, and professional memberships, Additional documentation. Delivery service availability is a mandatory requirement for a pharmacy to be registered. You will receive an email for the provided email address with the credentials needed to login to the Be Care web application after your qualifications are verified by a professional panel.'
    },
    {
        text: 'Nutritionist',
        element: document.getElementById('nutritionist-form'),
        headerText: 'Fill these details to signup as a nutritionist',
        paragraphText: 'The qualification file may include MBBS degree certifications, continuing education certificates, professional memberships, and other relevant documentation, such as awards or publications. You will receive an email for the provided email address with the credentials needed to login to the Be Care web application after your qualifications are verified by a professional panel.'
    },
    {
        text: 'Meditation Instructor',
        element: document.getElementById('meditation-instructor-form'),
        headerText: 'Fill these details to signup as a meditation-instructor',
        paragraphText: 'The qualification file should include training and workshop certificates, personal experience and practice, professional memberships, references, and any other relevant documentation. References: Contact information for references who can attest to the instructor\'s qualifications and experience, such as previous employers, colleagues, or students. You will receive an email for the provided email address with the credentials needed to login to the Be Care web application after your qualifications are verified by a professional panel.'
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
    document.getElementById('form-text').innerHTML = form.headerText
    document.getElementById('form-text-paragraph').innerHTML = form.paragraphText
}




/* Multiple login page process ends */