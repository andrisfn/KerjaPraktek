// DATA TABEL
$(document).ready(function () {
    $('#tabel').DataTable();
});

// TOOLTIP
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

function goBack() {
    window.history.back();
};

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
    return true;
};