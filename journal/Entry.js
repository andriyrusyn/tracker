var Entry = function(entry_json) {
    this.id = entry_json.id;
    this.author_id = entry_json.author_id;
    this.entry = entry_json.entry;
};

Entry.prototype.makeCompactDiv = function() {
    var entry_div = $("<div></div>");
    entry_div.addClass('entry');
    entry_div.append(entry_div);

    entry_div.data('entry', this);
    entry_div.html(this.entry);
    return entry_div;
};

// Todo.prototype.makeEditDiv = function() {
//     var ediv = $("<div></div>");

//     var ediv_form = $("<form></form>");
//     ediv_form.addClass('edit_form');
    
//     ediv_form.append($("<input type='text' name='title'>").val(this.title));
//     ediv_form.append("<br>");

//     ediv_form.append($("<textarea name='note'></textarea>").val(this.note));
//     ediv_form.append("<br>");

//     ediv_form.append("Project: ");
//     ediv_form.append($("<input type='text' name='project'>").val(this.project));
//     ediv_form.append("<br>");

//     ediv_form.append("Due Date: ");
//     if (this.due_date) {
// 	ediv_form.append($("<input type='text' name='due_date'>").val(this.due_date.toDateString()));
//     } else {
// 	ediv_form.append($("<input type='text' name='due_date'>"));
//     }
//     ediv_form.append("<br>");

//     ediv_form.append("Priority: ");
//     ediv_form.append($("<input type='text' name='priority'>").val(this.priority));
//     ediv_form.append("<br>");

//     ediv_form.append("Complete ");
//     complete_checkbox = $("<input type='checkbox' name='complete' value=1>");
//     if (this.complete) {
// 	complete_checkbox[0].checked = true;
//     }
//     ediv_form.append(complete_checkbox);
//     ediv_form.append("<br>");

//     ediv_form.append("<button type='submit'>Save</button><button type='button' class='cancel'>Cancel</button>");
//     ediv.append(ediv_form);
    
//     ediv.data('todo', this);
//     return ediv;
// }
