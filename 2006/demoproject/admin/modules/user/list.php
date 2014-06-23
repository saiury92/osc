<h1>Danh sách thành viên</h1>

<div id="control">
        <a href="#">Delete Record</a>
        <a href="index.php?module=user&action=insert">Insert</a>
</div>

<?php
require_once '../library/Pagination.php';
$users = new Users;

$pagination = new Pagination($users,2,3);
$page = isset($_GET['page']) && $_GET['page'] != '' ? $_GET['page'] : 1;
$user_pag = $pagination->cal(($page-1)*$pagination->getLimit());

?>
<table width="700" border="1" cellpadding="0" cellspacing="0" id="list" style="clear:both;">
    <tr>
        <!--<td class="header" align="center"><input type="checkbox" /></td>-->
        <td class="header">ID</td>
        <td class="header">Name</td>
        <td class="header">Email</td>
        <td class="header">Phone</td>
        <td class="header">Address</td> 
        <td class="header">Gender</td>
        <td class="header">Edit</td>
        <td class="header">Delete</td>                                                                                            
    </tr>
    <?php
        foreach ($user_pag as $value):
    ?>
    <tr>
        <!--<td align="center"><input type="checkbox" /></td>-->
        <td><?php echo $value['id'];?></td>
        <td><?php echo $value['name']; ?></td>
        <td><?php echo $value['email']; ?></td>
        <td><?php echo $value['phone']; ?></td>
        <td><?php echo $value['address']; ?></td>  
        <td><?php echo $value['gender'] == 1 ? 'Nam' : 'Nữ';?></td>
        <td><a href='index.php?module=user&action=edit&id=<?php echo $value['id']; ?>'>Edit</td>
        <td><a href='index.php?module=user&action=delete&id=<?php echo $value['id']; ?>'>Delete</td>
    </tr>
        <?php endforeach; ?>
</table>
<?php 
//phan trang
echo $pagination->print_pagination($page, 'index.php?module=user&action=list&');
?>