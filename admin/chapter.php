<?php
    include_once('config/connection.php');
    
    $cur_ar = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM article WHERE ar_ID = ".$_GET['id']));
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> > Articles</li>
        <li class=""> > Chapter</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1><?php echo $cur_ar['ar_name']?>  - Chapters</h1> 
        <a href="admin.php?page=add_chapter&id=<?php echo $cur_ar['ar_ID']?>"><button class="btn btn-success btn-md">Thêm chapter</button></a>
    </div>
</div><!--/.row-->

<div class="row user">
    <table class="table table-striped table-bordered user__table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Số trang</th>
            <th scope="col">Ngày update</th>
            <th scope="col">Sửa tên</th>
            <th scope="col">Xóa chapter</th>
          </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($_DATA['chapters'][$cur_ar['ar_ID']])){ ?>
                <tr>
                    <th scope="row"><?php echo $row['chap_ID']?></th>
                    <td><?php echo $row['chap_name']?></td>
                    <td><?php echo $row['chap_page']?></td>
                    <td><?php echo $row['chap_date']?></td>
                    <td><button class="btn btn-success btn-sm" onclick="window.location.replace('admin.php?page=edit_chapter&id=<?php echo $cur_ar['ar_ID']?>&chap=<?php echo $row['chap_ID']?>')"><i class="fas fa-pen"></i></button></td>
                    <td><button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $cur_ar['ar_ID']?>', '<?php echo $row['chap_ID']?>')"><i class="fas fa-times"></i></button></td>
                </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>
      
</div><!--/.row-->
<script>
    function confirmDelete(id, index){
        const rs = confirm('Bạn có muốn xóa chapter này?');
        if(rs){
            window.location.replace(`delete_chapter.php?id=${id}&chap=${index}`);
        }else{
            return;
        }
    }
</script>