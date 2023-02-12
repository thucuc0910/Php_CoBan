<?php
    include "header.php";
    include "class/user_class.php"
?>
<?php
    $user = new user;
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo "<script>window.location = 'userlist.php'</script>";
    }
    else {
        $id = $_GET['id'];
    }
    $get_user =  $user -> get_user($id);
    if($get_user){
        $result = $get_user -> fetch_assoc();
    }
?>


<?php
    $user = new user;
    $id = $_GET['id'];
    $get_user = $user -> get_user($id);
    if($get_user){
        $resultA = $get_user -> fetch_assoc();
    }
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $usertype = $_POST['usertype'];
        $update_user = $user ->update_user(
            $id,
            $name,
            $email,
            $usertype);
    }

?>
                <div class="container" style="padding: 50px 0px  50px 0; ">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <div class="col-md-8">
                            <h1 class="text-success d-flex justify-content-center align-items-center">CẬP NHẬT THÀNH VIÊN</h1>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card py-5" style="background-color: rgb(226,227,229)">
                                    <div class="inputs px-4" style="padding: 5px;"> 
                                        <span class="text-uppercase">Tên thành viên<span style="color: red;">*</span></span> 
                                        <input  class="form-control" value="<?php echo $result['name'] ?>" name="name" required type="text" placeholder="Nhap ten"> 
                                    </div>

                                    <div class="inputs px-4" style="padding: 5px;"> 
                                        <span class="text-uppercase">Email<span style="color: red;">*</span></span> 
                                        <input  class="form-control" value="<?php echo $result['email'] ?>" required type="text" name="email"> 
                                    </div>

                                    <div class="inputs px-4" style="padding: 5px;"> 
                                        <span class="text-uppercase">Loại thành viên<span style="color: red;">*</span></span> 
                                        <input  class="form-control" value="<?php echo $result['usertype'] ?>" required type="text" name="usertype"> 
                                    </div>

                                    <div class="inputs px-4" style="padding: 5px"> 
                                        <button class="btn btn-danger" type="submit">Cập nhật</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </body>

</html>