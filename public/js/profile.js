function editAvatar() {
    document.getElementById("profileImage").click();
}

function displayImage(e) {
    if (e.file[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById("profileAvatar").setAttribute('src', e.target.db);
        }
        reader.readAsDataURL(e.file[0]);
    }
}