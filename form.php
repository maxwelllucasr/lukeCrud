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
    
    <h2>Form Options</h2>
    <label>Is Visible</label><input class="is_active_checkbox" value="1" type="checkbox"> <a href="#" class="is_active_submit">Submit</a>



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

    <!-- json add as many as you want -->
    <div class="dropdown-options" style="display:none">
            <label>Dropdown options</label>
            <br>
            <a href="#" class="add-another-dropdown-option">Add another option</a>
            <br>
                <div class="dropdown-options-inner">
                    <input class="dropdown-option" type="text" name="form_<?=$_GET['form']?>_option_1" /><br>
                </div>
            
    </div>


    <script>
     $(document).ready(function(){
        var dropdownCount = 1;

        $('select[name="typeSelect"]').change(function(){
            if ($(this).val() == "dropdown"){
                $('.dropdown-options').css('display','block');
            }
            else{
                $('.dropdown-options').css('display','none');
            }
        })
        $('.add-another-dropdown-option').click(function(){
            dropdownCount++;
            $('.dropdown-options-inner').append('<input class="dropdown-option" type="text" name="form_<?=$_GET['form']?>_option_'+dropdownCount+'" /><br>')
        })
        $('#field-submit a').click(function(){
            var nameVal = $('input[name="fieldName"]').val();
            var selectVal = $('select[name="typeSelect"]').val();

            var options = Array();
            for (var i = 1; i < dropdownCount+1; i++){
                option = $('.dropdown-option[name="form_<?=$_GET['form']?>_option_'+i+'"]').val();
                options.push(option);
            }
            jsonOptions = JSON.stringify(options);
            $.post( "../stubs/submitNewField.php", { name: nameVal, type: selectVal, formId : <?=$_GET['form']?>, options : jsonOptions} );
        });
        $('.is_active_submit').click(function(){
            $.post("../stubs/formIsActive.php", { is_active:($('.is_active_checkbox').is(':checked')), form: <?=$_GET['form']?>} );
            // if ($('.is_active_checkbox').val() == 1)
        })
    });
     
    
    
    
    </script>
<?php
}
else echo "No form supplied";
?>