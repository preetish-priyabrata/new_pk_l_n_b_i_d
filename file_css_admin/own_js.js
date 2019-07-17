$(document).ready(function() {
	var date = new Date();

    $('.vendor_example').DataTable();

	$('#example_scroll').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false
    } );
    $('#example_scroll_cart').DataTable( {
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    } );
	$('#example').DataTable( {
	    dom: 'Bfrtip',
	    buttons: [
	        {
	            extend: 'copyHtml5',
	            exportOptions: {
	                columns: [ 0, ':visible' ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: ':visible'
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	                columns: [ 0, 1, 2, 5 ]
	            }
	        },
	        'colvis'
	    ]
	} );
	$('#table1').DataTable( {
		scrollX : true,
		// "scrollY": 200,
		 // "scrollX": true,
	    dom: 'Bfrtip',
	    buttons: [
	        {
	            extend: 'copyHtml5',
	            exportOptions: {
	                columns: [ 0, ':visible' ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: ':visible'
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	            	columns: ':visible'
	                // columns: [ 0, 1, 2, 5 ]
	            }
	        },
	        'colvis'
	    ]
	} );
	$('#example_buyer').DataTable( {
		scrollX: true,
	    dom: 'Bfrtip',
	    buttons: [
	        {
	            extend: 'copyHtml5',
	             title: 'Receive Material Requisition - '+date,
	            exportOptions: {
	                columns: [ 0, ':visible' ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            title: 'Receive Material Requisition - '+date,
	            exportOptions: {
	                columns: ':visible'
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            orientation:'landscape',
	            title: 'Receive Material Requisition - '+date,
	            exportOptions: {
	                columns: ':visible'
	            },
	            // customize: function(doc) {
             //            console.log(doc.content)
             //            doc.content.splice(0, 0, {
             //                margin: [12, 0, 0, 12],
             //                alignment: "center",
             //            });

             //            doc.content[2].table.widths = ["*", "*", "*"];
             //        }
	            // exportOptions: {
	            //     columns: [ 0, 1, 2, 5 ]
	            // }
	        },
	        'colvis'
	    ]
	} );
} );


  $( function() {
    $( "#datepicker" ).datepicker({
    		changeMonth: true,
      		changeYear: true,
      		dateFormat: 'yy-mm-dd'
    	});
  } );
$(document).ready(function() {
	$('table.display').DataTable();
	$('#table12').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
$(document).ready(function() {
    $('#table1bu').DataTable( {
		"scrollY": 200,
		"scrollX": true,
		fixedHeader: {
            header: true,
            footer: true
        },
		dom: 'Bfrtip',		
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ]
    } );
   var table_new= $('#table1bu2').removeAttr('width').DataTable( {
	
  		columnDefs: [
  				{ targets: "-1", className: 'dt-body-right' }
                 // {"className": "dt-right", "targets": "0"}

          ],
        responsive: true,
  		scrollY:        "400px",
    
        fixedColumns: true,
		dom: 'Bfrtip',		
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ]
    } );
   table_new.columns.adjust().draw();

    // "autoWidth": false
} );