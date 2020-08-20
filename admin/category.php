<?php
    $numRows = mysqli_num_rows($_DATA['category']);
    $page_num = 0;
    if(isset($_GET['page_num'])){
        $page_num = $_GET['page_num'];
    }
    $numPerPage = 10;
    $lastPage = ceil($numRows/$numPerPage);
    $start = $page_num * $numPerPage;

    
    $end = ($start + $numPerPage) < $numRows ? $start + $numPerPage : $numRows; 
    $previous = $page_num > 0 ? $page_num - 1 : 0;
    $next = $page_num < ((($lastPage - 1) >= 0)?$lastPage - 1: 0) ? $page_num + 1 : ((($lastPage - 1) >= 0)?$lastPage - 1: 0);
    $lastItem = ((($page_num + 4 )< $lastPage)?$page_num + 4:$lastPage);

    $cat_data;
    $i = 0;
    while($row = mysqli_fetch_array($_DATA['category'])){
        $cat_data[$i] = $row;
        $i++;
    }
?>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> > Category</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Category</h1> 
        <a href="admin.php?page=add_category"><button class="btn btn-success btn-md">Thêm Category</button></a>
    </div>
</div><!--/.row-->

<div class="row user">
    <table class="table table-striped table-bordered user__table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa cate</th>
          </tr>
        </thead>
        <tbody>
            <?php for($j = $start; $j < $end; $j++){ ?>
                <tr>
                    <th scope="row"><?php echo $cat_data[$j]['cat_ID']?></th>
                    <td><?php echo $cat_data[$j]['cat_name']?></td>
                    <td><?php echo $cat_data[$j]['cat_des']?></td>
                    <td><button class="btn btn-success btn-sm" onclick="window.location.replace('admin.php?page=edit_category&id=<?php echo $cat_data[$j]['cat_ID']?>')"><i class="fas fa-pen"></i></button></td>
                    <td><button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $cat_data[$j]['cat_ID']?>')"><i class="fas fa-times"></i></button></td>
                </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>
    <div class="pagination">
        <a href="admin.php?page=category&page_num=0">First</a>
        <a href="admin.php?page=category&page_num=<?php echo $previous;?>">&laquo;</a>
        <?php for($i = ($page_num - 3 > 0)?$page_num - 3: 0; $i < $lastItem; $i++) { ?>
            <a href="admin.php?page=category&page_num=<?php echo $i;?>"<?php if($page_num == $i) echo 'class="active"';?> ><?php echo $i + 1;?></a>
        <?php 
        }  
        ?>
        <a href="admin.php?page=category&page_num=<?php echo $next;?>">&raquo;</a>
        <a href="admin.php?page=category&page_num=<?php echo $lastPage - 1;?>">Last</a>
    </div>
      
</div><!--/.row-->
<script>
    function confirmDelete(i){
        const rs = confirm('Bạn có muốn xóa category này?');
        if(rs){
            window.location.replace("delete_category.php?id=" + i);
        }else{
            return;
        }
    }
</script>