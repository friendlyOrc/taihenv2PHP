<?php
    include_once('config/connection.php');
    $numRows = mysqli_num_rows($_DATA['articles']);
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
    
    $articles;
    $i = 0;
    while($row = mysqli_fetch_array($_DATA['articles'])){
        $articles[$i] = $row;
        $i++;
    }
?>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Trang chủ quản trị </li>
        <li class=""> > Articles</li>
    </ol>
</div>

<div class="row page-header">
    <div class="col-sm-12">
        <h1>Articles</h1> 
        <a href="admin.php?page=add_article"><button class="btn btn-success btn-md">Thêm Article</button></a>
    </div>
</div><!--/.row-->

<div class="row user">
    <table class="table table-striped table-bordered user__table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Chaps</th>
            <th scope="col">View</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Ngày update</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Xem DS chương</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa article</th>
          </tr>
        </thead>
        <tbody>
            <?php for($j = $start; $j < $end; $j++){ ?>
                <tr>
                    <th scope="row"><?php echo $articles[$j]['ar_ID']?></th>
                    <td><?php echo $articles[$j]['ar_name']?></td>
                    <td><?php echo $articles[$j]['ar_pic']?></td>
                    <td><?php echo $articles[$j]['ar_chap_num']?></td>
                    <td><?php echo $articles[$j]['ar_view']?></td>
                    <td><?php echo $articles[$j]['ar_des']?></td>
                    <td><?php echo $articles[$j]['ar_date']?></td>
                    <?php
                        if($articles[$j]['ar_stt'] == 1){ ?>
                        <td>Hoàn thành</td>
                    <?php
                    }else { ?>
                        <td>Chưa hoàn thành</td>
                    <?php
                    }
                    ?>
                    <td><button class="btn btn-success btn-sm" onclick="window.location.replace(`admin.php?page=chapter&id=<?php echo $articles[$j]['ar_ID']?>`)"><i class="fas fa-eye"></i></button></td>
                    <td><button class="btn btn-success btn-sm" onclick="window.location.replace('admin.php?page=edit_article&id=<?php echo $articles[$j]['ar_ID']?>')"><i class="fas fa-pen"></i></button></td>
                    <td><button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $articles[$j]['ar_ID']?>')"><i class="fas fa-times"></i></button></td>
                </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>
    <div class="pagination">
        <a href="admin.php?page=articles&page_num=0">First</a>
        <a href="admin.php?page=articles&page_num=<?php echo $previous;?>">&laquo;</a>
        <?php for($i = ($page_num - 3 > 0)?$page_num - 3: 0; $i < $lastItem; $i++) { ?>
            <a href="admin.php?page=articles&page_num=<?php echo $i;?>"<?php if($page_num == $i) echo 'class="active"';?> ><?php echo $i + 1;?></a>
        <?php 
        }  
        ?>
        <a href="admin.php?page=articles&page_num=<?php echo $next;?>">&raquo;</a>
        <a href="admin.php?page=articles&page_num=<?php echo $lastPage - 1;?>">Last</a>
    </div>
      
</div><!--/.row-->
<script>
    function confirmDelete(i){
        const rs = confirm('Bạn có muốn xóa article này?');
        if(rs){
            window.location.replace("delete_article.php?id=" + i);
        }else{
            return;
        }
    }
</script>