$('#dyntable').dataTable({
    "sPaginationType": "full_numbers",
    "aaSortingFixed": [[0,'asc']],
    "fnDrawCallback": function(oSettings) {
        jQuery.uniform.update();
    }
});