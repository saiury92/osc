<h1>List All Student</h1>
                <div id="control">
                        <a href="#">Delete Record</a>
                	<a href="index.php?module=user&action=insert">Insert</a>
                </div>
                <table width="700" border="1" cellpadding="0" cellspacing="0" id="list" style="clear:both;">
                    <tr>
                        <td class="header" align="center"><input type="checkbox" /></td>
                    	<td class="header">ID</td>
                    	<td class="header">Name</td>
                    	<td class="header">Email</td>
                        <td class="header">Address</td> 
                    	<td class="header">Phone</td>
                    	<td class="header">Gender</td> 
                        <td class="header">Edit</td>
                        <td class="header">Delete</td>                                                                                            
                    </tr>
		    <?php
                    $name = $email = $address = $phone =$gender= "";
			$student = new student();
                        //$stuList = array(array());
                        $stuList= $student->getAll();
			//debug($student->getAll());
                        
			foreach($stuList as $key=>$value) {
		    ?>
                    <tr>
                        <td align="center"><input type="checkbox" /></td>
                    	<td>ID</td>
                    	<td><?php echo $value[0]; ?></td>
                    	<td><?php echo $value[1]; ?></td>
                        <td><?php echo $value[2]; ?></td> 
                    	<td><?php echo $value[3]; ?></td>
                    	 <td><?php echo $value[4]; ?></td> 
                        <td><a href='index.php?module=user&action=edit&id=<?php echo $key; ?>'>Edit</td>
			<td><a href='index.php?module=user&action=delete&id=<?php echo $key; ?>'>Delete</td>
                    </tr>
			<?php } ?>
                </table>