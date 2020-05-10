<?php
require 'stubs/header.php';


if (isset($_GET['form'])){
    $link = mysqli_connect($hn,$us,$ps,$db);

    if (isset($_POST['deleteField'])){
        $res = $link->prepare('DELETE FROM fields WHERE id = ?');
        $res->bind_param('i',$_POST['deleteField']);
        $res->execute();
    }
    //Sql injection opportunity
    $res = $link->query("SELECT * FROM fields WHERE form_id =".$_GET['form']);
    ?>
    <h2>Form <?=$_GET['form']?></h2>
    <table style="border:1px solid black;">
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Name</th>
                <th>Delete</th>
            </tr>  
        <?php foreach($res as $single){ ?>
        
            <tr>
                <td style="border:1px solid gray; padding: 0.5rem 1rem"><?=$single['id']?></td>
                <td style="border:1px solid gray; padding: 0.5rem 1rem"><?=$single['type']?></td>
                <td style="border:1px solid gray; padding: 0.5rem 1rem"><?=$single['name']?></td>
                <td style="border:1px solid gray; padding: 0.5rem 1rem"><form action="../form.php/?form=<?=$_GET['form']?>" method="post"><input type="hidden" name="deleteField" value="<?=$single['id']?>"><input type="submit" style="color:red" value="Delete Row"></form></td>
            </tr>

        <?php 
            }  
        ?>
    </table>

    <!-- ordering/filtering? -->

    <h2>Add new field</h2>
    <label>Name</label>
    <input id="field-name" name="fieldName" type="text">
    <label>Type</label>
    <select name="typeSelect">
        <option value="text">Text</option>
        <option value="dropdown">Dropdown</option>
        <option value="heading">Heading</option>

    </select>

    <span id="field-submit">
        <a href="#">Submit</a>
    </span>
    <script>
     $(document).ready(function(){
        $('#field-submit a').click(function(){
            var nameVal = $('input[name="fieldName"]').val();
            var selectVal = $('select[name="typeSelect"]').val();
            $.post( "../stubs/submitNewField.php", { name: nameVal, type: selectVal, formId : <?=$_GET['form']?>} );
        });
    });

    
    
    
    </script>
<?php
}
else echo "No form supplied";
?>