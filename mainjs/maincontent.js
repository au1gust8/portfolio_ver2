// main_box
  $(document).ready(function () {
		 
	 $('.leftBtn').click(function () {

         $('.main_box_inner ul li').first().appendTo('.gallery_box .main_box_inner ul');
         });


         $('.rightBtn').click(function () {
	          $('.main_box_inner ul li').last().prependTo('.gallery_box .main_box_inner ul');  
         });
   });
