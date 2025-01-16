<?php
include("admin_header.php");
?>
<?php
if(!isset($_SESSION["email"])){
    echo "<script>window.location.assign('admin_login.php?msg=Please Login.')</script>";
}
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bgc.jpg'); height:520px;" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-5">
        <h1 class="mb-5 bread fw-bold">Manage Tables</h1>
      </div>
    </div>
  </div>
</section>
	</section>
	<div class="container table-responsive">
    <h1 class="text-center mt-4 mb-3 h1"><img src="images/nirvana.png" style="height:40px;"></h1>
    <?php
    if(isset($_GET["msg"])){
        echo "<div class='alert alert-info'>".$_GET['msg']."</div>";
    }
    ?>
    <table class="table table-striped table-hover mb-5">
        <tr >
            <th>Sno</th>
            <th>Table No.</th>
            <th>Title</th>
            <th>No. of seats</th>
            <th>image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            include("config.php");
            $query="SELECT * from `table_type`";
            $result=mysqli_query($connect,$query);
            $sno=1;
            while($data=mysqli_fetch_assoc($result)){
                
                ?>
            <tr>
                <td><?php echo $sno;?></td>
                
                <td><?php echo $data['table_no']?>
                <td><?php echo $data['title']?>
                <td><?php echo $data['no_of_seats']?>
                <td>
                    <img src="images/<?php echo $data['image']?>" style="height:100px;width:100px;">
                </td>
                <td>
                <a href="edit_table.php?id=<?php echo $data['id']?>" class="btn btn-success">
                        <i class="bi bi-pencil-square"></i>
                    </a>   
                </td>
                <td> 
                    <a href="delete_table.php?id=<?php echo $data['id']?>" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>

        <?php
        // $sno=$sno+1;
        $sno++;
            }
        ?>
        
    </table>
</div>
<?php
include("footer.php");
?>