// console.log('script');


const fname = document.getElementById('fname');
const erroMsg = document.getElementById('error');

const validateFname = (e) =>{

    const fullnamereg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$/;

    const testNameReg = fullnamereg.test(fname.value);

    if(!fname.value){
        erroMsg.style.color="red";
        erroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        erroMsg.style.color="red";
        erroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        erroMsg.style.color="";
        erroMsg.innerText = "";
    }
}



const lname = document.getElementById('lname');
const lerroMsg = document.getElementById('lerror');


const validateLname = (e) =>{

    const fullnamereg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$/;

    const testNameReg = fullnamereg.test(lname.value);

    if(!lname.value){
        lerroMsg.style.color="red";
        lerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        lerroMsg.style.color="red";
        lerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        lerroMsg.style.color="";
        lerroMsg.innerText = "";
    }
}

const Dob = document.getElementById('DOB');
const derroMsg = document.getElementById('derror');


const validateDate = (e) =>{

    
    if(!Dob.value){
        derroMsg.style.color="red";
        derroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    
    else{
        derroMsg.style.color="";
        derroMsg.innerText = "";
    }
}

const nationality = document.getElementById('nationality');
const nerroMsg = document.getElementById('nerror');


const validateN = (e) =>{

    const fullnamereg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$/;

    const testNameReg = fullnamereg.test(nationality.value);

    if(!nationality.value){
        nerroMsg.style.color="red";
        nerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        nerroMsg.style.color="red";
        nerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        nerroMsg.style.color="";
        nerroMsg.innerText = "";
    }
}


const address = document.getElementById('address');
const aerroMsg = document.getElementById('aerror');


const validateA = (e) =>{

    const fullnamereg = /^[a-zA-Z0-9\s,'-]*$/;

    const testNameReg = fullnamereg.test(address.value);

    if(!address.value){
        aerroMsg.style.color="red";
        aerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    // else if(!testNameReg){
    //     aerroMsg.style.color="red";
    //     aerroMsg.innerText = "wrong input";
    //     e.preventDefault();
    // }
    else{
        aerroMsg.style.color="";
        aerroMsg.innerText = "";
    }
}


const classr = document.getElementById('class');
const cerroMsg = document.getElementById('cerror');


const validateC = (e) =>{

   
    if(!classr.value){
        cerroMsg.style.color="red";
        cerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
   
    else{
        cerroMsg.style.color="";
        cerroMsg.innerText = "";
    }
}

const subjectname = document.getElementById('subjectname');
const noserroMsg = document.getElementById('serror');


const validateNOS = (e) =>{

   
    if(!subjectname.value){
        noserroMsg.style.color="red";
        noserroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
   
    else{
        noserroMsg.style.color="";
        noserroMsg.innerText = "";
    }
}

const present_no = document.getElementById('present_no');
const perroMsg = document.getElementById('perror');


const validateP = (e) =>{

    const fullnamereg = /^[0-9]*$/;

    const testNameReg = fullnamereg.test(present_no.value);

    if(!present_no.value){
        perroMsg.style.color="red";
        perroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        perroMsg.style.color="red";
        perroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        perroMsg.style.color="";
        perroMsg.innerText = "";
    }
}

const club = document.getElementById('club');
const clerroMsg = document.getElementById('clerror');


const validateCl = (e) =>{

    const fullnamereg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$/;

    const testNameReg = fullnamereg.test(nationality.value);

    if(!club.value){
        clerroMsg.style.color="red";
        clerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        clerroMsg.style.color="red";
        clerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        clerroMsg.style.color="";
        clerroMsg.innerText = "";
    }
}

const accountnumber = document.getElementById('accountnumber');
const anerroMsg = document.getElementById('anerror');


const validateAN = (e) =>{

    const fullnamereg = /^[0-9]*$/;
    const testNameReg = fullnamereg.test(accountnumber.value);

    if(!accountnumber.value){
        anerroMsg.style.color="red";
        anerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        anerroMsg.style.color="red";
        anerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        anerroMsg.style.color="";
        anerroMsg.innerText = "";
    }
}

const totalamount = document.getElementById('totalamount');
const tferroMsg = document.getElementById('tferror');


const validateTF = (e) =>{

    const fullnamereg = /^[0-9]*$/;
    const testNameReg = fullnamereg.test(totalamount.value);

    if(!totalamount.value){
        tferroMsg.style.color="red";
        tferroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        tferroMsg.style.color="red";
        tferroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        tferroMsg.style.color="";
        tferroMsg.innerText = "";
    }
}


const amountpaid = document.getElementById('amountpaid');
const aperroMsg = document.getElementById('aperror');


const validateAP = (e) =>{

    const fullnamereg = /^[0-9]*$/;
    const testNameReg = fullnamereg.test(amountpaid.value);

    if(!amountpaid.value){
        aperroMsg.style.color="red";
        aperroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        aperroMsg.style.color="red";
        aperroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        aperroMsg.style.color="";
        aperroMsg.innerText = "";
    }
}

const housecapacity = document.getElementById('housecapacity');
const hcerroMsg = document.getElementById('hcerror');


const validateHC = (e) =>{

    const fullnamereg = /^[0-9]*$/;
    const testNameReg = fullnamereg.test(housecapacity.value);

    if(!housecapacity.value){
        hcerroMsg.style.color="red";
        hcerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        hcerroMsg.style.color="red";
        hcerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        hcerroMsg.style.color="";
        hcerroMsg.innerText = "";
    }
}

const roomcapacity = document.getElementById('room_capacity');
const rcerroMsg = document.getElementById('rcerror');


const validateRC = (e) =>{

    const fullnamereg = /^[0-9]*$/;
    const testNameReg = fullnamereg.test(roomcapacity.value);

    if(!roomcapacity.value){
        rcerroMsg.style.color="red";
        rcerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        rcerroMsg.style.color="red";
        rcerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        rcerroMsg.style.color="";
        rcerroMsg.innerText = "";
    }
}

const numberofrooms = document.getElementById('no_of_rooms');
const nrerroMsg = document.getElementById('nrerror');


const validateNR = (e) =>{

    const fullnamereg = /^[0-9]*$/;
    const testNameReg = fullnamereg.test(numberofrooms.value);

    if(!numberofrooms.value){
        nrerroMsg.style.color="red";
        nrerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        nrerroMsg.style.color="red";
        nrerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        nrerroMsg.style.color="";
        nrerroMsg.innerText = "";
    }
}


const roomnumber = document.getElementById('roomnumber');
const rnerroMsg = document.getElementById('rnerror');


const validateRN = (e) =>{

    const fullnamereg =/^[a-zA-Z0-9]+$/;
    const testNameReg = fullnamereg.test(roomnumber.value);

    if(!roomnumber.value){
        rnerroMsg.style.color="red";
        rnerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        rnerroMsg.style.color="red";
        rnerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        rnerroMsg.style.color="";
        rnerroMsg.innerText = "";
    }
}

const score = document.getElementById('score');
const scerroMsg = document.getElementById('scerror');


const validateSC = (e) =>{

    const fullnamereg = /^[0-9]*$/;
    const testNameReg = fullnamereg.test(score.value);

    if(!score.value){
        scerroMsg.style.color="red";
        scerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        scerroMsg.style.color="red";
        scerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        scerroMsg.style.color="";
        scerroMsg.innerText = "";
    }
}


const grade = document.getElementById('grade');
const grerroMsg = document.getElementById('grerror');


const validateGR = (e) =>{

    const fullnamereg =/^[a-zA-Z0-9]+$/;
    const testNameReg = fullnamereg.test(grade.value);

    if(!grade.value){
        grerroMsg.style.color="red";
        grerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        grerroMsg.style.color="red";
        grerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        grerroMsg.style.color="";
        grerroMsg.innerText = "";
    }
}



const passgrade = document.getElementById('passgrade');
const pgerroMsg = document.getElementById('pgerror');


const validatePG = (e) =>{

    const fullnamereg =/^[a-zA-Z0-9]+$/;
    const testNameReg = fullnamereg.test(passgrade.value);

    if(!passgrade.value){
        pgerroMsg.style.color="red";
        pgerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        pgerroMsg.style.color="red";
        pgerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        pgerroMsg.style.color="";
        pgerroMsg.innerText = "";
    }
}



const rawscore = document.getElementById('rawscore');
const rawscerroMsg = document.getElementById('rawscerror');


const validateRawSC = (e) =>{

    const fullnamereg = /^[0-9]*$/;
    const testNameReg = fullnamereg.test(rawscore.value);

    if(!rawscore.value){
        rawscerroMsg.style.color="red";
        rawscerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        rawscerroMsg.style.color="red";
        rawscerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        rawscerroMsg.style.color="";
        rawscerroMsg.innerText = "";
    }
}

const paddress = document.getElementById('paddress');
const paerroMsg = document.getElementById('paerror');


const validatePA = (e) =>{

    const fullnamereg = /^[a-zA-Z0-9\s,'-]*$/;

    const testNameReg = fullnamereg.test(paddress.value);

    if(!paddress.value){
        paerroMsg.style.color="red";
        paerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
     else if(!testNameReg){
         paerroMsg.style.color="red";
        paerroMsg.innerText = "wrong input";
       e.preventDefault();
    }
    else{
        paerroMsg.style.color="";
        paerroMsg.innerText = "";
    }
}

const parname = document.getElementById('parname');
const pnerroMsg = document.getElementById('pnerror');


const validatePN = (e) =>{

    const pnamereg = /^[a-zA-Z0-9\s,'-]*$/;

    const testNameReg = pnamereg.test(parname.value);

    if(!parname.value){
        pnerroMsg.style.color="red";
        pnerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
     else if(!testNameReg){
        pnerroMsg.style.color="red";
        pnerroMsg.innerText = "wrong input";
        e.preventDefault();
     }
    else{
        pnerroMsg.style.color="";
        pnerroMsg.innerText = "";
    }
}

const parnum = document.getElementById('parnum');
const pnumerroMsg = document.getElementById('pnumerror');


const validatePNUM = (e) =>{

    const parnumreg = /^[0-9]*$/;

    const testNameReg = parnumreg.test(parnum.value);

    if(!parnum.value){
        pnumerroMsg.style.color="red";
        pnumerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
       pnumerroMsg.style.color="red";
        pnumerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        pnumerroMsg.style.color="";
        pnumerroMsg.innerText = "";
    }
}

const prev_school = document.getElementById('prev_school');
const pserroMsg = document.getElementById('pserror');


const validatePS = (e) =>{

    const psreg = /^[a-zA-Z0-9\s,'-]*$/;

    const testNameReg = psreg.test(prev_school.value);

    if(!prev_school.value){
        pserroMsg.style.color="red";
        pserroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
     else if(!testNameReg){
       pserroMsg.style.color="red";
       pserroMsg.innerText = "wrong input";
       e.preventDefault();
     }
    else{
        pserroMsg.style.color="";
        pserroMsg.innerText = "";
    }
}


const crname = document.getElementById('courserequirement');
const crerroMsg = document.getElementById('crerror');


const validateCR = (e) =>{

    const crreg = /^[0-9]*$/;

    const testNameReg = crreg.test(crname.value);

    if(!crname.value){
        crerroMsg.style.color="red";
        crerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
     else if(!testNameReg){
       crerroMsg.style.color="red";
       crerroMsg.innerText = "wrong input";
       e.preventDefault();
     }
    else{
        crerroMsg.style.color="";
        crerroMsg.innerText = "";
    }
}


const SSN = document.getElementById('SSN');
const SSNerroMsg = document.getElementById('SSNerror');


const validateSSN = (e) =>{

    const SSNreg = /^[0-9]*$/;
    const testNameReg = SSNreg.test(SSN.value);

    if(!SSN.value){
        SSNerroMsg.style.color="red";
        SSNerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        SSNerroMsg.style.color="red";
        SSNerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        SSNerroMsg.style.color="";
        SSNerroMsg.innerText = "";
    }
}

const salary = document.getElementById('salary');
const salaryerroMsg = document.getElementById('salaryerror');


const validateS = (e) =>{

    const salaryreg = /^[0-9]*$/;
    const testNameReg = salaryreg.test(salary.value);

    if(!salary.value){
        salaryerroMsg.style.color="red";
        salaryerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        salaryerroMsg.style.color="red";
        salaryerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        salaryerroMsg.style.color="";
        salaryerroMsg.innerText = "";
    }
}

const subname = document.getElementById('subjectname');
const suberroMsg = document.getElementById('suberror');


const validateSN = (e) =>{

    const subreg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$/;

    const testNameReg = subreg.test(subname.value);

    if(!subname.value){
        suberroMsg.style.color="red";
        suberroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
     else if(!testNameReg){
       suberroMsg.style.color="red";
       suberroMsg.innerText = "wrong input";
       e.preventDefault();
     }
    else{
        suberroMsg.style.color="";
        suberroMsg.innerText = "";
    }
}


const yeargroup = document.getElementById('yeargroup');
const ygerroMsg = document.getElementById('ygerror');


const validateYG = (e) =>{

    const fullnamereg = /^[0-9]*$/;
    const testNameReg = fullnamereg.test(yeargroup.value);

    if(!yeargroup.value){
        ygerroMsg.style.color="red";
        ygerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        ygerroMsg.style.color="red";
        ygerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        ygerroMsg.style.color="";
        ygerroMsg.innerText = "";
    }
}