var url_string = window.location.href;
var url = new URL(url_string);
var message = url.searchParams.get("message");
switch (message) {

  // Simpan berhasil
  case "simIndenSuc":
  case "simSkriSuc":
  case "simTrimSuc":
  case "simDelivSuc":
    Swal.fire({
      icon: 'success',
      title: 'Data sudah disimpan',
      showConfirmButton: false,
      timer: 1500
    })
    break;

  // Simpan gagal
  case "simIndenFail":
  case "simSkriFail":
  case "simTrimFail":
  case "simDelivFail":
    Swal.fire({
      icon: 'error',
      title: 'Data gagal disimpan',
      showConfirmButton: false,
      timer: 1500
    })
    break;

  // Delete berhasil
  case "delIndenSuc":
  case "delSkriSuc":
  case "delTrimSuc":
  case "delDelivSuc":
    Swal.fire({
      icon: 'success',
      title: 'Data berhasil dihapus',
      showConfirmButton: false,
      timer: 1500
    })
    break;

  // Hapus gagal
  case "delIndenFail":
  case "delSkriFail":
  case "delTrimFail":
  case "delDelivFail":
    Swal.fire({
      icon: 'error',
      title: 'Data gagal disimpan',
      showConfirmButton: false,
      timer: 1500
    })
    break;

  default:

}
