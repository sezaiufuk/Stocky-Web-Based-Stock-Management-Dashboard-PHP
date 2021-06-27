<?php
include("baglan.php");
ob_start();
session_start();
if(!isset($_SESSION["girisislemi"])){
    header("Location:giris.php");
}
include("header.php");?>
<style>#active3 a{background-color:#9c27b0 !important;color:#FFFFFF !important;}
	#active3 i{color:white !important;}</style>
<a class="navbar-brand" href="#" style="margin-left:1.3em;border-bottom:#CCC solid 1px;color:#363636;"> Ürün Stokları </a>
            <style>#myInput {
    width: 200px; /* Full-width */
    font-size: 15px; /* Increase font-size */
    padding: 5px 5px 5px 12px; /* Add some padding */
    border: 4px solid #D5D5D5;border-radius:2px;
    margin-right:2em;margin-top:2px;
	color:#868686;/* Add some space below the input */
}
				@media screen and (max-width:706px){
					#myInput {margin-top:14px;}
				}
				@media screen and (max-width:542px){
					#myInput {margin-top:24px;}
				}
				@media screen and (max-width:472px){
					#myInput {width:122px;}
				}
				@media screen and (max-width:392px){
					#myInput {margin-top:36px;}
				}
				@media screen and (max-width:372px){
					#myInput {display:none;}
				}
</style>
            <script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByClassName("myTd")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
	
}		
</script>
             <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                               <input type="text" id="myInput" onkeyup="this.value = this.value.turkishToUpper();myFunction();" placeholder="Ürün Arayın..." style="float:right;">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Ürün Stokları&nbsp;(<?php echo $numrows ?>)</h4>
                                    <p class="category">Buradan Depodaki Ürün Stoklarını ve Fiyatlarını Görebilirsiniz.</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table" id="myTable">
                                        <thead class="text-primary">
                                            <th>Ürün Kodu</th>
                                            <th>Ürün Ad</th>
                                            <th>Ürün Adet</th>
                                            <th>Ürün Fiyat</th>
                                        </thead>
                                        <tbody>
                                             <?php 
											while($row=mysqli_fetch_assoc($result)){	
											echo"<tr style=\"color:#474747;\"><td>{$row['urun_kodu']}</td>";	
											echo"<td class=\"myTd\">{$row['urun_adi']}</td>";
											echo"<td>{$row['urun_adet']}</td>";
											echo"<td>{$row['urun_fiyat']}₺</td></tr>";}
											?>
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>          
<?php include("footer.php")?>