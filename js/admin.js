function editUser() 
{
    var edit = document.getElementById('editUserBtn');
    var save = document.getElementById('saveUserEditBtn');
    var cancel = document.getElementById('cancelEditUserBtn');
    var del = document.getElementById('deleteUser');  

    var displayCard = document.getElementById('viewUserDetail');
    var editCard = document.getElementById('editUserDetail');

    edit.style.display = 'none';
    save.style.display = 'block';
    cancel.style.display = 'block';
    del.style.display = 'none';

    displayCard.style.display = 'none';
    editCard.style.display = 'block';
}

function cancelUsEdit() 
{
    var edit = document.getElementById('editUserBtn');
    var save = document.getElementById('saveUserEditBtn');
    var cancel = document.getElementById('cancelEditUserBtn');
    var del = document.getElementById('deleteUser');  

    var displayCard = document.getElementById('viewUserDetail');
    var editCard = document.getElementById('editUserDetail');

    edit.style.display = 'block';
    save.style.display = 'none';
    cancel.style.display = 'none';
    del.style.display = 'block';

    displayCard.style.display = 'block';
    editCard.style.display = 'none';
}