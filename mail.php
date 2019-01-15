<?    
error_reporting(E_ALL);
ini_set('display_errors', 'On');

    $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $sql = "select * from tbldatingusermaster order by userid desc";
    $result = $db->query($sql);
        
    while($data = $result->fetch_object()){


$userid = $data->userid;

    $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $sql2 = "select * from tbldatingusermaster where userid='$userid' order by userid desc";
    $result2 = $db2->query($sql2);
    while($data2 = $result2->fetch_object()){

echo $data2->userid."<br>";

    $nnn1 = $data2->dob;
    $birthday_timestamp = strtotime($nnn1);  

    $age1 = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);

    $email = $data2->email;
    $gender2 = $data2->genderid;
    $location2 = $data2->countryid;



    $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $sql1 = "select * from tbldatingpartnerprofilemaster";
    $result1 = $db1->query($sql1);
    while($data1 = $result1->fetch_object()){  

    $age = $data1->agefrom;
    $gender1 = $data1->genderid;    
    $location1 = $data1->location;


        if($gender1 != $gender2){
           
        if($age < $age1){
           
        if($location1 == $location2){


echo $data2->userid;



        }
        }
        }
}
}
}
?>