$('#kja_lainnya').click(function() {
   if($('#kja_lainnya').is(':checked')) {
     $("#add-kja").removeClass("d-none");
     $("#add-kja textarea").attr("name", "komplikasi_janin_antepartum[]");
   } else {
     $("#add-kja").addClass("d-none");
     $("#add-kja textarea").removeAttr("name");
   }
});
$('#kii_lainnya').click(function() {
   if($('#kii_lainnya').is(':checked')) {
     $("#add-kii").removeClass("d-none");
     $("#add-kii textarea").attr("name", "komplikasi_ibu_intrapartum[]");
   } else {
     $("#add-kii").addClass("d-none");
     $("#add-kii textarea").removeAttr("name");
   }
});
$('#kia_lainnya').click(function() {
   if($('#kia_lainnya').is(':checked')) {
     $("#add-kia").removeClass("d-none");
     $("#add-kia textarea").attr("name", "komplikasi_ibu_antepartum[]");
   } else {
     $("#add-kia").addClass("d-none");
     $("#add-kia textarea").removeAttr("name");
   }
});
$('#kip_lainnya').click(function() {
   if($('#kip_lainnya').is(':checked')) {
     $("#add-kip").removeClass("d-none");
     $("#add-kip textarea").attr("name", "komplikasi_ibu_postpartum[]");
   } else {
     $("#add-kip").addClass("d-none");
     $("#add-kip textarea").removeAttr("name");
   }
});
$('#gd_lainnya').click(function() {
   if($('#gd_lainnya').is(':checked')) {
     $("#add-gd").removeClass("d-none");
     $("#add-gd textarea").attr("name", "gejala_dirasakan[]");
   } else {
     $("#add-gd").addClass("d-none");
     $("#add-gd textarea").removeAttr("name");
   }
});
