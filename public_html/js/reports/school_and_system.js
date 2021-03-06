$(document).ready(function() {
    var from = document.getElementById("from_date").value;
    var to = document.getElementById("to_date").value;

    var school_and_system_data = $('#school_and_system_report_table').removeAttr('width').DataTable( {
        dom: 'Bfrtip',
        scrollX: true,
        autoWith: false,
        columnDefs: [
            { "className": "dt-center", "width": 200, "targets": 0},
            { "className": "dt-center", "width": 200, "targets": 1},
            { "className": "dt-center", "width": 200, "targets": 2},
            { "className": "dt-center", "width": 200, "targets": 3},
            { "className": "dt-center", "width": 150, "targets": 4},
            { "className": "dt-center", "width": 150, "targets": 5},
            { "className": "dt-center", "width": 50, "targets": 6},
            { "className": "dt-center", "width": 100, "targets": 7},
            { "targets": 8, "visible": false, "searchable": false} // Hidden column with the request_id
        ],
        buttons: {
            buttons: [
                {
                    extend: 'colvis',
                    text: 'Hide/Unhide Columns'
                },
                {
                    extend: 'print',
                    text: 'Print Table', 
                    title: 'School and System Report',
                    autoPrint: true,
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                },
                {
                    extend: 'excel',
                    text: 'Save to Excel',
                    title: 'School and System Report'
                },
                {
                    extend: 'pdfHtml5',
                    text: 'Save to PDF',
                    action: function(e, dt, node, config) 
                    {
                        var req = new XMLHttpRequest();
                        var fd = new FormData();

                        fd.append("report_from", from);
                        fd.append("report_to", to);

                        req.open("POST", "php/reports/school_and_system_report/create_school_and_system_report_pdf.php", true);
                        req.responseType = "blob";

                        req.onreadystatechange = function () 
                        {
                            if (req.readyState === 4 && req.status === 200) 
                            {
                                var filename = "School and System Report.pdf";
                                if (typeof window.chrome !== 'undefined') 
                                {
                                    // Chrome version
                                    var link = document.createElement('a');

                                    link.href = window.URL.createObjectURL(req.response);
                                    link.download = filename;
                                    link.click();
                                } 
                                else if (typeof window.navigator.msSaveBlob !== 'undefined') 
                                {
                                    // IE version
                                    var blob = new Blob([req.response], { type: 'application/pdf' });
                                    window.navigator.msSaveBlob(blob, filename);
                                }
                                else
                                {
                                    // Firefox version
                                    var file = new File([req.response], filename, { type: 'application/force-download' });
                                    window.open(URL.createObjectURL(file));
                                }
                            }
                        };
                        req.send(fd);
                    }
                }
            ],
            columnDefs: [ {
                visible: false
            }]
        }
    });

    $('#school_and_system_report_table tbody').on( 'dblclick', 'td', function (e) {
        e.preventDefault();
        var column_index = school_and_system_data.cell(this).index().column;

        if (column_index == 7)
        {
            var request_id = school_and_system_data.row(this).data()[8];

            $("#view_expenses").load("php/reports/school_and_system_report/expense_breakdown.php", {request_id: request_id});
            $("#view_expenses").dialog({title: "Expense Breakdown"});
            $("#view_expenses").dialog("open");
        }
    });
    
    $("#view_expenses").dialog({
        modal: true,
        autoOpen: false,
        height: 250,
        width: 400,
        buttons: [
            { 
                id: "cancel",
                text: "Cancel", 
                class: "btn btn-secondary",
                click: function() { 
                    $("#view_expenses").empty();
                    $(this).dialog("close");
                }
            }
        ]
    });
});