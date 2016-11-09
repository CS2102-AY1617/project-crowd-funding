<form onsubmit="return validate()" name="search" action="backend_api/form_controller.php?type=search" method="post">

    <div class="container">
        <h1>
            <input name="searchfield" class="search" type="text" placeholder="Search">
        </h1>
        <hr>
        <button type="submit" class="btn btn-primary" name="submit">Random Walk</button>
    </div><!-- container -->
</form>
<!-- BEGIN SWEETALERT PLUGIN AND SCRIPT -->
<script src="assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/js/sweetalert.css">
<script>
    function validate()
    {

        if( document.search.searchfield.value == "" ) {
            swal("Oops...", "Please Fill in Your search field", "error");
            document.search.searchfield.focus();
            return false;
        }

        return true ;
    }
</script>
<!-- END SWEETALERT PLUGIN AND SCRIPT -->

