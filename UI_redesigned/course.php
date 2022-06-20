<?php
session_start();

?>

<style>

.title {
font-size: 70px;
letter-spacing: 0px;
word-spacing: 0.4px;
color: #603E94;
font-weight: bold;
text-decoration: underline solid rgb(93, 159, 64);
font-style: normal;
font-variant: small-caps;
text-transform: capitalize;
background-color: rgba(250, 195, 42, 0.9);
text-align: center;
}

</style>

<!-- ANGULAR JS TEMPLATE FOR A COURSE PAGE VIEW --> 

<div class = "row">
	<div class="col-12" class = "cover" style = "background-image: url('{{ content[0].filePath }}'); height: 300px; width: 100%; background-repeat: no-repeat; background-size: cover;">
        <p class = "title"><b>{{ title }}</p> 
    </div>
    <div class="col-12">
    <p><i>A <b>{{ field }}</b> course taught by <b>{{ teacher }}</b></i></p>
    <br><br>
        <h2> {{ description }} </h2>
    </div>
</div>


<br><br>


<!-- Enroll Button for Students -->
<?php if (isset($_SESSION['userName']) && $_SESSION['accountType'] == 'Student') : ?> 
            <form action="internals/enroll.inc.php" method="POST">
                <input type="hidden" name="courseID" value="{{ courseID }}">
                <button class = "button-big col-4 col-s-12" type="submit" name="enroll-button"> {{ enroll }}</button>
            </form>
<?php endif; ?>

<script>




</script>






