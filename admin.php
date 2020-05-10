<?php
require 'stubs/header.php';

?>

<h2>Admin</h2>

<div class="message"></div>


    <input type="text" class="submit-form-field">
    <p class="ajax-submit" href="#">Submit</p>


    <script>
         $(document).ready(function(){
            $('.ajax-submit').click(function(){
                
                var formName = $('.submit-form-field').val();
                formName = escapeTags(formName);
                //is it blank?
                if (formName !== null){

                    //todo
                    //does this name exist already? do validation here and also in php script


                    $.post( "stubs/submitNewForm.php", { name: formName} );
                }

                $('.message').html("<h1>test</h1>");

            });
         })
    </script>
<?php
require 'stubs/footer.php';
?>