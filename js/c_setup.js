//edit item
function edit() 
{
    var view = document.getElementById('view');
    var edit = document.getElementById('edit');  
    
    view.style.display = 'none';
    edit.style.display = 'block';
    document.getElementById('add').style.display = 'none';
    document.getElementById('edit_butt').style.display = 'none';
    document.getElementById('save').style.display = 'block';
    document.getElementById('delete').style.display = 'none';
    document.getElementById('BKWD').style.display = 'none';
    document.getElementById('FWD').style.display = 'none';
    document.getElementById('cancel_edit').style.display = 'block';
}

//cancel edit
function cancelEdit() {
    var view = document.getElementById('view');
    var edit = document.getElementById('edit');  
    
    view.style.display = 'block';
    edit.style.display = 'none';
    document.getElementById('add').style.display = 'block';
    document.getElementById('edit_butt').style.display = 'block';
    document.getElementById('save').style.display = 'none';
    document.getElementById('delete').style.display = 'block';
    document.getElementById('BKWD').style.display = 'block';
    document.getElementById('FWD').style.display = 'block';
    document.getElementById('cancel_edit').style.display = 'none';
}