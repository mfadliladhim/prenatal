<?php $title ='Tambah Skrining 11-13 Minggu'; ?>
<!-- Header -->
<form class="" action="../controller/IdentitasController.php?a=nyoba" method="post">
  <div id="addDahulu" class="col-md-12 mt-2 d-none">
    <input class="form-control" type="text" name="riwayat_penyakit_dahulu_pengobatan" value="sdfhbsdjhg sdhjgshjg sdhjfg ">
  </div>
  <button type="submit">dddd</button>
</form>
<input class="cc" type="text" name="" value="11">
<input class="cc" type="text" name="" value="15">
<input class="cc" type="text" name="" value="13">
<input class="cc" type="text" name="" value="14">
<div id="demo">

</div>

<?php function codeScripts(){ ?>
<script type="text/javascript">
  var inputs = $(".max-crl");
  // console.log(inputs.length);
  for(var i = 0; i < inputs.length; i++) {
    if(i == 0) {
      var nilai_mak = $(inputs[i]).val();
    } else {
      if($(inputs[i]).val() > nilai_mak) {
        nilai_mak = $(inputs[i]).val();
      }
    }
  }
  document.getElementById("demo").innerHTML = 'nilai terbesar '+nilai_mak;
</script>
<?php } ?>
