<?php
    include "header.php";
    include "class/user_class.php"
?>

<?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['keyword'];
            $user = new user;
            $show_user_search = $user ->show_user_search($name);
        }
        else{
            $user = new user;
            $show_user = $user ->show_user();
        }
?>

            <div class="admin-content-right" style="width: 100%; padding: 1rem 9%;">
                <div class="admin-content-right-cartegory-list">
                    <h1 class="text-danger d-flex justify-content-center align-items-center">DANH SÁCH THÀNH VIÊN</h1>
                    <form action="" class="search-form" method="POST"
                        style="float: right; border: 1px solid rgb(13,110,253); padding: 0px; border-radius: 5px">
                        <input type="text" name="keyword" required="" placeholder="  Tìm kiếm..."  >
                        <button class="btn btn-primary"  name=" search_name" type="submit">Search</button>
                    </form>

                    <table class="table table-secondary" style="margin-top: 70px;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Loại thành viên</th>
                                <th>Tùy biến</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if (isset($_POST['search_name'])) { 
                                    $name = $_POST['keyword'];
                                    if($show_user_search){$i=0;
                                        while($result = $show_user_search->fetch_assoc()){$i++
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $result['id'] ?></td>
                                                <td><?php echo $result['name'] ?></td>
                                                <td><?php echo $result['email'] ?></td>
                                                <td><?php echo $result['usertype'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary">
                                                        <a href="useredit.php?id=<?php echo $result['id'] ?>">
                                                            <i class="fas fa-edit" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                    
                                                    <button type="button" class="btn btn-danger">
                                                        <a href="userdelete.php?id=<?php echo $result['id'] ?>">
                                                            <i class="fas fa-trash" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                    
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                        }else{
                                            if($show_user){$i=0;
                                            while($result = $show_user->fetch_assoc()){$i++;      
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $result['id'] ?></td>
                                                <td><?php echo $result['name'] ?></td>
                                                <td><?php echo $result['email'] ?></td>
                                                <td><?php echo $result['usertype'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary">
                                                        <a href="useredit.php?id=<?php echo $result['id'] ?>">
                                                            <i class="fas fa-edit" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                    
                                                    <button type="button" class="btn btn-danger">
                                                        <a href="userdelete.php?id=<?php echo $result['id'] ?>">
                                                            <i class="fas fa-trash" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                    
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                        }
                                            ?>      
                        </tbody>

                        
                    </table>
                                

                </div>
            </div>
        </section>
    </body>
</html>