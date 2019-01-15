<?

$conn = mysqli_connect("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");

$result = mysqli_query($conn,"select * from tbl_consultant_reviews");

$data = array();
while($row = mysqli_fetch_assoc($result))
{
    $data[] = $row;
}

echo json_encode($data);
?>