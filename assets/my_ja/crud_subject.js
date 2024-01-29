
$(document).ready(function () {
    listSubject();
    // list all Subject in datatable
    function listSubject() {
        $.ajax({
            type: 'ajax',
            url: `<?= base_url("/subject/show") ?>`,
            async: false,
            dataType: 'json',
            success: function (data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<tr id="' + data[i].id + '">' +
                        '<td>' + i + '</td>' +
                        '<td>' + data[i].name + '</td>' +

                        '<td style="text-align:right;">' +
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="' + data[i].id + '" data-name="' + data[i].name + '">Edit</a>' +
                        ' ' +
                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="' + data[i].id + '">Delete</a>' +
                        '</td>' +

                        '</tr>';
                }
                $('#listRecords').html(html);
            },
            error: function (eror) {
                alert("Server internal error");
            }

        });
    }


    // save new employee record
    $('#saveEmpForm').submit('click', function () {
        var name = $('#name').val();

        $.ajax({
            type: "POST",
            url: `<?= base_url("/subject/save") ?>`,
            dataType: "JSON",
            data: {
                name: name,

            },
            success: function (data) {
                $('#name').val("");
                $('#addEmpModal').modal('hide');
                listSubject();
            }
        });
        return false;
    });

    // show edit modal form with emp data
    $('#listRecords').on('click', '.editRecord', function () {
        $('#editEmpModal').modal('show');
        $("#empId").val($(this).data('id'));
        $("#empName").val($(this).data('name'));

    });

    // save edit record
    $('#editEmpForm').on('submit', function () {
        var empId = $('#empId').val();
        var empName = $('#empName').val();
        $.ajax({
            type: "POST",
            url: `<?= base_url('/subject/update') ?>`,
            dataType: "JSON",
            data: {
                id: empId,
                name: empName,
            },
            success: function (data) {
                $("#empId").val("");
                $("#empName").val("");
                $('#editEmpModal').modal('hide');
                listSubject();
            }
        });
        return false;
    });

    // show delete form
    $('#listRecords').on('click', '.deleteRecord', function () {
        var empId = $(this).data('id');
        $('#deleteEmpModal').modal('show');
        $('#deleteEmpId').val(empId);
    });


    // delete emp record
    $('#deleteEmpForm').on('submit', function () {
        var empId = $('#deleteEmpId').val();
        $.ajax({
            type: "POST",
            url: `<?=base_url('/subject/delete')?>`,
            dataType: "JSON",
            data: {
                id: empId
            },
            success: function (data) {
                $("#" + empId).remove();
                $('#deleteEmpId').val("");
                $('#deleteEmpModal').modal('hide');
                listSubject();
            }
        });
        return false;
    });
});
