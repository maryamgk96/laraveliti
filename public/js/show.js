$( document ).ready(function() {


    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
    $('#view-modal').on('show.bs.modal', function(e) {

	var $modal = $(this);
    id=$('.ll').attr('id');
   
    
$.ajax({
	cache: false,
	type: 'POST',
	url: 'posts/viewa',
	data: {'id': id},
	success: function(data) {
        $modal.find('.view-content').html("<h1> Title:"+data.post.title+"</h1></br><p> body:"+data.post.body+"</p></br><p> slug:"+data.post.slug+"</p></br><p> Author name::"+data.user.name+"</p></br><p> Author email:"+data.user.email+"</p></br>");
	}
});
})

   

});
