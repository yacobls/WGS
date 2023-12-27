
$(function() {
    "use strict";

     
	 

//sidebar menu js
$.sidebarMenu($('.sidebar-menu'));

// === toggle-menu js
$(".toggle-menu").on("click", function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });	 
	   
// === sidebar menu activation js

$(function() {
        for (var i = window.location, o = $(".sidebar-menu a").filter(function() {
            return this.href == i;
        }).addClass("active").parent().addClass("active"); ;) {
            if (!o.is("li")) break;
            o = o.parent().addClass("in").parent().addClass("active");
        }
    }), 	   
	   

/* Top Header */

$(document).ready(function(){ 
    $(window).on("scroll", function(){ 
        if ($(this).scrollTop() > 60) { 
            $('.topbar-nav .navbar').addClass('bg-dark'); 
        } else { 
            $('.topbar-nav .navbar').removeClass('bg-dark'); 
        } 
    });

 });


/* Back To Top */

$(document).ready(function(){ 
    $(window).on("scroll", function(){ 
        if ($(this).scrollTop() > 300) { 
            $('.back-to-top').fadeIn(); 
        } else { 
            $('.back-to-top').fadeOut(); 
        } 
    }); 

    $('.back-to-top').on("click", function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});	   
	    
   
$(function () {
  $('[data-toggle="popover"]').popover()
})


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


	 // theme setting
	 $(".switcher-icon").on("click", function(e) {
        e.preventDefault();
        $(".right-sidebar").toggleClass("right-toggled");
    });
	
	$('#theme1').click(theme1);
    $('#theme2').click(theme2);
    $('#theme3').click(theme3);
    $('#theme4').click(theme4);
    $('#theme5').click(theme5);
    $('#theme6').click(theme6);
    $('#theme7').click(theme7);
    $('#theme8').click(theme8);
    $('#theme9').click(theme9);
    $('#theme10').click(theme10);
    $('#theme11').click(theme11);
    $('#theme12').click(theme12);
    $('#theme13').click(theme13);
    $('#theme14').click(theme14);
    $('#theme15').click(theme15);

    function theme1() {
      $('body').attr('class', 'bg-theme bg-theme1');
    }

    function theme2() {
      $('body').attr('class', 'bg-theme bg-theme2');
    }

    function theme3() {
      $('body').attr('class', 'bg-theme bg-theme3');
    }

    function theme4() {
      $('body').attr('class', 'bg-theme bg-theme4');
    }
	
	function theme5() {
      $('body').attr('class', 'bg-theme bg-theme5');
    }
	
	function theme6() {
      $('body').attr('class', 'bg-theme bg-theme6');
    }

    function theme7() {
      $('body').attr('class', 'bg-theme bg-theme7');
    }

    function theme8() {
      $('body').attr('class', 'bg-theme bg-theme8');
    }

    function theme9() {
      $('body').attr('class', 'bg-theme bg-theme9');
    }

    function theme10() {
      $('body').attr('class', 'bg-theme bg-theme10');
    }

    function theme11() {
      $('body').attr('class', 'bg-theme bg-theme11');
    }

    function theme12() {
      $('body').attr('class', 'bg-theme bg-theme12');
    }
	
	function theme13() {
      $('body').attr('class', 'bg-theme bg-theme13');
    }
	
	function theme14() {
      $('body').attr('class', 'bg-theme bg-theme14');
    }
	
	function theme15() {
      $('body').attr('class', 'bg-theme bg-theme15');
    }



function addRow() {
  var table = document.getElementById("barangTable").getElementsByTagName('tbody')[0];
  var newRow = table.insertRow(table.rows.length);
  var cols = 8; // Number of columns

  for (var i = 0; i < cols; i++) {
    var cell = newRow.insertCell(i);
    if (i === 0) {
      cell.innerHTML = '<input type="text" readonly class="form-control" name="kodebarang[]" value="<?php echo $kodebarang ?>" required="required">';
    } else if (i === 3) {
      cell.innerHTML = '<select class="form-control" name="class[]" required>' +
        '<option value="">Pilih</option>' +
        '<option value="Baut">Baut</option>' +
        '<option value="Cat">Cat</option>' +
        '<option value="Compressor">Compressor</option>' +
        '<option value="Gearbox">Gearbox</option>' +
        '<option value="Motor">Motor</option>' +
        '<option value="Pump">Pump</option>' +
        '<option value="Plat">Plat</option>' +
        '</select>';
    } else if (i === 4) {
      cell.innerHTML = '<select class="form-control" name="tipe[]" required>' +
        '<option value="">Pilih</option>' +
        '<option value="Local">Local</option>' +
        '<option value="Import">Import</option>' +
        '</select>';
    } else if (i === 5) {
      cell.innerHTML = '<select class="form-control" name="satuan[]" required>' +
        '<option value="">Pilih</option>' +
        '<option value="PCS">PCS</option>' +
        '<option value="UNIT">UNIT</option>' +
        '<option value="LEMBAR">LEMBAR</option>' +
        '<option value="LITER">LITER</option>' +
        '</select>';
    } else {
      cell.innerHTML = '<input type="text" class="form-control" name="namabarang[]" autocomplete="off">';
    }
  }

  var deleteButtonCell = newRow.insertCell(cols);
  var deleteButton = document.createElement("button");
  deleteButton.innerHTML = "Delete";
  deleteButton.setAttribute("type", "button");
  deleteButton.setAttribute("onclick", "deleteRow(this)");
  deleteButtonCell.appendChild(deleteButton);
}

function deleteRow(button) {
  var row = button.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

});