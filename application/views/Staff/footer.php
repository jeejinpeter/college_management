

<link rel="stylesheet" type="text/css" href="<?php echo  base_url('resource/css/jquery.dataTables.min.css');?>">

<script>
$(document).ready(function () {
    $('li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
    $('li.dropdown-n').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });

    $(".tab a").on("click", function () {

        $(".tab").find(".active").removeClass("active");
        $(this).parent().addClass("active");
    });
	
my_table = $(".expenses_table").dataTable({
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                $("td:first", nRow).html(iDisplayIndex + 1);
                return nRow;
            },
        });
		$(".select2").select2();

});

                </script>
</body>

</html>