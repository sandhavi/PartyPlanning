document.addEventListener("DOMContentLoaded", function () {
    const updateForm = document.getElementById("update-form");

    updateForm.addEventListener("submit", function (e) {
        e.preventDefault();

       
        const formData = new FormData(updateForm);

       
        fetch("../../Backend/updateProfile.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});
