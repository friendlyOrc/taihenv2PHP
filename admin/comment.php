<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> > Comment</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Comment</h1> 
    </div>
</div><!--/.row-->

<div class="row user">
    <table class="table table-striped table-bordered user__table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Article ID</th>
            <th scope="col">Content</th>
            <th scope="col">Xóa Comment</th>
          </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($_DATA['comment'])){ ?>
                <tr>
                    <th scope="row"><?php echo $row['cmt_ID'];?></th>
                    <td><?php echo $row['ar_ID'];?></td>
                    <td><?php echo $row['cmt_content'];?></td>
                    <td><button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $row['cmt_ID'];?>')"><i class="fas fa-times"></i></button></td>
                </tr>
            <?php 
            } 
            ?>
            
        </tbody>
      </table>
      
</div>
<script>
    function confirmDelete(i){
        const rs = confirm('Bạn có muốn xóa user này?');
        if(rs){
            window.location.replace("delete_comment.php?id=" + i);
        }else{
            return;
        }
    }
</script>