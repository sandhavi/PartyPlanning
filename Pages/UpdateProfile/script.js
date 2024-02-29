document.getElementById('editProfileBtn').addEventListener('click', function() {
    document.getElementById('editProfileForm').style.display = 'block';
});

document.getElementById('saveProfileBtn').addEventListener('click', function() {
    var formData = {
        name: document.getElementById('editName').value,
        age: document.getElementById('editAge').value,
        email: document.getElementById('editEmail').value,
        address: document.getElementById('editAddress').value,
    };

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_profile.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onload = function() {
        if (xhr.status == 200) {
            // Update display values
            document.getElementById('userName').textContent = formData.name;
            document.getElementById('userAge').textContent = formData.age;
            document.getElementById('userEmail').textContent = formData.email;
            document.getElementById('userAddress').textContent = formData.address;
            // Hide form
            document.getElementById('editProfileForm').style.display = 'none';
            alert('Profile updated successfully.');
        } else {
            alert('Error updating profile.');
        }
    };

    xhr.send(JSON.stringify(formData));
});
