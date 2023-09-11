<?php
session_start();

if(isset($_SESSION["email"])){
header('location:admin.php');
}
include "db.php";
$_SESSION["incorect"]='';

if(isset($_POST["conncexion"])){

    $sqlRech= "SELECT * FROM admins where email='".$_POST["email"]."' and password='".$_POST["password"]."'";
    $statement = $con->prepare($sqlRech);
    $statement->execute();
    $utilisateur = $statement->fetch(PDO::FETCH_OBJ);
    if($utilisateur <> null) {
        $_SESSION["email"]=$utilisateur->email;
        header ('location:admin.php');
    }
    else{
        $_SESSION["incorect"]='<p><font color=red>mot pass ou login incorrect<p></font>';
    }
}

?>

<?php
include "header.php";
?>
    <div class="page-heading header-text">
    
    </div>
    
    <div class="products">
        <div class="container">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-2 bg-light">
                    <div class="text-center">
                        <h3 class="text-primary">Sign In</h3>
                    </div>
                    <form action="login.php" method="post">
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="password">
                            </div>
                            <button class="btn btn-primary text-center mt-4" type="submit" name="conncexion">
                                Login
                            </button>
                            <p class="text-center mt-3">
                                <?php echo $_SESSION["incorect"];?>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>

<?php
  include "footer.php";
?> 