<?php
$link = mysqli_connect($hn,$us,$ps,$db);
$uid = $_SESSION['userid'];
$res = $link->prepare("SELECT * FROM forms WHERE owner = ?");
$res->bind_param('i',$uid);
$res->execute();
$result = $res->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
crudlog(var_export($data,true),false);
?>
<section style="border:1px solid black;">

<h2>Your forms:</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
</tr>

<?php foreach($data as $row) { ?>

    <tr>
        <td><?=$row['id']?></td>
        <td><a href="form.php/?form=<?=$row['id']?>"><?=$row['name']?></a></td>
    </tr>

<?php } ?>


</table>



</section>

<?php
$link->close();
?>