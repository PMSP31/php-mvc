$(function () {
  // event add button
  $(".add-btn").on("click", function () {
    $("#modalTitle").html("Tambah Data Siswa");
    $(".modal-footer button[type=submit]").html("Tambah Data");
  });

  // event edit button
  $(".edit-btn").on("click", function () {
    $("#modalTitle").html("Edit Data Siswa");
    $(".modal-footer button[type=submit]").html("Edit Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/phpmvc/public/siswa/edit"
    );

    // get id
    const id = $(this).data("id");
    // ajax
    $.ajax({
      url: "http://localhost/phpmvc/public/siswa/getedit",
      data: { id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").val(data.nama);
        $("#nis").val(data.nis);
        $("#email").val(data.email);
        $("#jurusan").val(data.jurusan);
        $("#id").val(data.id);
      },
    });
  });
});
