$(document).ready(function () {
  $(".keur-slick").slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    speed: 1300,
    autoplay: true,
    autoplaySpeed: 3000,
  });

  $(".keur-tablet").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 1300,
    autoplay: true,
    autoplaySpeed: 3000,
  });

  // tombol previous
  $(".slick-prev").addClass("bg-transparent");
  $(".slick-prev").html("<h1 class='text-light'><i class='bi bi-arrow-left-circle-fill'></i></h1>");
  // tombol next
  $(".slick-next").addClass("bg-transparent");
  $(".slick-next").html("<h1 class='text-light'><i class='bi bi-arrow-right-circle-fill'></i></h1>");

  // animasi fasilitas
  $(".fasilitas .card").mouseenter(function () {
    $(this).addClass("taekeun");
  });
  $(".fasilitas .card").mouseleave(function () {
    $(this).removeClass("taekeun");
    $(this).addClass("turunkeun");
  });
});

function jalanKeunHarga() {
  var kamar = $("#inputState").val();
  var tHarga = $("#harga_hari");
  var pecah = kamar.split("|");
  $("#tombolReservasi").click(function (e) {
    var link = "/page-tamu/booking-now/" + pecah[1];
    $("form.formTeuing").attr("action", link);
  });

  var harga = pecah[0];

  $("#hargaPerHari").val(function () {
    var number_string = harga.toString(),
      sisa = number_string.length % 3,
      rupiah = number_string.substr(0, sisa),
      ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }
    return "Rp. " + rupiah;
  });
}
