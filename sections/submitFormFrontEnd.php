<section style="border:1px solid black; padding:1rem">

    <input type="text" class="submit-form-field">
    <span class="ajax-submit">
    <a style="display:block;padding:.5rem 1rem;background-color:red;color:white;border-radius:5px;width:max-content; margin:1rem;" href="#">Submit</a>
    </span>

</section>
<script>
        $(document).ready(function(){
        $('.ajax-submit a').click(function(){
            
            var formName = $('.submit-form-field').val();
            formName = escapeTags(formName);
            //is it blank?
            if (formName !== null){

                //todo
                //does this name exist already? do validation here and also in php script


                $.post( "stubs/submitNewForm.php", { name: formName} );
            }

            // $('.message').html("<h1>test</h1>");

        });
        })
</script>