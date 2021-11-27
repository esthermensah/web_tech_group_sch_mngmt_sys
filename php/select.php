<?php
require "../php/database_connection_test.php";

$pid = $_POST['ID'];


function listing($conn,$pid){
    $stuinfo = mysqli_query($conn, "SELECT P.person_id, D.deptnum, C.Course_id, Bhouse.houseID, Ssub.SID, sub.subjectID, att.SID, fp.SID, fp.AccID, f.feesID, res.Resultnum, Ssr.Resultnum, P.firstname, P.lastname, S.SID, P.gender, P.DOB, P.nationality, P.address, 
    S.class, S.yeargroup, S.club, C.CourseName, C.Courserequirement, D.departmentName, D.Headofdepartment, sub.nameofsubject, sub.typeofsubject,
    att.PresentNo, att.Months, f.AccNum, fp.totalamount, f.installment, f.AmountPaid, fp.academicyear, Bhouse.housename, Bhouse.roomnumber,
    Bhouse.HouseCapacity, Bhouse.Numberofrooms, Bhouse.RoomCapacity, res.score, Ssr.passgrade
    from Person as P Inner Join Students as S on P.Person_id=S.SID
    Inner Join Department as D on D.deptnum=P.deptnum
    Inner Join Courses as C on C.Course_id=S.CourseID
    Inner Join BoardingHouse as Bhouse on Bhouse.houseID=S.HouseNo
    Inner Join studentsubject as Ssub on Ssub.SID=S.SID
    Inner Join subjects as sub on sub.subjectID=Ssub.subjectID
    Inner Join attendance as att on att.SID=S.SID
    Inner Join feespayment as fp on fp.SID=S.SID
    Inner Join fees as f on f.feesID=fp.AccID
    Inner Join studentsubjectresults as Ssr on Ssr.subjectID=sub.subjectID
    Inner Join results as res on res.Resultnum=Ssr.Resultnum
    where S.SID='$pid'
    Order by P.lastname asc");
    $data=mysqli_fetch_all($stuinfo,MYSQLI_ASSOC);
    return $data;
}

// echo listing($conn,$pid);
echo json_encode(listing($conn,$pid));


?>