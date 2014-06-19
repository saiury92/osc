<?php
require_once("comonfuntion.php");
?>
    <html>
        <head>
            <meta http-equiv="content-type" content="text/html" />
            <style>
                label{
                    float: left;
                    width: 120px;
                }
                input, select{
                    margin-bottom: 5px;
                }
                .error{
                    color:red;
                }
            </style>

        </head>
        <body>
            <?php
            $array_post = array('name','id','email','phone','address','gender','country');
            $param = _contructArray($array_post);
            $error = _contructArray($array_post);
            if(isPost()){
                $param['name'] = getParams('name');
                $error['name'] = validateMessages('name', 'Vui long nhap ten');
                $param['id'] = getParams('id');
                $error['id'] = validateMessages('id', 'Vui long nhap mã sinh viên');
                $param['email'] = getParams('email');
                $error['email'] = validateMessages('email', 'Vui long nhap email');
                $param['phone'] = getParams('phone');
                $error['phone'] = validateMessages('phone', 'Vui long nhap điện thoại');
                $param['address'] = getParams('address');
                $error['address'] = validateMessages('address', 'Vui long nhap dia chi');
                $param['gender'] = getParams('gender');
                $error['gender'] = validateMessagesRadio('gender', 'Vui long nhap gioi tinh');
                $param['country'] = getParams('country');
                $error['country'] = validateMessages('country','Vui long chon quoc gia');
            }
            ?>
            <form action="" method="post">
                <label>Quoc gia</label>
                <select name="country">
                    <option value="">Chon quoc gia</option>
                    <option value="1" <?php setBox("country",1,"selected"); ?>>Denmark</option>
                    <option value="2" <?php setBox("country",2,"selected"); ?>>Viet Nam</option>
                    <option value="3" <?php setBox("country",3,"selected"); ?>>Japan</option>
                    <option value="4" <?php setBox("country",4,"selected"); ?>>Germany</option>
                </select>
                <span class="error">
                    <?php echo $error['country']; ?>
                </span>
                <br />

                <label>Ma sinh vien</label>
                <input type="text" name="id" value="<?php echo $param['id'];  ?>" size="35" />
                <span class="error">
                    <?php  echo $error['id'];?>
                </span>
                <br />

                <label>Ten sinh vien</label>
                <input type="text" name="name"  value="<?php echo $param["name"];  ?>" size="35" />
                <span class="error">
                    <?php echo $error['name'] ?>
                </span>
                <br />

                <label>Email</label>
                <input type="text" name="email" value="<?php echo $param["email"]; ?>" size="35" />
                <span class="error">
                    <?php echo $error['email'] ?>
                </span>
                <br />

                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo $param["phone"]; ?>" size="35" />
                <span class="error">
                    <?php  echo $error['phone'];?>
                </span>
                <br />

                <label>Dia chi</label>
                <input type="text" name="address" value="<?php echo $param["address"]; ?>" size="35" />
                <span class="error">
                    <?php  echo $error['address'];?>
                </span>
                <br />

                <label>Gioi tinh</label>
                 Nam &nbsp;<input type="radio" name="gender" value="2" size="35" <?php setBox("gender",2) ?>  />
                 Nu &nbsp;<input type="radio" name="gender"  value="1" size="35" <?php setBox("gender",1) ?>  />
                <span class="error">
                    <?php echo $error['gender']; ?>
                </span> 
                <br />

                <label>&nbsp;</label>
                <input type="submit" name="submit" value="Get Info" />&nbsp;&nbsp;
            </form>
        </body>
    </html>
    