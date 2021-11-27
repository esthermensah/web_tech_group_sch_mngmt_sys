// const submitforms=document.querySelectorAll('.form-submit');
const formdata = new FormData();
const popup = document.querySelector('.popup');
const popupForm = document.querySelector("#popup-form");

const onEdit = (e) => {
    const submitform = e.target;
    console.log(popupForm.coursename);
    e.preventDefault();
    popup.classList.add('popup-show');
    const SID = submitform.ID.value;
    formdata.append('ID',SID);
    fetch('select.php', {
        method:'POST',
        body: formdata,
    }).then(resp => {
        return resp.json();
    }).then(json => {
        updateForm(json[0]);
    });
}
const onDelete = (e) => {
    if (!confirm('Are you sure you want to delete?')) {
        e.preventDefault();
    }
}

const closePopup = (e) => {
    e.preventDefault();
    popup.classList.remove("popup-show");
    popupForm.reset();
}

const updateForm = (formData) => {
    console.log(formData);
    popupForm.fname.value = formData["firstname"];
    popupForm.lname.value = formData["lastname"];
    popupForm.DOB.value = formData["DOB"];
    popupForm.nationality.value = formData["nationality"];
    popupForm.address.value = formData["address"];
    popupForm.class.value = formData["class"];
    popupForm.yeargroup.value = formData["yeargroup"] ?? "";
    popupForm.courserequirement.value = formData["Courserequirement"]
    popupForm.subjectname.value = formData["nameofsubject"]
    popupForm.present_no.value = formData["PresentNo"]
    popupForm.club.value = formData["club"]
    popupForm.accountnumber.value = formData["AccNum"]
    popupForm.totalamount.value = formData["totalamount"]
    popupForm.installment.value = formData["installment"]
    popupForm.amountpaid.value = formData["AmountPaid"]
    popupForm.academicyear.value = formData["academicyear"]
    popupForm.roomnumber.value = formData["roomnumber"]
    popupForm.housecapacity.value = formData["HouseCapacity"]
    popupForm.no_of_rooms.value = formData["Numberofrooms"]
    popupForm.room_capacity.value = formData["RoomCapacity"]
    popupForm.score.value = formData["score"]
    popupForm.passgrade.value = formData["passgrade"]
    if(formData["gender"] === "Male") {
        popupForm.gender[0].checked = true;    
    } else {
        popupForm.gender[1].checked = true; 
    }
    popupForm.gender.value = formData["gender"];
    popupForm.coursename.value = formData["CourseName"];
    popupForm.department.value = formData["departmentName"];
    popupForm.subjecttype.value = formData["typeofsubject"];
    popupForm.month.value = formData["Months"];
    popupForm.bhouse.value = formData["housename"];
    popupForm.subjecttype.value = formData["typeofsubject"];
    popupForm.subjecttype.value = formData["typeofsubject"];
    popupForm.AccID.value = formData["AccID"];
    popupForm.Course_id.value = formData["Course_id"];
    popupForm.SID.value = formData["SID"];
    popupForm.deptnum.value = formData["deptnum"];
    popupForm.feesID.value = formData["feesID"];
    popupForm.houseID.value = formData["houseID"];
    popupForm.subjectID.value = formData["subjectID"];
    popupForm.Resultnum.value = formData["Resultnum"];
}