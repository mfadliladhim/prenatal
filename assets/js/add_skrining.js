  let lineNo = 1;
  const ww = 49;
  $(document).ready(function () {
    $("#showAll").click(function() {
      $("#collapseTwo, #collapseThree, #collapseFour, #collapseFive, #collapseSix").toggleClass("show");
      if ($(this).text() == "Hide All")
        $(this).html("<i class='far fa-eye mr-1'></i>Show All")
      else
        $(this).html("<i class='far fa-eye-slash mr-1'></i>Hide All")
    });
    $(document).on('show.bs.modal', '.modal', function() {
      const zIndex = 1040 + 10 * $('.modal:visible').length;
      $(this).css('z-index', zIndex);
      setTimeout(() => $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack'));
    });
    $(document).on('hidden.bs.modal', '.modal', () => $('.modal:visible').length && $(document.body).addClass('modal-open'));

    $("#kondisi_organ, #kondisi_organ_in").on("change", () => {
      const kondisi_organ = $("#kondisi_organ").val();
      const kondisi_organ_in = $("#kondisi_organ_in").val();
      if (kondisi_organ == 'Tampak kelainan') {
        $("#addP").modal('show');
        $("#organDetailSem").removeClass("d-none");
        $("#organDetailSemM").removeClass("d-none");
      }
      if (kondisi_organ_in == 'Tampak kelainan') {
        $("#addP").modal('show');
        $("#organDetailSem").removeClass("d-none");
        $("#organDetailSemM").removeClass("d-none");
      }
    }),
    $("#tambah-janin").click(function(){
        $("#tombol-hidden").removeClass('d-none');
        // $('#formorgan').reset();
        // $('#tombol-hidden').addClass('d-;none');
    });
    $('#addP').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var isi_organ = button.data('whatever') // Extract info from data-* attributes
      // console.log(isi_organ);
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      // let text = "How are you doing today?";
      if (typeof isi_organ === "undefined") {

      } else {
        const array_organ = isi_organ.split(";")
        // console.log(array_organ[0])
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('#organ_otak').val(array_organ[0])
        modal.find('#organ_leher').val(array_organ[1])
        modal.find('#organ_wajah').val(array_organ[2])
        modal.find('#organ_tulang').val(array_organ[3])
        modal.find('#organ_jantung').val(array_organ[4])
        modal.find('#organ_toraks').val(array_organ[5])
        modal.find('#organ_abdomen').val(array_organ[6])
        modal.find('#organ_extrimitas').val(array_organ[7])
        // modal.find('#organ_plasenta').val(array_organ[8])
        modal.find('#tombol-hidden').addClass('d-none');
      }
    });
    $(".add-organ").click(function(){
      const organ_otak = $("#organ_otak").val();
      const organ_leher = $("#organ_leher").val();
      const organ_wajah = $("#organ_wajah").val();
      const organ_tulang = $("#organ_tulang").val();
      const organ_jantung = $("#organ_jantung").val();
      const organ_toraks = $("#organ_toraks").val();
      const organ_abdomen = $("#organ_abdomen").val();
      const organ_extrimitas = $("#organ_extrimitas").val();
      // const organ_plasenta = $("#organ_plasenta").val();
      // const im_organ = organ_otak+";"+organ_leher+";"+organ_wajah+";"+organ_tulang+";"+organ_jantung+";"+organ_toraks+";"+organ_abdomen+";"+organ_extrimitas+";"+organ_plasenta;
      const im_organ = organ_otak+";"+organ_leher+";"+organ_wajah+";"+organ_tulang+";"+organ_jantung+";"+organ_toraks+";"+organ_abdomen+";"+organ_extrimitas;
      $("#organInSem").val(im_organ);
      $("#addP").modal('hide');
    });
    $("mom_plgf, #systolicLeft1, #systolicRight1, #diastolicLeft1, #diastolicRight1, #systolicLeft2, #systolicRight2, #diastolicLeft2, #diastolicRight2").keyup(function() {

      const systolicLeft1   = parseFloat($("#systolicLeft1").val());
      const systolicRight1  = parseFloat($("#systolicRight1").val());
      const diastolicLeft1  = parseFloat($("#diastolicLeft1").val());
      const diastolicRight1 = parseFloat($("#diastolicRight1").val());
      const systolicLeft2   = parseFloat($("#systolicLeft2").val());
      const systolicRight2  = parseFloat($("#systolicRight2").val());
      const diastolicLeft2  = parseFloat($("#diastolicLeft2").val());
      const diastolicRight2 = parseFloat($("#diastolicRight2").val());
      const map_up          = parseFloat($("#final_map").val());

      // var ff =(systolicLeft1+(diastolicLeft1+diastolicLeft1))/3;
      // var map_kiri_coba  = (systolicLeft1+ff)/3;
      const map_kiri_1  = (systolicLeft1+(2*diastolicLeft1))/3;
      const map_kiri_2  = (systolicLeft2+(2*diastolicLeft2))/3;
      const map_kanan_1 = (systolicRight1+(2*diastolicRight1))/3;
      const map_kanan_2 = (systolicRight2+(2*diastolicRight2))/3;
      const map_kiri    = (map_kiri_1+map_kiri_2)/2;
      const map_kanan   = (map_kanan_1+map_kanan_2)/2;
      const final_map   = (map_kanan+map_kiri)/2;
      const mom_map     = final_map/82.6;

      if (!systolicLeft1 == '' && !systolicRight1 == '' && !diastolicLeft1 == '' && !diastolicRight1 == '' && !systolicLeft2 == '' && !systolicRight2 == '' && !diastolicLeft2 == '' && !diastolicRight2 == '') {
        $("#final_map").val(final_map.toFixed(2));
        $("#mom_map").text('('+mom_map.toFixed(3)+' MoM)');
      }
      // if (!map_up == map_up) {
      //   $("#systolicLeft1").val('');
      //   $("#systolicRight1").val('');
      //   $("#diastolicLeft1").val('');
      //   $("#diastolicRight1").val('');
      //   $("#systolicLeft2").val('');
      //   $("#systolicRight2").val('');
      //   $("#diastolicLeft2").val('');
      //   $("#diastolicRight2").val('');
      //   $("#mom_map").text('');
      // }
      // var total = parseInt(harga) * parseInt(jumlah);
    }),
    $("#uterina_kiri, #uterina_kanan, #psv1, #psv2, #poh_pe_34, #poh_pe_37, #systolicLeft1, #systolicRight1, #diastolicLeft1, #diastolicRight1, #systolicLeft2, #systolicRight2, #diastolicLeft2, #diastolicRight2, #final_map, #mean_utpi, #pr_ophtalmica, #mom_plgf, #paritas, #in_riwayat_kehamilan, #metode_konsepsi, #riwayat_hamil_pe, #diabetes_militus, #hipertensi_kronik, #riwayat_ibu_kakak_pe, #usia, #berat_badan, #tinggi_badan, #plgf, #poh_pe_34, #poh_pe_37").on("change",
      () => {

      const map   = parseFloat($("#final_map").val()); // belum
      const utpi  = parseFloat($("#mean_utpi").val()); // ok
      const oph   = parseFloat($("#pr_ophtalmica").val()); // ok
      const plgf  = parseFloat($("#mom_plgf").val()); // ok

      // const map   = 94.75; // belum
      // const utpi  = 1.165; // ok
      // const oph   = 0.6; // ok
      // const plgf  = 62; // ok

      const paritas_origin        = parseFloat($("#paritas").val()); // ok
      // const paritas_origin        = 2; // ok
      if (paritas_origin == 0) {
        paritas = 1;
      } else {
        paritas = 0;
      }
      // const in_riwayat_kehamilan  = 1; // ok
      // const metode_konsepsi       = 0; // ok
      // const riwayat_hamil_pe      = 0; // ok
      // const diabetes_militus      = 0; // ok
      // const hipertensi_kronik     = 0; // ok
      // const riwayat_ibu_kakak_pe  = 0; //ok
      // const usia                  = 36; // ok
      const in_riwayat_kehamilan  = parseFloat($("#in_riwayat_kehamilan").val()); // ok
      const metode_konsepsi       = parseFloat($("#metode_konsepsi").val()); // ok
      const riwayat_hamil_pe      = parseFloat($("#riwayat_hamil_pe").val()); // ok
      const diabetes_militus      = parseFloat($("#diabetes_militus").val()); // ok
      const hipertensi_kronik     = parseFloat($("#hipertensi_kronik").val()); // ok
      const riwayat_ibu_kakak_pe  = parseFloat($("#riwayat_ibu_kakak_pe").val()); //ok
      const usia                  = parseFloat($("#usia").val()); // ok

      const berat_badan           = parseFloat($("#berat_badan").val()); // ok
      const tinggi_badan          = parseFloat($("#tinggi_badan").val()); // ok
      const bmi                   = berat_badan/((tinggi_badan/100)*(tinggi_badan/100)); // ok
      // const bmi                   = 24.548; // ok

      if (Number.isNaN(berat_badan) == false && Number.isNaN(tinggi_badan) == false) {
        $("#bmi").text('BMI : '+bmi.toFixed(2));
      } else {
        $("#bmi").text('');
      }

      if (Number.isNaN(utpi) == true && Number.isNaN(oph) == true  && Number.isNaN(plgf) == true) {
        console.log('Semua kosong');
      } else if (Number.isNaN(utpi) == true && Number.isNaN(oph) == true) {
        console.log('Tanpa Utpi dan oph');

        // Oph
      } else if (Number.isNaN(utpi) == true && Number.isNaN(plgf) == true) {
        console.log('Tanpa Utpi dan PLGF');
        if (!map == '' && !oph == '') {
          const map_risk  = Math.log10(map/83.25);
          const oph_risk  = Math.log10(oph/0.57);

          const rumus1_exp1_34 = Math.exp((-1.34E-33)*(Math.pow(34,20.9)));
          const rumus1_exp1_37 = Math.exp((-1.34E-33)*(Math.pow(37,20.9)));
          const rumus2 =(-0.315*paritas)+(-0.648*in_riwayat_kehamilan)+(1.22*metode_konsepsi)+(0.484*riwayat_hamil_pe)+(2.02*diabetes_militus)+(1.2*hipertensi_kronik)+(0.28*riwayat_ibu_kakak_pe)+(-0.00961*usia)+(0.00302*bmi);
          const rumus3 =(3.94*map_risk+(-0.957*oph_risk));
          const rumus4_exp2 = Math.exp(rumus2+rumus3);

          const rumus5_34 = Math.pow(rumus1_exp1_34,rumus4_exp2);
          const rumus6_34 = 1-rumus5_34;
          const rumus7_34 = 1/rumus6_34;

          console.log("34 : "+rumus5_34);

          const rumus5_37 = Math.pow(rumus1_exp1_37,rumus4_exp2);
          const rumus6_37 = 1-rumus5_37;
          const rumus7_37 = 1/rumus6_37;

          console.log("37 : "+rumus5_37);

          $("#poh_pe_34").val("1 : "+ Math.round(rumus7_34));
          $("#poh_pe_37").val("1 : "+ Math.round(rumus7_37));
          if (rumus7_34<6) {
            $("#akurasi_34").val("(High risk, Akurasi : 67%)");
            $("#ket_poh_pe_34").text("(High risk, Akurasi : 67%)");
          } else {
            $("#akurasi_34").val("(Low risk, Akurasi : 67%)");
            $("#ket_poh_pe_34").text("(Low risk, Akurasi : 67%)");
          }
          if (rumus7_37<1.5) {
            $("#akurasi_37").val("(High risk, Akurasi : 43%)");
            $("#ket_poh_pe_37").text("(High risk, Akurasi : 43%)");
          } else {
            $("#akurasi_37").val("(Low risk, Akurasi : 43%)");
            $("#ket_poh_pe_37").text("(Low risk, Akurasi : 43%)");
          }
        }

        // UtPI
      } else if (Number.isNaN(oph) == true  && Number.isNaN(plgf) == true) {
        console.log('Tanpa Oph dan PLGF');
        const map_risk  = Math.log10(map/83.25);
        const utpi_risk = Math.log10(utpi/1.78);

        const rumus1_exp1_34 = Math.exp((-5.85E-34)*(Math.pow(34,21.1)));
        const rumus1_exp1_37 = Math.exp((-5.85E-34)*(Math.pow(37,21.1)));
        const rumus2 =(-0.428*paritas)+(-0.764*in_riwayat_kehamilan)+(1.26*metode_konsepsi)+(0.385*riwayat_hamil_pe)+(1.75*diabetes_militus)+(0.935*hipertensi_kronik)+(0.255*riwayat_ibu_kakak_pe)+(0.0123*usia)+(-0.0166*bmi);
        const rumus3 = (4.33*map_risk)+(2.18*utpi_risk);
        const rumus4_exp2 = Math.exp(rumus2+rumus3);

        const rumus5_34 = Math.pow(rumus1_exp1_34,rumus4_exp2);
        const rumus6_34 = 1-rumus5_34;
        const rumus7_34 = 1/rumus6_34;

        const rumus5_37 = Math.pow(rumus1_exp1_37,rumus4_exp2);
        const rumus6_37 = 1-rumus5_37;
        const rumus7_37 = 1/rumus6_37;

        $("#poh_pe_34").val("1 : "+ Math.round(rumus7_34));
        $("#poh_pe_37").val("1 : "+ Math.round(rumus7_37));
        if (rumus7_34<6) {
          $("#akurasi_34").val("(High risk, Akurasi : 89%)");
          $("#ket_poh_pe_34").text("(High risk, Akurasi 89%)");
        } else {
          $("#akurasi_34").val("(Low risk, Akurasi : 89%)");
          $("#ket_poh_pe_34").text("(Low risk, Akurasi 89%)");
        }
        if (rumus7_37<2) {
          $("#akurasi_37").val("(High risk, Akurasi : 52%)");
          $("#ket_poh_pe_37").text("(High risk, Akurasi 52%)");
        } else {
          $("#akurasi_37").val("(Low risk, Akurasi : 52%)");
          $("#ket_poh_pe_37").text("(Low risk, Akurasi 52%)");
        }

        // UtPI + PlGF
      } else if (Number.isNaN(oph) == true) {
        console.log('Tanpa Oph - Utpi with PLGF');
        const map_risk  = Math.log10(map/83.25);
        const utpi_risk = Math.log10(utpi/1.78);
        const plgf_risk = Math.log10(plgf/49.395);

        const rumus1_exp1_34 = Math.exp((-5.43E-35)*(Math.pow(34,21.8)));
        const rumus1_exp1_37 = Math.exp((-5.43E-35)*(Math.pow(37,21.8)));
        const rumus2 =(-0.625*paritas)+(-0.348*in_riwayat_kehamilan)+(1.1*metode_konsepsi)+(0.202*riwayat_hamil_pe)+(1.32*diabetes_militus)+(1.01*hipertensi_kronik)+(0.0599*riwayat_ibu_kakak_pe)+(0.00898*usia)+(-0.0274*bmi);
        const rumus3 = ((3.49*map_risk)+(1.42*utpi_risk)+(-1.48*plgf_risk));
        const rumus4_exp2 = Math.exp(rumus2+rumus3);

        const rumus5_34 = Math.pow(rumus1_exp1_34,rumus4_exp2);
        const rumus6_34 = 1-rumus5_34;
        const rumus7_34 = 1/rumus6_34;

        console.log("34 : "+rumus5_34);

        const rumus5_37 = Math.pow(rumus1_exp1_37,rumus4_exp2);
        const rumus6_37 = 1-rumus5_37;
        const rumus7_37 = 1/rumus6_37;

        console.log("37 : "+rumus5_37);

        $("#poh_pe_34").val("1 : "+ Math.round(rumus7_34));
        $("#poh_pe_37").val("1 : "+ Math.round(rumus7_37));
        if (rumus7_34<8) {
          $("#akurasi_34").val("(High risk, Akurasi : 89%)");
          $("#ket_poh_pe_34").text("(High risk, Akurasi 89%)");
        } else {
          $("#akurasi_34").val("(Low risk, Akurasi : 89%)");
          $("#ket_poh_pe_34").text("(Low risk, Akurasi 89%)");
        }
        if (rumus7_37<2) {
          $("#akurasi_37").val("(High risk, Akurasi : 62%)");
          $("#ket_poh_pe_37").text("(High risk, Akurasi 62%)");
        } else {
          $("#akurasi_37").val("(Low risk, Akurasi : 62%)");
          $("#ket_poh_pe_37").text("(Low risk, Akurasi 62%)");
        }

        // Oph + PlGF
      } else if (Number.isNaN(utpi) == true) {
        console.log('Tanpa Utpi - Oph with PLGF');
        const map_risk  = Math.log10(map/83.25);
        const oph_risk  = Math.log10(oph/0.57);
        const plgf_risk = Math.log10(plgf/49.395);

        const rumus1_exp1_34 = Math.exp((-8.39E-35)*(Math.pow(34,21.7)));
        const rumus1_exp1_37 = Math.exp((-8.39E-35)*(Math.pow(37,21.7)));
        const rumus2 =(-0.587*paritas)+(-0.179*in_riwayat_kehamilan)+(1.06*metode_konsepsi)+(0.226*riwayat_hamil_pe)+(1.47*diabetes_militus)+(1.18*hipertensi_kronik)+(0.0623*riwayat_ibu_kakak_pe)+(-0.00538*usia)+(-0.0172*bmi);
        const rumus3 = (3.34*map_risk+-0.621*oph_risk+-1.61*plgf_risk);
        const rumus4_exp2 = Math.exp(rumus2+rumus3);

        const rumus5_34 = Math.pow(rumus1_exp1_34,rumus4_exp2);
        const rumus6_34 = 1-rumus5_34;
        const rumus7_34 = 1/rumus6_34;

        const rumus5_37 = Math.pow(rumus1_exp1_37,rumus4_exp2);
        const rumus6_37 = 1-rumus5_37;
        const rumus7_37 = 1/rumus6_37;

        $("#poh_pe_34").val("1 : "+ Math.round(rumus7_34));
        $("#poh_pe_37").val("1 : "+ Math.round(rumus7_37));
        if (rumus7_34<8) {
          $("#akurasi_34").val("(High risk, Akurasi : 78%)");
          $("#ket_poh_pe_34").text("(High risk, Akurasi 78%)");
        } else {
          $("#akurasi_34").val("(Low risk, Akurasi : 78%)");
          $("#ket_poh_pe_34").text("(Low risk, Akurasi 78%)");
        }
        if (rumus7_37<2) {
          $("#akurasi_37").val("(High risk, Akurasi : 52%)");
          $("#ket_poh_pe_37").text("(High risk, Akurasi 52%)");
        } else {
          $("#akurasi_37").val("(Low risk, Akurasi : 52%)");
          $("#ket_poh_pe_37").text("(Low risk, Akurasi 52%)");
        }

        // UtPI + Oph
      } else if (Number.isNaN(plgf) == true) {
        console.log('Tanpa Plgf');
        if (!map == '' && !utpi == '' && !oph == '') {
          const map_risk  = Math.log10(map/83.25);
          const utpi_risk = Math.log10(utpi/1.78);
          const oph_risk  = Math.log10(oph/0.57);

          const rumus1_exp1_34 = Math.exp((-3.84E-28)*(Math.pow(34,16.3)));
          const rumus1_exp1_37 = Math.exp((-3.84E-28)*(Math.pow(37,16.3)));
          const rumus2 =(0.39*paritas)+(-0.186*in_riwayat_kehamilan)+(0.177*metode_konsepsi)+(1.25*riwayat_hamil_pe)+(1.84*diabetes_militus)+(0.044*hipertensi_kronik)+(0.233*riwayat_ibu_kakak_pe)+(0.0000507*usia)+(-0.00612*bmi);
          const rumus3 = (23*map_risk)+(3.2*utpi_risk)+(1.23*oph_risk);
          const rumus4_exp2 = Math.exp(rumus2+rumus3);

          const rumus5_34 = Math.pow(rumus1_exp1_34,rumus4_exp2);
          const rumus6_34 = 1-rumus5_34;
          const rumus7_34 = 1/rumus6_34;

          console.log("34 : "+rumus5_34);

          const rumus5_37 = Math.pow(rumus1_exp1_37,rumus4_exp2);
          const rumus6_37 = 1-rumus5_37;
          const rumus7_37 = 1/rumus6_37;

          console.log("37 : "+rumus5_37);

          $("#poh_pe_34").val("1 : "+ Math.round(rumus7_34));
          $("#poh_pe_37").val("1 : "+ Math.round(rumus7_37));
          if (rumus7_34<57) {
            $("#akurasi_34").val("(High risk, Akurasi : 100%)");
            $("#ket_poh_pe_34").text("(High risk, Akurasi 100%)");
          } else {
            $("#akurasi_34").val("(Low risk, Akurasi : 100%)");
            $("#ket_poh_pe_34").text("(Low risk, Akurasi 100%)");
          }
          if (rumus7_37<15) {
            $("#akurasi_37").val("(High risk, Akurasi : 67%)");
            $("#ket_poh_pe_37").text("(High risk, Akurasi 67%)");
          } else {
            $("#akurasi_37").val("(Low risk, Akurasi : 67%)");
            $("#ket_poh_pe_37").text("(Low risk, Akurasi 67%)");
          }
        }

        // UtPI + Oph + PlGF
      } else if (Number.isNaN(utpi) == false && Number.isNaN(oph) == false && Number.isNaN(plgf) == false) {
        console.log('Ada Semua');
        const map_risk  = Math.log10(map/83.25);
        const utpi_risk = Math.log10(utpi/1.78);
        const oph_risk  = Math.log10(oph/0.57);
        const plgf_risk = Math.log10(plgf/49.395);

        const rumus1_34 = Math.exp((-2.65E-28)*(Math.pow(34,16.5)));
        const rumus1_37 = Math.exp((-2.65E-28)*(Math.pow(37,16.5)));
        const rumus2 = (0.37*paritas)+(-0.377*in_riwayat_kehamilan)+(0.304*metode_konsepsi)+(1.19*riwayat_hamil_pe)+(1.55*diabetes_militus)+(0.123*hipertensi_kronik)+(0.345*riwayat_ibu_kakak_pe)+(-0.0000126*usia)+(-0.014*bmi);
        const rumus3 = (22.6*map_risk)+(2.57*utpi_risk)+(0.989*oph_risk)+(-1.59*plgf_risk);
        const rumus4 = Math.exp(rumus2+rumus3);

        const rumus5_34 = Math.pow(rumus1_34,rumus4);
        const rumus6_34 = 1-rumus5_34;
        const rumus7_34 = 1/rumus6_34;

        const rumus5_37 = Math.pow(rumus1_37,rumus4);
        const rumus6_37 = 1-rumus5_37;
        const rumus7_37 = 1/rumus6_37;

        $("#poh_pe_34").val("1 : "+ Math.round(rumus7_34));
        $("#poh_pe_37").val("1 : "+ Math.round(rumus7_37));
        if (rumus7_34<49) {
          $("#akurasi_34").val("(High risk, Akurasi : 100%)");
          $("#ket_poh_pe_34").text("(High risk, Akurasi 100%)");
        } else {
          $("#akurasi_34").val("(Low risk, Akurasi : 100%)");
          $("#ket_poh_pe_34").text("(Low risk, Akurasi 100%)");
        }
        if (rumus7_37<13) {
          $("#akurasi_37").val("(High risk, Akurasi : 71%)");
          $("#ket_poh_pe_37").text("(High risk, Akurasi 71%)");
        } else {
          $("#akurasi_37").val("(Low risk, Akurasi : 71%)");
          $("#ket_poh_pe_37").text("(Low risk, Akurasi 71%)");
        }
      }


    });
    $(".add-row").click(function () {
        markup  = "<tr>";
        markup += "<td>" + lineNo + "</td>";
        markup += "<td><input name='tanggal_lahir_riwayat[]' style='width:150px' type='date' placeholder='Tanggal Lahir' class='form-control form-control-sm datepicker'></td>";
        markup += "<td><input type='text' name='berat_lahir_riwayat[]' placeholder='Berat Lahir' class='form-control form-control-sm'></td>";
        markup += "<td><select name='jenis_kelamin_riwayat[]' class='form-control form-control-sm'><option value=''>-Pilih-</option><option value='Laki-laki'>Laki-laki</option><option value='Perempuan'>Perempuan</option></select></td>";
        markup += "<td><input type='text' name='usia_kehamilan_saat_lahir_riwayat[]' placeholder='Usia Kehamilan Saat Lahir' class='form-control form-control-sm'></td>";
        markup += "<td><select class='form-control form-control-sm' name='cara_persalinan_riwayat[]'><option value=''>-Pilih-</option><option value='Pervaginam'>Pervaginam</option><option value='SC'>SC</option><option value='Kuretase'>Kuretase</option><option value='Abortus medisinalis'>Abortus medisinalis</option></select></td>";
        markup += "<td><select class='form-control form-control-sm' name='kondisi_saat_lahir_riwayat[]'><option value=''>-Pilih-</option><option value='Live Birth'>Live Birth</option><option value='Neonatal Death'>Neonatal Death</option><option value='Abortus'>Abortus</option></select></td>";
        markup += "<td><a href='javascript:void(0);'' class='remCF'><i class='fas fa-trash text-danger'></i></a></td>";
        markup += "</tr>";
        tableBody = $("table #riwayat");
        tableBody.append(markup);
        lineNo++;
    });
    $(".add-riwayat").click(function () {
        $("#tableShowRiyawat").removeClass("d-none");
        const tanggal_lahir_riwayat             = $("#tanggal_lahir_riwayat").val();
        const berat_lahir_riwayat               = $("#berat_lahir_riwayat").val();
        const jenis_kelamin_riwayat             = $("#jenis_kelamin_riwayat").val();
        const usia_kehamilan_saat_lahir_riwayat = $("#usia_kehamilan_saat_lahir_riwayat").val();
        const cara_persalinan_riwayat           = $("#cara_persalinan_riwayat").val();
        const kondisi_saat_lahir_riwayat        = $("#kondisi_saat_lahir_riwayat").val();

        td_add  = "<tr>";
        td_add += "<td><a href='javascript:void(0);' class='remCF'><i class='fas fa-trash text-danger'></i></a></td>";
        td_add += "<td>" + lineNo + "</td>";
        td_add += "<td><input value='"+tanggal_lahir_riwayat+"' name='tanggal_lahir_riwayat[]' type='text' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><input value='"+berat_lahir_riwayat+"' name='berat_lahir_riwayat[]' type='text' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><input value='"+jenis_kelamin_riwayat+"' name='jenis_kelamin_riwayat[]' type='text' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><input value='"+usia_kehamilan_saat_lahir_riwayat+"' name='usia_kehamilan_saat_lahir_riwayat[]' type='text' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><input value='"+cara_persalinan_riwayat+"' name='cara_persalinan_riwayat[]' type='text' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><input value='"+kondisi_saat_lahir_riwayat+"' name='kondisi_saat_lahir_riwayat[]' type='text' class='form-control-plaintext form-control-sm'></td>";
        td_add += "</tr>";

        $("table #td_riwayat").append(td_add);
        $("#skrining_riwayat").modal('hide');
        $("#formShowRiwayat")[0].reset();
        lineNo++;
    });
    $("#addJanin").click(function () {
      $('#formorgan')[0].reset();
    });
    $(".add-td").click(function () {
        $("#tableShow").show();
        const denyut_jantung_janin  = $("#denyut_jantung_janin_in").val();
        const regurgitasi_trikuspid = $("#regurgitasi_trikuspid_in").val();
        const irama                 = $("#irama_in").val();
        const gerak_janin           = $("#gerak_janin_in").val();
        const bpd                   = $("#bpd_in").val();
        const nt                    = $("#nt_in").val();
        const nb                    = $("#nb_in").val();
        const kondisi_organ         = $("#kondisi_organ_in").val();
        const organ_in_sem          = $("#organInSem").val();
        const keterangan_organ      = $("#keterangan_organ_in").val();
        const crl                   = $("#crl_out").val();
        const ductus_venosus        = $("#ductus_venosus_in").val();
        const awdv                  = $("#awdv_in").val();
        const cairan_ketuban        = $("#cairan_ketuban_in").val();
        td_add  = "<tr>";
        td_add += "<td>" + lineNo + "</td>";
        td_add += "<td><input value='"+denyut_jantung_janin+"' name='denyut_jantung_janin[]' style='width:150px' type='text' placeholder='Tanggal Lahir' class='form-control-plaintext form-control-sm datepicker'></td>";
        td_add += "<td><input value='"+regurgitasi_trikuspid+"' name='regurgitasi_trikuspid[]' style='width:150px' type='text' placeholder='Tanggal Lahir' class='form-control-plaintext form-control-sm datepicker'></td>";
        td_add += "<td><input value='"+irama+"' name='irama[]' style='width:150px' type='text' placeholder='Tanggal Lahir' class='form-control-plaintext form-control-sm datepicker'></td>";
        td_add += "<td><input value='"+gerak_janin+"' type='text' name='gerak_janin[]' placeholder='Berat Lahir' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><input value='"+bpd+"' type='text' name='bpd[]' placeholder='Usia Kehamilan Saat Lahir' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><input value='"+nt+"' type='text' name='nt[]' placeholder='Usia Kehamilan Saat Lahir' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><input value='"+nb+"' type='text' name='nb[]' placeholder='Usia Kehamilan Saat Lahir' class='form-control-plaintext form-control-sm'></td>";
        if (kondisi_organ == 'Tampak kelainan') {
          td_add += "<td>";
          td_add += "<button type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#addP' data-whatever='"+organ_in_sem+"'>Detail</button>";
          td_add += "<input class='d-none' value='"+organ_in_sem+"' type='text' name='kondisi_organ[]' placeholder='Usia Kehamilan Saat Lahir'>";
          td_add += "</td>";
        } else {
          td_add += "<td><input value='"+kondisi_organ+"' type='text' name='kondisi_organ[]' placeholder='Usia Kehamilan Saat Lahir' class='form-control-plaintext form-control-sm'></td>";
        }
        td_add += "<td><input value='"+keterangan_organ+"' type='text' name='keterangan_organ[]' placeholder='Usia Kehamilan Saat Lahir' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><input value='"+crl+"' type='text' name='crl[]' placeholder='Usia Kehamilan Saat Lahir' class='form-control-plaintext form-control-sm max-crl'></td>";
        td_add += "<td><input value='"+ductus_venosus+"' type='text' name='ductus_venosus[]' placeholder='Usia Kehamilan Saat Lahir' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><input value='"+awdv+"' type='text' name='awdv[]' placeholder='Usia Kehamilan Saat Lahir' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><input value='"+cairan_ketuban+"' type='text' name='cairan_ketuban[]' placeholder='Usia Kehamilan Saat Lahir' class='form-control-plaintext form-control-sm'></td>";
        td_add += "<td><a href='javascript:void(0);'' class='remCF'><i class='fas fa-trash text-danger'></i></a></td>";
        td_add += "</tr>";
        $("table #td_add").append(td_add);
        $("#addJanin").modal('hide');
        $('#formjanin')[0].reset();
        $('#formorgan')[0].reset();
        $("#organDetailSem").addClass("d-none");
        $("#organDetailSemM").addClass("d-none");
        hitung_max();
        lineNo++;
    });
    $("#crl").on("change",
      () => {
        hitung_max();
      });
    function hitung_max() {
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
      };
      // e.preventDefault();
      const tglT                = $("#tanggal_pemeriksaan").val();
      const tanggal_pemeriksaan = tglT.substring(0,10);
      const crl_satu            = $("#crl").val();
      console.log('crl satu: '+crl_satu);
      const crl_max                 = nilai_mak;
      const crl                 = (crl_satu == '') ? crl_max : crl_satu;
      console.log('crl: '+crl);
      const tanggalPemeriksaan  = new Date(tanggal_pemeriksaan);
      const coba6               = crl/10;
      const coba5               = 1.684969+(0.315646*coba6)-(0.049306*(Math.pow(coba6,2)))+(0.004057*(Math.pow(coba6,3)))-(0.000120456*(Math.pow(coba6,4)));
      const coba4               = Math.pow(2.71828183,coba5);
      const coba3               = Math.round(coba4*7);
      const coba2               = 280-coba3;
      // tanggalPemeriksaan.setDate(tanggalPemeriksaan.getDate()+coba2);
      // taksiran_persalinan     = ((tanggalPemeriksaan.getMonth()>8)?(tanggalPemeriksaan.getMonth()+1):('0'+(tanggalPemeriksaan.getMonth()+1)))+'/'+((tanggalPemeriksaan.getDate()>9)?tanggalPemeriksaan.getDate():('0'+tanggalPemeriksaan.getDate()))+'/'+tanggalPemeriksaan.getFullYear();
      const str                 = coba4.toString();
      const minggu_kehamilan    =  str.split(".");

      const usiaKehamilan_hari  = (coba4-minggu_kehamilan[0])*7;
      var ss = $("#showDate").val(minggu_kehamilan[0]+" Minggu "+Math.round(usiaKehamilan_hari)+" Hari");
      // console.log(ss);
  // }),
  };
    // document.getElementById("demo").innerHTML = ;
    $("#riwayat").on('click','.remCF',function(){
      $(this).parent().parent().remove();
    });
    $("#td_add").on('click','.remCF',function(){
      $(this).parent().parent().remove();
    });
    $("#jumlah_janin").keyup(function() {
      const jum_jan = $("#jumlah_janin").val();
      // console.log(jum_jan);
      if (jum_jan < 2) {
        // $("#viewJaninOne").load("skrining/add_skrining_janin.php");
        // $("#viewJaninTwo").html("");
        $("#viewJaninOne :input").attr("disabled", false);
        $("#viewJaninShow").addClass("d-none");
        $("#plasenta_right").addClass("d-none");
        $("#viewJaninOne").removeClass("d-none");
        // $('#crl').attr("name", "usia_kehamilan_in");
      } else {
        // $("#viewJaninTwo").load("skrining/add_skrining_janin.php");
        // $("#viewJaninOne").html("");
        $("#viewJaninOne :input").attr("disabled", true);
        $("#viewJaninShow").removeClass("d-none");
        $("#viewJaninOne").addClass("d-none");
        $("#plasenta_right").removeClass("d-none");
        // $("#crl").removeAttr("name");
        $("#crl").val('');
        // $('input[name=crl_in]').val('000000');
        // option  = '<option value="Dikorion diamnion">Dikorion diamnion</option>';
        // option += '<option value="Monokorionik monoamniotic">Monokorionik monoamniotic</option>';
        // option += '<option value="Monokorionik diamniotic">Monokorionik diamniotic</option>';
        // $('#plasenta_right').append(option);
      }
    });
  });
