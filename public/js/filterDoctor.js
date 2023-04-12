let specializationMenu = document.getElementById('specialization');
let container = document.querySelector('.card-content-fordoctors');

specializationMenu.addEventListener('change', async function() {
    let specializationName = this.value;

    // let http = new XMLHttpRequest();

    // http.onload = function() {
    //     if(this.readyState == 4 && this.status == 200) {
    //         let response = JSON.parse(this.responseText);
    //         console.log(response);
    //         // let out = "";
    //         // for(let item of response) {
    //         //     out += `
    //         //         <div class="card theme theme">
    //         //             <div class="left theme">
    //         //                 <p>${item.type}</p>
    //         //                 <h2>Dr. ${item.first_name} ${item.last_name}</h2>
    //         //                 <a href="http://localhost/be-care/Patient/viewDoctorProfile/${item.doctor_id}">View profile <i class="fa-solid fa-arrow-right"></i></a>
    //         //             </div>
    //         //             <div class="right">
    //         //                 <p>City : ${item.city}</p>
    //         //                 <h2>${item.specialization}</h2>
    //         //                 <form action="http://localhost/be-care/Patient/getDoctorId" method="POST">
    //         //                     <input type="hidden" name="doctor_id" id="doctor_id" value="${item.doctor_id}">
    //         //                     <button class="channel-butten">Channel</button>
    //         //                 </form>
    //         //             </div>
    //         //         </div>
    //         //     `;
    //         // }
    //         // container.innerHTML = out;
    //     }
    // }

    const apiRequest = await fetch('http://localhost/be-care/Patient/findDoctor', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'specialization=' + specializationName
    });

    const response = await apiRequest.json();
    console.log(response);

    // http.open('POST', "http://localhost/be-care/Patient/findDoctor");
    // http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // http.send('specialization=' + specializationName);
});