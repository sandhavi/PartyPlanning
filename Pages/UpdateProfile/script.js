document.addEventListener("DOMContentLoaded", function () {
    const updateForm = document.getElementById("update-form");

    updateForm.addEventListener("submit", function (e) {
        e.preventDefault();

        // Fetch form data
        const formData = new FormData(updateForm);

        // Use fetch API to send a POST request
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
