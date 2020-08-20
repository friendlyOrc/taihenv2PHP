<?php
    include_once('config/connection.php');
    if(!isset($_DATA['random_pic'])){
        $_DATA['random_pic'] = mysqli_query($connect, "SELECT * FROM pic");
    }
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> > Random pic</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Randompic</h1> 
        <a href="admin.php?page=add_random_pic"><button class="btn btn-success btn-md">Thêm random pic</button></a>
    </div>
</div><!--/.row-->

<div class="row user">
    <table class="table table-striped table-bordered user__table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Xem</th>
            <th scope="col">Xóa</th>
          </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($_DATA['random_pic'])){ ?>
                <tr>
                    <th scope="row"><?php echo $row['pic_ID']?></th>
                    <td><?php echo $row['pic_name']?></td>
                    <td><img src="images/pic/<?php echo $row['pic_name']?>" id="rdImg"/></td>
                    <td><button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $row['pic_ID']?>')"><i class="fas fa-times"></i></button></td>
                </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>
      
</div><!--/.row-->
<style>
    #rdImg{
        max-width: 200px;
    }
</style>
<script>
    function confirmDelete(id){
        const rs = confirm('Bạn có muốn xóa pic này?');
        if(rs){
            window.location.replace(`delete_random_pic.php?id=${id}`);
        }else{
            return;
        }
    }

</script>