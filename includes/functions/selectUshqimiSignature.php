	<div class="container" id="pjesa3" style="margin-top:50px">
 	 <div class="row">
        <?php
        require "includes/functions/connect.php";
        $stmt = $connect->prepare("SELECT * FROM ushqimi u, kategorite k WHERE u.kategoria= k.id AND u.kategoria='signaturedishes'");
        $stmt->execute();
        $result = $stmt->get_result();
                                
        while($row = $result->fetch_assoc()):
        ?>                        
        <div class='col-lg-3 col-md-6 col-sm-12 col-xs-12' style='margin-bottom:10px'>
            <div id='message'></div>
                 <img src="<?= $row['fotografia']?>" class="img-fluid img-thumbnail" style="width:250px"><br>
                 <h3><b><?= $row['emri']?></b></h3>
                 <p><?= $row['pershkrimi']?></p>   
                 <p style='color:rgb(246, 177, 49);'><?= number_format($row['cmimi'],2)?> €</p>
                <form action="" class="form-submit">
                    <p>Sasia:</p>
                    <input type="number" style="width:50px" class="form-control pqty" value="<?= $row['sasia'] ?>">
                    <input type='hidden' class='pid' value='<?= $row['id'] ?>'>
                    <input type='hidden' class='pcode' value='<?= $row['kodi'] ?>'>
                    <input type='hidden' class='pname' value='<?= $row['emri'] ?>'>
                    <input type='hidden' class='pdescription' value='<?= $row['pershkrimi'] ?>'>
                    <input type='hidden' class='pprice' value='<?= $row['cmimi'] ?>'>
                    <input type='hidden' class='pimage' value='<?= $row['fotografia'] ?>'>
                    <input type='hidden' class='pcategory' value='<?= $row['kategoria'] ?>'>
                    <br>
                    <button class="btn btn-info btn-block addItemBtn" style="background-color:grey; border:grey; width:50px"><i class="fas fa-cart-plus"></i></button>
                </form>
         </div>
         <?php endwhile; ?>
        <?php //include "Includes/functions/selectUshqimiSignature.php";?>
	 </div>
    </div>  
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>    
		<script>
		function loadpage(page){
            $.ajax({
            url:page,
            beforeSend:function(){
              $('#pjesa3').html("Please wait...");
            },
            success:function(data){
              $('#pjesa3').html(""); // to empty previous page contents.
              $('#pjesa3').html(data);
            }
          });
        }
        </script>
        <script>
        $(document).ready(function(){
        $(".addItemBtn").click(function(e){
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pdescription = $form.find(".pdescription").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();
            var pcategory = $form.find(".pcategory").val();
            var pcode = $form.find(".pcode").val();
            
            var pqty = $form.find(".pqty").val();

            $.ajax({
                url: 'includes/functions/action.php',
                method: 'post',
                data: {pid: pid,pname: pname, pdescription: pdescription, pprice: pprice, pqty:pqty, pimage: pimage,pcategory: pcategory,pcode: pcode},
                success:function(response) {
                    $("#message").html(response);
                }

                });
            });
        });
        </script>
        <!-- bootstrap js -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>