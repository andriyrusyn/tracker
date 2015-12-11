var url_base = "http://localhost/journal/server";

$(document).ready(function () {


	$.ajax(url_base + "/entry.php",
	       {type: "GET",
		       dataType: "json",
		       success: function(entry_ids, status, jqXHR) {
		       for (var i=0; i<entry_ids.length; i++) {
		       		console.log(load_entry_item(entry_ids[i]));
			   		load_entry_item(entry_ids[i]);
		       }
		   }
	});

	// $('#new_entry_form').on('submit',
	// 		       function (e) {
	// 			   e.preventDefault();
	// 			   $.ajax(url_base + "/entry.php",
	// 				  {type: "POST",
	// 					  dataType: "json",
	// 					  data: $(this).serialize(),
	// 					  success: function(todo_json, status, jqXHR) {
	// 					  var t = new Todo(todo_json);
	// 					  $('#todo_list').append(t.makeCompactDiv());
	// 				      },
	// 					  error: function(jqXHR, status, error) {
	// 					  alert(jqXHR.responseText);
	// 				      }});
	// 		       });

	// $('#todo_list').on('dblclick',
	// 		   'div.todo',
	// 		   null,
	// 		   function (e) {
	// 		       var t = $(this).data('todo');
	// 		       $(this).replaceWith(t.makeEditDiv());
	// 		   });

	// $('#todo_list').on('submit',
	// 		   'form.edit_form',
	// 		   null,
	// 		   function (e) {
	// 		       e.preventDefault();
	// 		       var edit_div = $(this).parent();
	// 		       var t = edit_div.data('todo');
	// 		       $.ajax(url_base + "/todo.php/" + t.id,
	// 			      {type: "POST",
	// 				      dataType: "json",
	// 				      data: $(this).serialize(),
	// 				      success: function(todo_json, status, jqXHR) {
	// 				      var t = new Todo(todo_json);
	// 				      edit_div.replaceWith(t.makeCompactDiv());
	// 				  },
	// 				      error: function(jqXHR, status, error) {
	// 				      alert(jqXHR.responseText);
	// 				  }});
	// 		   });

	// $('#todo_list').on('click',
	// 		   'form.edit_form > button.cancel',
	// 		   null,
	// 		   function (e) {
	// 		       var edit_div = $(this).parent().parent();
	// 		       var t = edit_div.data('todo');
	// 		       edit_div.replaceWith(t.makeCompactDiv());
	// 		   });
 //    });


	var load_entry_item = function (id) {
	    $.ajax(url_base + "/entry.php/" + id,
		{type: "GET",
		 dataType: "json",
		 success: function(entry_json, status, jqXHR) {
				var t = new Entry(entry_json);
					console.log("t is: " + t);
					$('#entry_list').append(t.makeCompactDiv());
		 		}
		});
	}

});
