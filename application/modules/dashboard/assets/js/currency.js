(function ($) {
    "use strict";
    $(document).ready(function () {
// ======== itsf for expense item list datatables ==============
        var base_url = $("#base_url").val();
        var CSRF_TOKEN = $('#CSRF_TOKEN').val();
        var table = $("#currencylist").DataTable({
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            order: [],
            paging: true,
            "searching": true,
            "processing": true,
            "serverSide": true,
            'columnDefs': [
                {
                    "targets": 2,
                    "className": "text-left",
                }],
            "ajax": {
                "url": base_url + "currency-list",
                "type": "POST",
                data: {
                    'csrf_test_name': CSRF_TOKEN,
                },
            }
        });
    })
}(jQuery));
